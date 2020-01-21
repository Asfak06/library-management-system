<?php

class Auth_Model extends CI_Model
{
  public function saveAuth($data){
     $this->db->insert('tbl_auth',$data);
  }
  public function getAllauthData(){
        $this->db->select('*');
		$this->db->from('tbl_auth');
		$this->db->order_by('auth_id','desc');
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
  } 
  public function getAuthById($auth_id){
  	    $this->db->select('*');
		$this->db->from('tbl_auth');
		$this->db->where('auth_id',$auth_id);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
  }
  public function updateAuthorData($data){
       $this->db->set('auth_name',$data['name']);
       // $this->db->set('auth_name',$data['auth']);
        $this->db->where('auth_id',$data['id']);
        // $this->db->where('auth_id',$data['bookid']);
        $this->db->update('tbl_auth');
  }
  public function delAuthById($auth_id){
  	  $this->db->where('auth_id',$auth_id);
      $this->db->delete('tbl_auth');
  }
  // public function saveAuthBook($auth){
  //   $this->db->query("INSERT INTO tbl_auth (auth_name) VALUES('$auth')");
  // }
  public function getauth($sauthid){
    $this->db->select('*');
    $this->db->from('tbl_auth');
    $this->db->where('auth_id',$sauthid);
    $qresult=$this->db->get();
    $result=$qresult->row();
    return $result;
  }
}
