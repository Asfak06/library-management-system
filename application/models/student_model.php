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
    public function updateStudentData($data){
        $this->db->set('name',$data['name']);
        $this->db->set('dept',$data['dept']);
        $this->db->set('roll',$data['roll']);
        $this->db->set('reg',$data['reg']);
        $this->db->set('session',$data['session']);
        $this->db->set('batch',$data['batch']);
        $this->db->set('phone',$data['phone']);
        $this->db->set('email',$data['email']);
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_student');

    }
    public function delStudentById($id){
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_student');
    	
    }
}

?>