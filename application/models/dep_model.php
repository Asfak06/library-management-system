<?php

class Dep_Model extends CI_Model
{
  public function saveDep($data){
     $this->db->insert('tbl_dep',$data);
  }  
  public function getAlldepData(){
        $this->db->select('*');
		$this->db->from('tbl_dep');
		$this->db->order_by('depid','desc');
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
  }
  public function getDepById($depid){
  	    $this->db->select('*');
		$this->db->from('tbl_dep');
		$this->db->where('depid',$depid);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
  }  
  public function updateDepartmentData($data){
  	    $this->db->set('depname',$data['name']);
        $this->db->where('depid',$data['id']);
        $this->db->update('tbl_dep');
  }
  public function delDepById($depid){
       $this->db->where('depid',$depid);
      $this->db->delete('tbl_dep');
  }
  public function getdep($sdepid){
    $this->db->select('*');
    $this->db->from('tbl_dep');
    $this->db->where('depid',$sdepid);
    $qresult=$this->db->get();
    $result=$qresult->row();
    return $result;
  }
}
