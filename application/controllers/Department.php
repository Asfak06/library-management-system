<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->set_header("last-Modified:" .gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0",false);
        $this->output->set_header("Pragma: no-cache");
		$this->load->model('dep_model');
		$data=array();		
	}
	public function adddepartment(){
		$data=array();
		$data['title']='Add new department';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['content']=$this->load->view('inc/departmentAdd','',TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
		public function addDepartmentForm(){
		$data['depname']=$this->input->post('depname');
		$name=$data['depname'];		
		if(empty($name)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("department/adddepartment");
		}else{
			$this->dep_model->saveDep($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">Added to database </span>';
            $this->session->set_flashdata($sdata);
            redirect("department/adddepartment");
		}
	}
	public function departmentlist(){
		$data=array();
		$data['title']='departement list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depdata']=$this->dep_model->getAlldepData();
		$data['content']=$this->load->view('inc/listdepartment',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function editdepartment($depid){
        $data=array();
		$data['title']='Edit department';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depById']=$this->dep_model->getDepById($depid);
		$data['content']=$this->load->view('inc/editdep',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function updatedepartment(){
        $data['id']=$this->input->post('depid');
		$data['name']=$this->input->post('depname');

        $id=$data['id'];  
		$name=$data['name'];
		if(empty($name)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("department/editdepartment/".$id);
		}else{
			$this->dep_model->updateDepartmentData($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">updated</span>';
            $this->session->set_flashdata($sdata);
            redirect("department/editdepartment/".$id);
		}
	}
	public function deletedepartment($depid){
		    $this->dep_model->delDepById($depid);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">deleted</span>';
            $this->session->set_flashdata($sdata);
            redirect("department/departmentlist");
	}
}