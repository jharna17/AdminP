<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_changes extends CI_Model {

    public function edit_aboutus_heading($newh1) {
        $db = $this->load->database();
        $sql1 = 'update aboutus set heading1="' . $newh1 . '"';
        $result = $this->db->query($sql1);
    }

    public function edit_aboutus_ld($newld) {
        $db = $this->load->database();
        $sql1 = 'update aboutus set leading_description="' . $newld . '"';
        $result = $this->db->query($sql1);
    }

    public function edit_aboutus_fd($newfd) {
        $db = $this->load->database();
        $sql1 = 'update aboutus set following_description="' . $newfd . '"';
        $result = $this->db->query($sql1);
    }

    public function edit_aboutus_image($imgbyuser, $newimage) {
        $db = $this->load->database();
        $sql1 = 'update aboutus set imagebyuser="' . $imgbyuser . '", image="' . $newimage . '"';
        $result = $this->db->query($sql1);
        return;
    }

    public function delete_aboutus_heading1() {
        $db = $this->load->database();
        $sql1 = 'update aboutus set heading1=""';
        $result = $this->db->query($sql1);
    }

    public function delete_aboutus_ld() {
        $db = $this->load->database();
        $sql1 = 'update aboutus set leading_description=""';
        $result = $this->db->query($sql1);
    }

    public function delete_aboutus_fd() {
        $db = $this->load->database();
        $sql1 = 'update aboutus set following_description=""';
        $result = $this->db->query($sql1);
    }

    public function add_category($newcatname, $newcatdesc, $imgname, $newname) {
        $db = $this->load->database();
        $sql1 = 'insert into products(categoryname, categorydesc, cgimagebyuser, categoryimage) values("' . $newcatname . '","' . $newcatdesc . '","' . $imgname . '","' . $newname . '")';
        $result = $this->db->query($sql1);
    }

    public function edit_category($catid, $newcatname) {
        $db = $this->load->database();
        $sql1 = 'update products set categoryname="' . $newcatname . '" where categoryid=' . $catid;
        $result = $this->db->query($sql1);
    }

    public function edit_categoryimage($catid, $imgname, $newname) {
        $db = $this->load->database();
        $sql1 = 'update products set cgimagebyuser="' . $imgname . '", categoryimage="' . $newname . '" where categoryid="' . $catid . '"';
        $this->db->query($sql1);
    }

    public function edit_categorydesc($catid, $newcatdesc) {
        $db = $this->load->database();
        $sql1 = 'update products set categorydesc="' . $newcatdesc . '" where categoryid=' . $catid;
        $result = $this->db->query($sql1);
    }

    public function delete_category($cat) {
        $db = $this->load->database();
        $sql1 = 'update products set categoryname="" where categoryname="' . $cat . '"';
        $result = $this->db->query($sql1);
    }

    public function delete_category_desc($cat) {
        $db = $this->load->database();
        $sql1 = 'update products set status=1 where categoryname="' . $cat . '"';
        $result = $this->db->query($sql1);
    }

    public function add_product($catid, $newpname, $newpdesc, $imgname, $newname) {
        $db = $this->load->database();
        $sql1 = "insert into productdetails(categoryid, productname, productdesc, pimagebyuser, productimage) values(" . $catid . ", '" . $newpname . "','" . $newpdesc . "','" . $imgname . "','" . $newname . "')";
        $result = $this->db->query($sql1);
    }

    public function edit_productname($pid, $newpname) {
        $db = $this->load->database();
        $sql1 = 'update productdetails set productname="' . $newpname . '" where productid=' . $pid;
        $result = $this->db->query($sql1);
    }

    public function edit_pimage($pid, $imgname, $newname) {
        $db = $this->load->database();
        $sql1 = 'update productdetails set pimagebyuser="' . $imgname . '", productimage="' . $newname . '" where productid=' . $pid;
        $this->db->query($sql1);
    }

    public function edit_productdesc($pid, $newpdesc) {
        $db = $this->load->database();
        $sql1 = 'update productdetails set productdesc="' . $newpdesc . '" where productid=' . $pid;
        $result = $this->db->query($sql1);
    }

    public function delete_product($pid) {
        $db = $this->load->database();
        $sql1 = 'delete from productdetails where productid=' . $pid;
        $result = $this->db->query($sql1);
    }

    public function inquiry($name, $emailid, $subject, $message, $address, $contactno) {
        $db = $this->load->database();
        echo $name;
        $sql1 = 'insert into inquirydetails(inquirername, emailid, subject, message, address, contactno) values ("' . $name . '","' . $emailid . '","' . $subject . '","' . $message . '","' . $address . '","' . $contactno . '")';
        $result = $this->db->query($sql1);
    }

    public function add_contactdetails($new_contact_field_name, $new_contact_info) {
        $db = $this->load->database();
        $sql1 = 'alter table contacts add ' . $new_contact_field_name . ' varchar(50)';
        $this->db->query($sql1);
        $sql2 = 'update contacts set ' . $new_contact_field_name . '= "' . $new_contact_info . '"';
        $this->db->query($sql2);
    }

    public function editcontacts($name, $desc, $add1, $add2, $cn1, $cn2, $email1, $email2, $web, $fb, $gplus, $twitr, $link) {
        $db = $this->load->database();
        $sql1 = 'update contacts set name="' . $name . '" , description="' . $desc . '" , addr1="' . $add1 . '" , addr2="' . $add2 . '", contactno1="' . $cn1 . '",'
                . ' contactno2="' . $cn2 . '", emailid1="' . $email1 . '", emailid2="' . $email2 . '", website="' . $web . '", fblink="' . $fb . '", gpluslink="'
                . $gplus . '", twitterlink="' . $twitr . '", linkedinlink="' . $link . '"';
        $this->db->query($sql1);
    }

//    
//    public function delete_cntdet($det) {
//        $db=  $this->load->database();
//        $sql1='update contacts set '.$det.'=""';
//        $this->db->query($sql1);
//    }

    public function add_clients($newcname, $newcweb, $newcemail, $imgname, $newimg) {
        $db = $this->load->database();
        $sql1 = 'insert into clients (clientname, clientwebsitelink, clientmailid, cimagebyuser, clientimage) '
                . 'values("' . $newcname . '","' . $newcweb . '","' . $newcemail . '","' . $imgname . '","' . $newimg . '")';
        $this->db->query($sql1);
    }

    public function edit_cname($clientid, $newcname) {
        $db = $this->load->database();
        $sql1 = 'update clients set clientname="' . $newcname . '" where clientid="' . $clientid . '"';
        $this->db->query($sql1);
    }

    public function edit_cimage($clientid, $imgname, $newimage) {
        $db = $this->load->database();
        $sql1 = 'update clients set cimagebyuser="' . $imgname . '", clientimage="' . $newimage . '" where clientid=' . $clientid;
        $this->db->query($sql1);
    }

    public function edit_cweb($clientid, $newcweb) {
        $db = $this->load->database();
        $sql1 = 'update clients set clientwebsitelink="' . $newcweb . '" where clientid=' . $clientid;
        $this->db->query($sql1);
    }

    public function edit_cmail($clientid, $newcmail) {
        $db = $this->load->database();
        $sql1 = 'update clients set clientmailid="' . $newcmail . '" where clientid=' . $clientid;
        $this->db->query($sql1);
    }

    public function delete_client($clientid) {
        $db = $this->load->database();
        $sql1 = 'delete from clients where clientid=' . $clientid;
        $this->db->query($sql1);
    }

}
