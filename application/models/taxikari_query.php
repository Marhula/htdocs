<?php

class taxikari_query extends CI_Model
{
    public function getTaxikari($limit,$start)
    {
        $this->db->limit($limit,$start);
        $query = $this->db->get('taxikar');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function addTaxikari($data)
    {
        return $this->db->insert('taxikar', $data);
    }

    public function getTaxikara($ID){
        $query = $this->db->get_where('taxikar',array('id'=>$ID));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
    public function updateTaxikari($data, $ID){
        return $this->db->where('id',$ID)->update('taxikar', $data);
    }
    public function deleteTaxikara($ID){
        return $this->db->where('id',$ID)->delete('taxikar');
    }

    public function record_count() {
        return $this->db->count_all("taxikar");
    }
}

?>