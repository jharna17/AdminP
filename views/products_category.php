<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>
<!doctype html>
<html>
    <head>
        <title>
           Category
        </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/common.css">
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
        
        <?php //print_r($pcat->result());
            foreach ($pcat->result() as $row){
        ?>
        <h3><?php echo $row->productname;?></h3>
        
        <p><?php echo $row->productdesc; ?></p>
        
        <img src="<?php echo base_url(); ?>/images/<?php echo $row->productimage; ?>.jpg" alt="po">
        <?php
            }
        ?>
    </body>
</html>