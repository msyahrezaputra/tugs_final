<?php 
class Rokok_model extends CI_Model{
    public function getRokok($id = null) {
        if($id != ''){
            return $this->db->get_where('rokok', array('id' => $id))->result();
        }else{
            return $this->db->get('rokok')->result();
        }
    }

    public function tambahDataRokok($data){
        $this->db->insert('rokok', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataRokok($id){
        $this->db->where("id = $id");
        return $this->db->delete('rokok');;
    }

    public function ubahDataRokok($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('rokok', $data);
    }
    
}