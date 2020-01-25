<?php

class Manage_Model extends CI_Model
{
  public function saveIssueData($data){
    $this->db->insert('tbl_issue',$data);
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
    public function getStuDataById($stu)
	{
		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->where('id',$stu);
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
    }
     public function getAllIssueData()
	{
		$this->db->select('*');
		$this->db->from('tbl_issue');
		$this->db->order_by('id','desc');
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
    }
}