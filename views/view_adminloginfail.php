<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <title>Admin Login Fail</title>
        
    </head>
    <body>
        <ul>
            <li> <a id="adminlink" href="<?php echo site_url("universal/adminlogin"); ?>">Admin</a></li>
            <li> <a href="<?php echo site_url('universal/aboutus');?>">About Us</a></li>
            <li> <a href="javascript:void(0);">Products</a> 
                <ul id="allcategories">
                    <?php foreach ($allcat->result() as $row){?>
                    <li><a href="<?php echo site_url('universal/productscategory/'.$row->categoryname); ?>"><?php echo $row->categoryname;  ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li> <a href="<?php echo site_url('universal/clients'); ?>">Clients</a> </li>
            <li> <a href="<?php echo site_url('universal/contacts') ?>">Contacts</a> </li>
        </ul>
        
        <div id="err-msg">
            <p>
                <?php echo $this->session->error; ?>
                <?php print_r($this->session->userdata()); ?>
            </p>
        </div>
    </body>
</html>