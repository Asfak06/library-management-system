<?php

class Student_Model extends CI_Model
{
	
	public function saveStudent($data)
	{
		$this->db->insert('tbl_student',$data);
    }
    public function getAllstudentData()
	{
		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->order_by('id','desc');
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
    }
    public function getStudentById($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->where('id',$id);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
    }
}

?>