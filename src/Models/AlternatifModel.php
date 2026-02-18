<?php

namespace App\Models;

use App\Core\Database;

class AlternatifModel {
    private $table = 'alternatif';
    private $tableNilai = 'alternatif_nilai';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAlternatif()
    {
        // Fetch base alternatives
        $this->db->query('SELECT * FROM ' . $this->table);
        $alternatives = $this->db->resultSet();

        // Fetch all values
        $this->db->query('SELECT * FROM ' . $this->tableNilai);
        $values = $this->db->resultSet();

        // Map values to alternatives
        // Result structure: alias c1..c11 for backward compat if needed, 
        // AND 'nilai_kriteria' array for Services.
        
        $mapped = [];
        $valuesMap = [];
        foreach ($values as $v) {
            $valuesMap[$v['id_alternatif']][$v['id_kriteria']] = (float)$v['nilai']; // 'nilai' column stores id_sub or value? 
            // In migration we stored: (float)$nilai_raw.
            // If original data was ID_SUB, then this is ID_SUB.
        }

        foreach ($alternatives as $alt) {
            $id = $alt['id_alt'];
            $alt['nilai_kriteria'] = $valuesMap[$id] ?? [];
            
            // Backward compatibility for Views (c1..c11)
            // Assuming we know which ID corresponds to c1..c11. 
            // If IDs are 1..11, we can map them.
            if (isset($valuesMap[$id])) {
                foreach ($valuesMap[$id] as $id_ktr => $val) {
                    $alt['c' . $id_ktr] = $val;
                }
            }
            
            $mapped[] = $alt;
        }

        return $mapped;
    }

    public function getAlternatifById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_alt=:id');
        $this->db->bind('id', $id);
        $alt = $this->db->single();

        if (!$alt) return false;

        $this->db->query('SELECT * FROM ' . $this->tableNilai . ' WHERE id_alternatif=:id');
        $this->db->bind('id', $id);
        $values = $this->db->resultSet();

        $alt['nilai_kriteria'] = [];
        foreach ($values as $v) {
            $alt['nilai_kriteria'][$v['id_kriteria']] = $v['nilai'];
            $alt['c' . $v['id_kriteria']] = $v['nilai']; // Back compat
        }

        return $alt;
    }

    public function tambahAlternatif($data)
    {
        // 1. Insert Alternatif
        $this->db->query("INSERT INTO " . $this->table . " (nama) VALUES (:nama)");
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        
        $id_alt = $this->db->lastInsertId();

        // 2. Insert Nilai
        // Data input expected: ['c1' => val, 'c2' => val ...] from Form.
        // We need to loop c1..cN based on available criteria or input keys.
        
        // Let's assume input keys c1..c11 are present. 
        // Better: Fetch all criteria IDs to know what to look for.
        // For now, simple loop 1..11 or dynamic checks.
        
        // Check for 'c' keys
        foreach ($data as $key => $val) {
            if (strpos($key, 'c') === 0 && is_numeric(substr($key, 1))) {
                $id_ktr = (int)substr($key, 1);
                
                $query = "INSERT INTO " . $this->tableNilai . " (id_alternatif, id_kriteria, nilai) VALUES (:id_alt, :id_ktr, :nilai)";
                $this->db->query($query);
                $this->db->bind('id_alt', $id_alt);
                $this->db->bind('id_ktr', $id_ktr);
                $this->db->bind('nilai', $val);
                $this->db->execute();
            }
        }

        return $this->db->rowCount();
    }

    public function updateAlternatif($data)
    {
        // 1. Update Name
        $this->db->query("UPDATE " . $this->table . " SET nama=:nama WHERE id_alt=:id");
        $this->db->bind('id', $data['id_alt']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();

        // 2. Update Values
        // Strategy: Delete all for this alt, then re-insert? Or Update per criteria?
        // Delete then Insert is easier for cleaner code unless history is needed.
        
        $this->db->query("DELETE FROM " . $this->tableNilai . " WHERE id_alternatif=:id");
        $this->db->bind('id', $data['id_alt']);
        $this->db->execute();
        
        // Re-insert
        foreach ($data as $key => $val) {
            if (strpos($key, 'c') === 0 && is_numeric(substr($key, 1))) {
                $id_ktr = (int)substr($key, 1);
                
                $query = "INSERT INTO " . $this->tableNilai . " (id_alternatif, id_kriteria, nilai) VALUES (:id_alt, :id_ktr, :nilai)";
                $this->db->query($query);
                $this->db->bind('id_alt', $data['id_alt']);
                $this->db->bind('id_ktr', $id_ktr);
                $this->db->bind('nilai', $val);
                $this->db->execute();
            }
        }

        return 1; // Return success
    }

    public function hapusAlternatif($id)
    {
        // FK constraint might handle cascade, but safe for manual delete
        $this->db->query("DELETE FROM " . $this->tableNilai . " WHERE id_alternatif=:id");
        $this->db->bind('id', $id);
        $this->db->execute();

        $this->db->query("DELETE FROM " . $this->table . " WHERE id_alt=:id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
