<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_fileread extends CI_Model{
    
    public function __construct() {
        parent::__construct();        
    } 
   
    public function totalcat(){
        $db=  $this->load->database();
        $sql1="select * from products";
        $result= $this->db->query($sql1);
        return $result;
    }
    
    public function aboutus(){
        $db=  $this->load->database();
        $sql1="select * from aboutus";
        $result=  $this->db->query($sql1);
        return $result;
    }
    
    public function getcatid($catname) {
        $db=  $this->load->database();
        $sql='select categoryid from products where categoryname="'.$catname.'"';
        $result=$this->db->query($sql);
        return ($result->result()[0]->categoryid);
        
    }
    
    public function pcat($catname){
        $db=  $this->load->database();
        $sql1='select categoryid from products where categoryname="'.$catname.'"';
        $result= $this->db->query($sql1);
        $catid=$result->row(0)->categoryid;
        $result=null;
        $sql2='select * from productdetails where categoryid='.$catid;
        $result=  $this->db->query($sql2);
        return $result;
    }

    public function clients() {
        $db=  $this->load->database();
        $sql1='select * from clients';
        $result=  $this->db->query($sql1);
        return $result;
    }
    
    public function contacts() {
        $db=  $this->load->database();
        $sql1='select * from contacts';
        $result=  $this->db->query($sql1);
        return $result;
    }  
}