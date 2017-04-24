<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>
<!doctype html>
<html>
    <head>
        <title>
            About Us
        </title>
        <link rel="stylesheet" href="<?php echo base_url()?>./css/common.css">
    </head>
    <body>
        <?php //print_r($aboutus_article);?>
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
        <h2 id="heading1">
            <?php echo $aboutus_article->row(0)->heading1; ?>
        </h2>
        <img id="aboutus_img" alt="po" src="<?php echo base_url(); ?>/images/<?php echo $aboutus_article->row(0)->image;?>.jpg">
        <p id="leading_desc">
            <?php echo $aboutus_article->row(0)->leading_description; ?>
        </p>
        <p id="following_desc">
            <?php echo $aboutus_article->row(0)->following_description; ?>
        </p>
    </body>
</html>