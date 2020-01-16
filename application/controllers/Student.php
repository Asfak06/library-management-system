<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$data=array();		
	}

	public function addstudent(){
		$data=array();
		$data['title']='Add new student';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['studentAdd']=$this->load->view('inc/studentAdd','',TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('addstudent',$data);
	}
	public function addStudentForm(){
		$data['name']=$this->input->post('name');
		$data['dept']=$this->input->post('dept');
		$data['roll']=$this->input->post('roll');
		$data['reg']=$this->input->post('reg');
		$data['session']=$this->input->post('session');
		$data['batch']=$this->input->post('batch');

		$name=$data['name'];
		$dept=$data['dept'];
		$roll=$data['roll'];
		$reg=$data['reg'];
		$session=$data['session'];
		$batch=$data['batch'];
		if(empty($name) && empty($dept) && empty($roll) && empty($reg) && empty($session) && empty($batch)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("student/addstudent");
		}else{
			$this->student_model->saveStudent($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">Added to database </span>';
            $this->session->set_flashdata($sdata);
            redirect("student/addstudent");
		}
	}
	public function studentlist(){
		$data=array();
		$data['title']='Student list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['studentdata']=$this->student_model->getAllstudentData();
		$data['liststudent']=$this->load->view('inc/liststudent',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('studentlist',$data);
	}

	public function editstudent($id){
		$data=array();
		$data['title']='Student list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['stuById']=$this->student_model->getStudentById($id);
		$data['editstudent']=$this->load->view('inc/editstudentform',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('editstudent',$data);
	}
}
