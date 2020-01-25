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
		$this->load->model('student_model');
		$this->load->model('manage_model');
		
		$data=array();	
	}
	public function issuebook(){
      	$data=array();
		$data['title']='Issue book';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depdata']=$this->dep_model->getAlldepData();
		$data['studata']=$this->student_model->getAllstudentData();
		$data['content']=$this->load->view('inc/issuebook',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
	}
	public function addIssueForm(){
        $data['sname']=$this->input->post('sname');
		$data['dept']=$this->input->post('dept');
		$data['reg']=$this->input->post('reg');
		$data['session']=$this->input->post('ses');
		$data['bname']=$this->input->post('book');
		$name=$data['sname'];
		$dept=$data['dept'];
		$reg=$data['reg'];
		$session=$data['session'];
		$book=$data['bname'];
		if(empty($name) && empty($dept) && empty($reg) && empty($session) && empty($book)){
           $sdata=array();
           $sdata['msg']='<span style="color:red ">field must not be empty</span>';
           $this->session->set_flashdata($sdata);
           redirect("manage/issuebook");
		}else{
			$this->manage_model->saveIssueData($data);
			$sdata=array();
            $sdata['msg']='<span style="color:green;">Added to database </span>';
            $this->session->set_flashdata($sdata);
            redirect("manage/issuebook");
		}
	}

	public function issuelist(){
		$data['title']='Issue list';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['issuedata']=$this->manage_model->getAllIssueData();
		$data['depdata']=$this->dep_model->getAlldepData();
		$data['studata']=$this->student_model->getAllstudentData();
		$data['bookdata']=$this->book_model->getAllbookData();
		$data['content']=$this->load->view('inc/issuelist',$data,TRUE);
		$data['footer']=$this->load->view('inc/footer','',TRUE);
		$this->load->view('home',$data);
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
	public function getStuDataById($stu){
		        $getAllStu=$this->manage_model->getStuDataById($stu);
				$output=null;
                // $output .='<input type="text" value="0">';
                // $output .='<option value="0">select one</option>';
                foreach ($getAllStu as $stu) {
                	// $output .='<input value="'.$stu->reg.'">';
                	$output .='<option value="'.$stu->id.'">'.$stu->reg.'</option>';
                }
                echo  $output;
	}
	public function getsesStuDataById($stu){
		        $getAllStu=$this->manage_model->getStuDataById($stu);
				$output=null;          
                foreach ($getAllStu as $stu) {              	
                	$output .='<option value="'.$stu->id.'">'.$stu->session.'</option>';
                }
                echo  $output;
	}

}