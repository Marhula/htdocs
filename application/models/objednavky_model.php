<?php
class objednavky_model extends CI_Model{
    public function getObjednavky($limit, $start)
    {
        $this->db->order_by("id", "asc");
        $this->db->limit($limit, $start);
        $this->db->select("objednavka.ID as ID ,sluzba_ID,pocetKM,cena,concat(zakaznik.ID,', ',zakaznik.meno,' ',zakaznik.priezvisko) as zakaznik,stav,kedy,posledna_zmena,concat('od ',sluzba.zaciatok_sluzby,' do ', ADDTIME(sluzba.zaciatok_sluzby,sluzba.dlzka_sluzby)) as trvanie");
        $this->db->join('sluzba', 'sluzba.ID=objednavka.sluzba_ID');
        $this->db->join('zakaznik', 'zakaznik.ID=objednavka.zakaznik_ID');
        $query = $this->db->get('objednavka');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function getRawObjednavky()
    {
        $this->db->order_by("id", "asc");
        $this->db->select("objednavka.ID as ID ,sluzba_ID,pocetKM,cena,concat(zakaznik.ID,', ',zakaznik.meno,' ',zakaznik.priezvisko) as zakaznik,stav,kedy,posledna_zmena,concat('od ',sluzba.zaciatok_sluzby,' do ', ADDTIME(sluzba.zaciatok_sluzby,sluzba.dlzka_sluzby)) as trvanie");
        $this->db->join('sluzba', 'sluzba.ID=objednavka.sluzba_ID');
        $this->db->join('zakaznik', 'zakaznik.ID=objednavka.zakaznik_ID');
        $query = $this->db->get('objednavka');
        if ($query->num_rows() > 0) {
            return $query;
        }
    }
    public function getDetailObjednavky($ID){
        $this->db->select("objednavka.ID as ID ,sluzba_ID,pocetKM,cena,concat(zakaznik.ID,', ',zakaznik.meno,' ',zakaznik.priezvisko) as zakaznik,stav,kedy,posledna_zmena,concat('od ',sluzba.zaciatok_sluzby,' do ', ADDTIME(sluzba.zaciatok_sluzby,sluzba.dlzka_sluzby)) as trvanie");
        $this->db->join('sluzba', 'sluzba.ID=objednavka.sluzba_ID');
        $this->db->join('zakaznik', 'zakaznik.ID=objednavka.zakaznik_ID');
        $query = $this->db->get('objednavka');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function record_count()
    {
        return $this->db->count_all("objednavka");
    }

    public function getZakaznikov()
    {
        $this->db->select("ID as IDzakaznika, concat(meno,' ',priezvisko) as meno");
        $query = $this->db->get('zakaznik');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getSluzby()
    {
        $this->db->select("ID");
        $query = $this->db->get('zakaznik');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function addObjednavka($data)
    {
        return $this->db->insert('objednavka', $data);
    }

    public function getObjednavka($ID)
    {
        $query = $this->db->get_where('objednavka',array('ID'=>$ID));
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function updateObjednavka($data, $ID){
        return $this->db->where('ID',$ID)->update('objednavka', $data);

    }

    public function deleteObjednavka($ID){
        return $this->db->where('ID',$ID)->delete('objednavka');
    }
}