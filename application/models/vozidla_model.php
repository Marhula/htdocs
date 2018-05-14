<?php
class vozidla_model extends CI_Model
{
    public function getVozidla($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('auto');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function record_count()
    {
        return $this->db->count_all("auto");
    }
    public function addVozidlo($data)
    {
        return $this->db->insert('auto', $data);
    }
    public function getVozidlo($ID){
        $query = $this->db->get_where('auto',array('id'=>$ID));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
    public function updateVozidlo($data, $ID){
        return $this->db->where('id',$ID)->update('auto', $data);
    }
    public function deleteVozidlo($ID){
        return $this->db->where('id',$ID)->delete('auto');
    }

}
?>