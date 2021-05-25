<?php

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
        $this->db->query('SELECT nama_ktr FROM '. $this->tbl_kriteria);
        return $this->db->resultSet();
    }

    public function getNilaiKriteria()
    {
        $this->db->query('SELECT nilai_bk FROM '. $this->tbl_kriteria);
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
        $this->db->query('SELECT id_sub, nama_sub, bobot_sub FROM '. $this->tbl_subKriteria .' JOIN '. $this->tbl_pivotKtr .' USING(id_sub) WHERE id_ktr=:id');
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function getBobotSubById($id)
    {
        $query = "SELECT bobot_sub FROM ". $this->tbl_subKriteria ." WHERE id_sub=:id_sub";
        $this->db->query($query);
        $this->db->bind('id_sub', $id);

        return $this->db->single();
    }

}