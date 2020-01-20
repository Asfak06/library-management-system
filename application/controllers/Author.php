<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->set_header("last-Modified:" .gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0",false);
        $this->output->set_header("Pragma: no-cache");
		$this->load->model('auth_model');
		$data=array();	
	}
	public function addauthor(){
		$data['title']='Add new department';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['content']=$this->load->view('inc/addauthor','',TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function addAuthorForm(){
		$data['auth_name']=$this->input->post('authname');
		$name=$data['auth_name'];		
		if(empty($name)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("author/addauthor");
		}else{
			$this->auth_model->saveAuth($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">Added to database </span>';
            $this->session->set_flashdata($sdata);
            redirect("author/addauthor");
		}
	}
	public function authorlist(){
		$data['title']='Author list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['authdata']=$this->auth_model->getAllauthData();
		$data['content']=$this->load->view('inc/listauthor',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function editauthor($auth_id){
		$data['title']='Edit author';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['authById']=$this->auth_model->getAuthById($auth_id);
		$data['content']=$this->load->view('inc/editauth',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function updateauthor(){
        $data['id']=$this->input->post('authid');
		$data['name']=$this->input->post('authname');

        $id=$data['id'];  
		$name=$data['name'];
		if(empty($name)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("author/editauthor/".$id);
		}else{
			$this->auth_model->updateAuthorData($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">updated</span>';
            $this->session->set_flashdata($sdata);
            redirect("author/editauthor/".$id);
		}
	}
	public function deleteauthor($auth_id){
		    $this->auth_model->delAuthById($auth_id);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">deleted</span>';
            $this->session->set_flashdata($sdata);
            redirect("author/authorlist");
	}
}

