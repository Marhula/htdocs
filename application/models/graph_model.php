<?php
class graph_model extends CI_Model{
    public function getTopAuta()
    {
        $query = $this->db->query("SELECT CONCAT(znacka,' ',model) as auto, najazdeneKM FROM auto ORDER BY najazdeneKM DESC LIMIT 5");
        return $query->result();
    }
    public function getPocetnostAut()
    {
        $query = $this->db->query("SELECT znacka, count(znacka) as pocetAut FROM `auto` group by znacka");
        return $query->result();
    }
}