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

    public function getIdKriteria()
    {
        $this->db->query('SELECT nilai_bk FROM '. $this->tbl_kriteria);
        return $this->db->resultSet();
    }

    public function getSubKriteria()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_subKriteria);
        return $this->db->resultSet();
    }

    public function getSubKriteriaById($id)
    {
        $this->db->query('SELECT id_sub, nama_sub FROM '. $this->tbl_subKriteria .' JOIN '. $this->tbl_pivotKtr .' USING(id_sub) WHERE id_ktr=:id');
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

}