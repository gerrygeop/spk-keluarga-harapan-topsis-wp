<?php

namespace App\Models;

use App\Core\Database;

class KriteriaModel {
    private $tbl_kriteria = 'kriteria';
    private $tbl_subKriteria = 'subkriteria';
    private $tbl_pivotKtr = 'pivot_ktr_sub';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKriteria()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_kriteria);
        return $this->db->resultSet();
    }

    public function getNilaiKriteria()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_kriteria);
        return $this->db->resultSet();
    }

    public function getAllSubKriteria()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_subKriteria);
        return $this->db->resultSet();
    }

    public function getAllBobotSub()
    {
        $this->db->query('SELECT id_sub, bobot_sub FROM '. $this->tbl_subKriteria);
        return $this->db->resultSet();
    }

    public function getSubKriteriaById($id)
    {
        // Join with pivot to get subkriteria for a specific main criteria
        $this->db->query('SELECT id_sub, nama_sub, bobot_sub FROM '. $this->tbl_subKriteria .' JOIN '. $this->tbl_pivotKtr .' USING(id_sub) WHERE id_ktr=:id');
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }
}
