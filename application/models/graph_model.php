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

    public function getNajdlhsiuSluzbu()
    {
        $query = $this->db->query("SELECT CONCAT(taxikar.meno,' ',taxikar.priezvisko) as taxikar, MAX(TIME(sluzba.dlzka_sluzby)) as cas From sluzba inner join taxikar on sluzba.taxikar=taxikar.ID GROUP by sluzba.taxikar ORDER BY cas");
        return $query->result();
    }

    public function getSumCiest()
    {
        $query = $this->db->query("SELECT concat(zakaznik.meno,' ', zakaznik.priezvisko) as zakaznik, sum(pocetKM) as km from objednavka INNER JOIN zakaznik ON zakaznik.ID=objednavka.zakaznik_ID GROUP BY objednavka.zakaznik_ID");
        return $query->result();
    }
}