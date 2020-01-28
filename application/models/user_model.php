<?php

class User_Model extends CI_Model
{
   public function checkUser($data){
      	$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('name',$data['name']);
		$this->db->where('pass',md5($data['pass']));
		$qresult=$this->db->get();
		$has=$qresult->num_rows();
		if ($has===1) {
			$result=$qresult->row();
			return $result;
		}
		
   }
   public function saveAdmin($data){
   	$this->db->insert('tbl_user',$data);
   }
   public function getAlladminsData(){
    	$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->order_by('user_id','desc');
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
   }
    public function getAdminById($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('user_id',$user_id);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
    }
    public function delAdminById($user_id){
    	$this->db->where('user_id',$user_id);
    	$this->db->delete('tbl_user');
    }
}
