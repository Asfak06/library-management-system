<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->set_header("last-Modified:" .gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0",false);
        $this->output->set_header("Pragma: no-cache");
		$this->load->model('book_model');
		$this->load->model('dep_model');
		$this->load->model('manage_model');
		$data=array();	
	}
	public function issuebook(){
      	$data=array();
		$data['title']='Issue book';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depdata']=$this->dep_model->getAlldepData();
		$data['content']=$this->load->view('inc/issuebook',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function addIssueForm(){

	}

	public function issuebooklist(){

	}
	public function getBookByDepId($dep){
				$getAllBook=$this->manage_model->getBookByDep($dep);
				$output=null;
                $output .='<option value="0">select one</option>';
                foreach ($getAllBook as $book) {
                	$output .='<option value="'.$book->bookid.'">'.$book->bookname.'</option>';
                }
                echo  $output;
	}
}