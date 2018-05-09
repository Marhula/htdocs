<?php

class taxikari_query extends CI_Model
{
    public function getTaxikari()
    {
        $query = $this->db->get('taxikar');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function addTaxikari($data)
    {
        return $this->db->insert('taxikar', $data);
    }
}

?>