<?php

class Manage_Model extends CI_Model
{
  public function saveBook($data){
    $this->db->insert('tbl_book',$data);
  }
  public function getBookByDep($dep)
	{
		$this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->where('dept',$dep);
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
    }
}