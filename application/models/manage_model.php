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
    public function getIssueById($id){
    	$this->db->select('*');
		$this->db->from('tbl_issue');
		$this->db->where('id',$id);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
    }
    public function updateIssueData($data){
        $this->db->set('sname',$data['name']);
        $this->db->set('dept',$data['dept']);
        $this->db->set('reg',$data['reg']);
        $this->db->set('session',$data['session']);
        $this->db->set('bname',$data['book']);
        $this->db->set('return',$data['return']);
        $this->db->set('date',$data['date']);
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_issue');
    }
    public function delIssueById($id){
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_issue');
    }
    public function stuByReg($regis){
    	$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->where('reg',$regis);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
    }
    public function bookById($bname){
    	$this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->where('bookid',$bname);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
    }
}