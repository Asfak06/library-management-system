<?php

class Book_Model extends CI_Model
{
  public function saveBook($data){
    $this->db->insert('tbl_book',$data);
  }
  public function getAllbookData(){
        $this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->order_by('bookid','desc');
		$qresult=$this->db->get();
		$result=$qresult->result();
		return $result;
  }
  public function getBookById($bookid){
        $this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->where('bookid',$bookid);
		$qresult=$this->db->get();
		$result=$qresult->row();
		return $result;
  }
  public function updateBookData($data){
        $this->db->set('bookname',$data['bookname']);
        $this->db->set('dept',$data['dept']);
        $this->db->set('auth',$data['auth']);
        $this->db->where('bookid',$data['bookid']);
        $this->db->update('tbl_book');
  }
  public function delBookById($bookid){
  	     $this->db->where('bookid',$bookid);
    	$this->db->delete('tbl_book');
  }
}
?>