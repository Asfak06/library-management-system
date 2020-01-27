<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->set_header("last-Modified:" .gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0",false);
        $this->output->set_header("Pragma: no-cache");
		$this->load->model('book_model');
		$this->load->model('dep_model');
		$this->load->model('auth_model');
		$data=array();	
	}
	public function addbook(){
		$data['title']='Add new book';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depdata']=$this->dep_model->getAlldepData();
		$data['authdata']=$this->auth_model->getAllauthData();
		$data['content']=$this->load->view('inc/addbook',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function addBookForm(){
		$data['bookname']=$this->input->post('bookname');		
		$data['auth']=$this->input->post('auth');
		$data['dept']=$this->input->post('dept');	
		$data['stock']=$this->input->post('stock');	
		$name=$data['bookname'];
		$dept=$data['dept'];
		$auth=$data['auth'];	
		$stock=$data['stock'];	
		if(empty($name) && empty($dept) && empty($auth)&& empty($stock) ){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("book/addbook");
		}else{
			$this->book_model->saveBook($data);			
			$sdata=array();
            $sdata['msg']='<span style="color:green;">Added to database </span>';
            $this->session->set_flashdata($sdata);
            redirect("book/addbook");
		}
	}
	public function booklist(){
        $data['title']='Book list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['bookdata']=$this->book_model->getAllbookData();
		$data['content']=$this->load->view('inc/listbook',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function editbook($bookid){
		$data['title']='Edit Book';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['bookById']=$this->book_model->getBookById($bookid);
		$data['departdata']=$this->dep_model->getAlldepData();
		$data['authdata']=$this->auth_model->getAllauthData();
		$data['content']=$this->load->view('inc/editbookform',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function deletebook($bookid){
            $this->book_model->delBookById($bookid);
            $auth_id=$bookid;
            $this->auth_model->delAuthById($auth_id);

			$sdata=array();
            $sdata['msg']='<span style="color:green;">deleted</span>';
            $this->session->set_flashdata($sdata);
            redirect("book/booklist");
	}
	public function updatebook(){
		$data['bookid']=$this->input->post('id');
		$data['bookname']=$this->input->post('name');
		$data['dept']=$this->input->post('dept');
		$data['auth']=$this->input->post('auth');
		$data['stock']=$this->input->post('stock');
        
        $id=$data['bookid'];  
		$name=$data['bookname'];
		$dept=$data['dept'];
		$auth=$data['auth'];
		$stock=$data['stock'];
		if(empty($name) && empty($dept) && empty($auth) && empty($stock)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("book/editbook/".$id);
		}else{
			$this->book_model->updateBookData($data);		
			$sdata=array();
            $sdata['msg']='<span style="color:green;">updated</span>';
            $this->session->set_flashdata($sdata);
            redirect("book/editbook/".$id);
		}
	}

}
?>