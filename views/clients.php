<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>
<!doctype html>
<html>
    <head>
        <title>
            Clients
        </title>
        <link rel="stylesheet" href='<?php echo base_url(); ?>/css/common.css'>
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
        
        <?php foreach ($clients->result() as $row){?>
        
            <?php   echo '<h2>'.$row->clientname."</h2><br>";
            ?>
                    <img alt="po" src="<?php echo base_url(); ?>/images/<?php echo $row->clientimage; ?>.jpg">
            <?php
                    echo $row->clientwebsitelink."<br>";
                    echo $row->clientmailid."<br>";
            ?>            
        
        <?php }?>
    </body>
</html>
