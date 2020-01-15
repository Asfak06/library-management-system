<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('student_model');
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
	
}
