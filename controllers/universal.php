<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Universal extends CI_Controller{
    
    private $data=array("a"=>"a");
    
    public function __construct() {
        echo "entering home cons<BR>";
        parent::__construct();
        echo "after parent_cons<BR>";
        $this->load->model('model_fileread','aaa');    
        $this->load->model('model_changes','bbb');    
        echo "exiting home cons<BR>";
        $this->indexhelper();
    } 
   
    public function index() {
        echo "entering index()<br>";
        $this->load->view('home', $this->data);
        echo "exiting index()<br>";
    }
    
    public function indexhelper(){
        $allcatresult= $this->aaa->totalcat();
        //print_r($allcatresult->row(0));
        $this->data['allcat']=$allcatresult;
    }

    public function homepage(){
        echo "entering homepage()<br>";
        $this->index();
        echo "exiting homepage()<br>";
    }
    
    public function aboutus(){
        
        echo "entering abtus()<br>";
        $this->data['aboutus_article']=$this->aaa->aboutus();
        $this->load->view('aboutus', $this->data);
        echo "exiting abtus()<br>"; 
    }
    
    
    public function productscategory($catname){
        $this->data['pcat']=  $this->aaa->pcat($catname);
        $this->load->view('products_category', $this->data);
    }

    public function clients() {
        $this->data['clients']=  $this->aaa->clients();
        $this->load->view('clients', $this->data);
    }
        
    public function contacts() {
        $this->data['contacts']=  $this->aaa->contacts();
        $this->load->view('contacts', $this->data);
    }
    
    public function inquiry() {
        $this->load->helper('form');
        $name=  $this->input->post('name');
        $emailid=  $this->input->post('emailid');
        $message=  $this->input->post('message');
        $address=  $this->input->post('address');
        $contactno=  $this->input->post('contactno');
        $subject=  $this->input->post('subject');
        $this->bbb->inquiry($name,$emailid, $subject, $message, $address, $contactno);
        $this->load->view('inquirysuccess', $this->data);
    }
    
    public function adminlogin(){
            
            $this->load->helper('form');
            $this->load->view('view_adminlogin', $this->data);
            
    }
    
    public function adminlogincheck() {
            
            $this->load->helper('form');    
            $password=$this->input->post('password');
            $this->load->model('model_authenticateadmin','ccc');
            $q=$this->ccc->authpass($password);
            if($q==TRUE){
                
                $sql1="select * from admin where password='".$password."'";
                $query=  $this->db->query($sql1);
                $this->session->set_userdata('adminlogin', TRUE);
                $this->session->set_userdata('username', $query->row(0)->username);
                $this->session->set_userdata('error', "no error");
                redirect_location('admin');
            }        
            else{
                $this->session->set_userdata('error',"Invalid Password");
                $this->load->view('view_adminloginfail', $this->data);
            }
            
            echo "exiting adminloginchk()<br>";
    }
}
