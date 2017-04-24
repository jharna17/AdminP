<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller {

    private $data = array("a" => "a");

    public function __construct() {
        parent::__construct();
        cml('universal/index');
        $this->load->model('model_fileread', 'aaa');
        $this->load->model('model_changes', 'bbb');
        $this->indexhelper();   
    }

    public function indexhelper() {
        $allcatresult = $this->aaa->totalcat();
        //print_r($allcatresult->row(0));
        $this->data['allcat'] = $allcatresult;
    }

    /*     * ***************************************************************************************************************************************************** */

    public function admin_aboutus() {
        $this->load->helper('form');
        echo "entering abtus()<br>";
        $this->data['aboutus_article'] = $this->aaa->aboutus();
        $this->load->view('admin_aboutus', $this->data);
        echo "exiting abtus()<br>";
    }

    public function edit_aboutus_heading1() {
        $this->load->helper('form');
        $newh1 = $this->input->post('newheading1');
        echo $newh1;
        $this->bbb->edit_aboutus_heading($newh1);
    }

    public function edit_aboutus_ld() {
        $this->load->helper('form');
        $newld = $this->input->post('newld');
        echo $newld;
        $this->bbb->edit_aboutus_ld($newld);
    }

    public function edit_aboutus_fd() {
        $this->load->helper('form');
        $newfd = $this->input->post('newfd');
        echo $newfd;
        $this->bbb->edit_aboutus_fd($newfd);
    }

//    public function delete_aboutus_heading1() {
//        $this->bbb->delete_aboutus_heading1();
//    }

    public function edit_aboutus_image() {
        $this->load->helper('form');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        if (!$_FILES['newimg']['name'] == null) {
            $imgbyuser = $_FILES['newimg']['name'];
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            print_r($_FILES);
            echo "<br>" . $new_name;
            echo "<br>" . $imgbyuser;
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
            $this->bbb->edit_aboutus_image($imgbyuser, $new_name);
        }
    }

//    public function delete_aboutus_fd() {
//        $this->bbb->delete_aboutus_fd();
//    }
//
//    public function delete_aboutus_ld() {
//        $this->bbb->delete_aboutus_ld();
//    }

    public function editaboutus() {
        $this->edit_aboutus_heading1();
        $this->edit_aboutus_image();
        $this->edit_aboutus_fd();
        $this->edit_aboutus_ld();
        redirect_location('admin/admin_aboutus');
    }

    /*     * ***************************************************************************************************************************************************** */

    /*     * ***************************************************************************************************************************************************** */

    public function admin_products() {
        $this->load->helper('form');
        $this->load->view('admin_products', $this->data);
    }

    public function add_category() {
        $this->load->helper('form');
        $newcatname = $this->input->post('newcatname');
        $newcatdesc = $this->input->post('newcatdesc');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $imgname = $_FILES['newimg']['name'];
        if ($imgname != NULL) {
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            //print_r($_FILES);
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
        } else {
            $new_name - null;
        }

        $this->bbb->add_category($newcatname, $newcatdesc, $imgname, $new_name);
        redirect_location('admin/admin_products');
    }

    public function edit_category($catid) {
        $this->load->helper('form');
        $newcatname = $this->input->post('newcatname');
        $this->bbb->edit_category($catid, $newcatname);
    }

    public function edit_categorydesc($catid) {
        $this->load->helper('form');
        $newcatdesc = $this->input->post('newcatdesc');
        $this->bbb->edit_categorydesc($catid, $newcatdesc);
    }

    public function edit_categoryimage($catid) {
        $this->load->helper('form');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $imgname = $_FILES['newimg']['name'];
        if ($imgname != NULL) {
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            //print_r($_FILES);
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
            $this->bbb->edit_categoryimage($catid, $imgname, $new_name);
        }
    }

    public function editcategory($catid) {
        $this->edit_category($catid);
        $this->edit_categorydesc($catid);
        $this->edit_categoryimage($catid);
        redirect_location('admin/admin_products');
    }

    public function delete_category($cat) {
        $this->bbb->delete_category($cat);
    }

    public function delete_category_desc($cat) {
        $this->bbb->delete_category_desc($cat);
    }

    /*     * ***************************************************************************************************************************************************** */

    /*     * ***************************************************************************************************************************************************** */

    public function admin_productscategory($catname) {
        $this->load->helper('form');
        $this->data['catid'] = $this->aaa->getcatid($catname);
        $this->data['pcat'] = $this->aaa->pcat($catname);
        $this->load->view('admin_products_category', $this->data);
    }

    public function add_product($catid) {
        $this->load->helper('form');
        $newpname = $this->input->post('newpname');
        $newpdesc = $this->input->post('newpdesc');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1000000000;
        $config['max_width'] = 1024000000;
        $config['max_height'] = 7680000000;
        $imgname = $_FILES['newimg']['name'];
        if ($imgname != null) {
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            //print_r($_FILES);
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
        } else {
            $new_name = NULL;
        }
        $this->bbb->add_product($catid, $newpname, $newpdesc, $imgname, $new_name);
        redirect_location('admin/admin_products');
    }

    public function edit_productname($pid) {
        $this->load->helper('form');
        $newpname = $this->input->post('newpname');
        $this->bbb->edit_productname($pid, $newpname);
    }

    public function edit_productdesc($pid) {
        $this->load->helper('form');
        $newpdesc = $this->input->post('newpdesc');
        $this->bbb->edit_productdesc($pid, $newpdesc);
    }

    public function edit_productimage($pid) {
        $this->load->helper('form');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $imgname = $_FILES['newimg']['name'];
        if ($imgname != null) {
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            //print_r($_FILES);
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
            $this->bbb->edit_pimage($pid, $imgname, $new_name);
        }
    }

    public function delete_product($pid) {
        $this->bbb->delete_product($pid);
    }

    public function editproduct($pid) {
        $this->edit_productdesc($pid);
        $this->edit_productimage($pid);
        $this->edit_productname($pid);

        redirect_location('admin/admin_products');
    }

    /*     * ***************************************************************************************************************************************************** */


    /*     * **************************************************************************************************************************************************** */

    public function admin_contacts() {
        $this->load->helper('form');
        $this->data['contacts'] = $this->aaa->contacts();
        $this->load->view('admin_contacts', $this->data);
    }

//    public function add_contactdetails() {
//        $this->load->helper('form');
//        $new_contact_field_name = $this->input->post('new_contact_field_name');
//        $new_contact_info = $this->input->post('new_contact_info');
//        $this->bbb->add_contactdetails($new_contact_field_name, $new_contact_info);
//    }

    public function editcontacts() {
        $this->load->helper('form');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $add1 = $this->input->post('add1');
        $add2 = $this->input->post('add2');
        $cn1 = $this->input->post('cn1');
        $cn2 = $this->input->post('cn2');
        $email1 = $this->input->post('email1');
        $email2 = $this->input->post('email2');
        $web = $this->input->post('web');
        $fb = $this->input->post('fb');
        $gplus = $this->input->post('gplus');
        $twitr = $this->input->post('twitr');
        $link = $this->input->post('link');
        $this->bbb->editcontacts($name, $desc, $add1, $add2, $cn1, $cn2, $email1, $email2, $web, $fb, $gplus, $twitr, $link);
        redirect_location('admin/admin_products');
    }

//
//    public function delete_cntdet($det) {
//        $this->bbb->delete_cntdet($det);
//    }
    /*     * ***************************************************************************************************************************************************** */




    /*     * **************************************************************************************************************************************************** */
    public function add_clients() {
        $this->load->helper('form');
        $newcname = $this->input->post('newclientname');
        $newcweb = $this->input->post('newclientwebsitelink');
        $newcemail = $this->input->post('newclientemailid');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1000000000;
        $config['max_width'] = 1024000000;
        $config['max_height'] = 7680000000;
        $imgname = $_FILES['newimg']['name'];
        if ($imgname != null) {
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            //print_r($_FILES);
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
        } else {
            $new_name = NULL;
        }
        $this->bbb->add_clients($newcname, $newcweb, $newcemail, $imgname, $new_name);
        redirect_location('admin/admin_clients');
    }

    public function admin_clients() {
        $this->data['clients'] = $this->aaa->clients();
        $this->load->helper('form');
        $this->load->view('admin_clients', $this->data);
    }

    public function delete_client($client) {
        $this->bbb->delete_client($client);
    }

    public function edit_cname($clientid) {
        $this->load->helper('form');
        $newcname = $this->input->post('newcname');
        $this->bbb->edit_cname($clientid, $newcname);
    }

    public function edit_cimage($clientid) {
        $this->load->helper('form');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $imgname = $_FILES['newimg']['name'];
        if ($imgname != null) {
            $new_name = time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            //print_r($_FILES);
            if (!$this->upload->do_upload('newimg')) {
                $this->upload->display_errors();
            }
            $this->bbb->edit_cimage($clientid, $imgname, $new_name);
        }
    }

    public function edit_cweb($clientid) {
        $this->load->helper('form');
        $newcweb = $this->input->post('newcweb');
        $this->bbb->edit_cweb($clientid, $newcweb);
    }

    public function edit_cmail($clientid) {
        $this->load->helper('form');
        $newcmail = $this->input->post('newcmail');
        $this->bbb->edit_cmail($clientid, $newcmail);
    }

    public function editclient($clientid) {
        $this->edit_cname($clientid);
        $this->edit_cimage($clientid);
        $this->edit_cweb($clientid);
        $this->edit_cmail($clientid);
        redirect_location('admin/admin_clients');
    }

    /*     * ********************************************************************************************************************************** */

    public function signout() {
        $this->session->sess_destroy();
        redirect_location('universal');
    }

    public function index() {
        if ($this->session->adminlogin == TRUE) {
            $this->load->view('view_adminfunc', $this->data);
        }
        else{
            redirect_location('universal');
        }
    }

}
