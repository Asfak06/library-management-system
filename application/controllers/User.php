<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->output->set_header("last-Modified:" .gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0",false);
        $this->output->set_header("Pragma: no-cache");

		$this->load->model('user_model');	
		// 		if (!$this->session->userdata('userlogin')) {
		// 	redirect('user/login');
		// }
	
	}
    public function login(){
		$this->load->view('login');
	}
   public function loginForm(){
   		$data=array();
		$data['name']=$this->input->post('name');
		$data['pass']=$this->input->post('pass');
		$check=$this->user_model->checkUser($data);
		if ($check) {
           $sdata=array();
           $sdata['userid']=$check->user_id;
           $sdata['userlogin']=TRUE;
           $this->session->set_userdata($sdata);
           redirect('library');
		}else{
		   $sdata=array();
           $sdata['msg']='<span style="color:red ">Wrong input</span>';
           $this->session->set_flashdata($sdata);
           redirect("user/login");
		}
	}
	public function logout(){
		  $this->session->unset_userdata($userid);
		  $this->session->set_userdata('userlogin',FALSE);
		  $this->session->sess_destroy();
		  redirect("user/login");
	}
	public function create(){
		  $this->load->view('signup');
	}
	public function signupForm(){
		$data=array();
		$data['name']=$this->input->post('name');
		$password=$this->input->post('pass');
		$data['fname']=$this->input->post('fname');
		$data['lname']=$this->input->post('lname');
		$data['email']=$this->input->post('email');
		$data['phone']=$this->input->post('phone');
        $data['pass']=md5($password);
		$name=$data['name'];
		$pass=$data['pass'];
		$fname=$data['fname'];
		$lname=$data['lname'];
		$phone=$data['phone'];
		$email=$data['email'];
		if(empty($name) && empty($pass) && empty($fname) && empty($lname) && empty($phone) && empty($email)){
           $sdata=array();
           $sdata['msg']='<span style="color:red "Field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("user/create");
		}else{
			$this->user_model->saveAdmin($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">Added to database </span>';
            $this->session->set_flashdata($sdata);
            redirect("user/create");
		}
	}
	public function admins(){
        $data=array();
		$data['title']='Admin list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$user_id=1;
		$data['adById']=$this->user_model->getAdminById($user_id);
		$data['admindata']=$this->user_model->getAlladminsData();
		$data['content']=$this->load->view('inc/listadmins',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
 public function deladmin($user_id){
 	        $this->user_model->delAdminById($user_id);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">deleted</span>';
            $this->session->set_flashdata($sdata);
            redirect("user/admins");
 }
}
?>