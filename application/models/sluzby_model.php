<?php

class sluzby_model extends CI_Model
{
    public function getSluzby($limit, $start)
    {
        $this->db->order_by("id", "asc");
        $this->db->limit($limit, $start);
        $this->db->select('sluzba.ID as ID, concat(taxikar.meno,' . "' '" . ',taxikar.priezvisko) as taxikar, zaciatok_sluzby,dlzka_sluzby, concat(auto.znacka,' . "' '" . ',auto.model) as vozidlo, ADDTIME(zaciatok_sluzby,dlzka_sluzby) as koniec');
        $this->db->join('taxikar', 'taxikar.ID=sluzba.taxikar');
        $this->db->join('auto', 'auto.ID=sluzba.auto_ID');
        $query = $this->db->get('sluzba');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getRawSluzby()
    {
        $this->db->order_by("id", "asc");
        $this->db->limit();
        $this->db->select('sluzba.ID as ID, concat(taxikar.meno,' . "' '" . ',taxikar.priezvisko) as taxikar, zaciatok_sluzby,dlzka_sluzby, concat(auto.znacka,' . "' '" . ',auto.model) as vozidlo, auto.spz as spz, ADDTIME(zaciatok_sluzby,dlzka_sluzby) as koniec');
        $this->db->join('taxikar', 'taxikar.ID=sluzba.taxikar');
        $this->db->join('auto', 'auto.ID=sluzba.auto_ID');
        $query = $this->db->get('sluzba');
        if ($query->num_rows() > 0) {
            return $query;
        }
    }
    public function getDetailSluzby($ID)
    {
        $this->db->select('sluzba.ID as ID, concat(taxikar.ID, ' . "', '" . ',taxikar.meno,' . "' '" . ',taxikar.priezvisko,' . "', '" . ',taxikar.telCislo) as taxikar, zaciatok_sluzby,dlzka_sluzby, concat(auto.znacka,' . "' '" . ',auto.model,'."', '".',auto.spz) as vozidlo, ADDTIME(zaciatok_sluzby,dlzka_sluzby) as koniec');
        $this->db->join('taxikar', 'taxikar.ID=sluzba.taxikar');
        $this->db->join('auto', 'auto.ID=sluzba.auto_ID');
        $query = $this->db->get_where('sluzba',array('sluzba.ID'=>$ID));
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function record_count()
    {
        return $this->db->count_all("sluzba");
    }

    public function getTaxikari()
    {
        $this->db->select("ID as IDtaxikar, concat(meno,' ',priezvisko) as meno");
        $query = $this->db->get('taxikar');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

    public function getVozidla()
    {
        $this->db->select("ID as IDauto, concat(znacka,' ',model,' ',spz) as auto");
        $query = $this->db->get('auto');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getSluzba($ID)
    {
        $query = $this->db->get_where('sluzba',array('id'=>$ID));
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function addSluzba($data)
    {
        return $this->db->insert('sluzba', $data);
    }

    public function updateSluzba($data, $ID){
            return $this->db->where('ID',$ID)->update('sluzba', $data);

    }

    public function deleteSluzba($ID){
        return $this->db->where('ID',$ID)->delete('sluzba');
    }
}