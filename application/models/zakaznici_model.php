<?php

class zakaznici_model extends CI_Model
{
    public function getZakaznici($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('zakaznik');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function record_count() {
        return $this->db->count_all("zakaznik");
    }

    public function addZakaznika($data)
    {
        return $this->db->insert('zakaznik', $data);
    }
    public function getZakaznika($ID){
        $query = $this->db->get_where('zakaznik',array('id'=>$ID));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
    public function updateZakaznika($data, $ID){
        return $this->db->where('id',$ID)->update('zakaznik', $data);
    }
    public function deleteZakaznika($ID){
        return $this->db->where('id',$ID)->delete('zakaznik');
    }

}

?>