<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>
<html>
    <head>
        <title>Admin Functions</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/common.css">
    </head>
    <body>
        <ul>
            <li> <a id="adminlink" href="<?php echo site_url("admin/signout"); ?>">Log Out</a></li>
            <li> <a href="<?php echo site_url('admin/admin_aboutus');?>">About Us</a></li>
            <li> <a href="<?php echo site_url('admin/admin_products') ?>">Products</a> 
                <ul id="allcategories">
                    <?php foreach ($allcat->result() as $row){?>
                    <li><a href="<?php echo site_url('admin/admin_productscategory/'.$row->categoryname); ?>"><?php echo $row->categoryname; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li> <a href="<?php echo site_url('admin/admin_clients'); ?>">Clients</a> </li>
            <li> <a href="<?php echo site_url('admin/admin_contacts') ?>">Contacts</a> </li>
        </ul>;           
    </body>
</html>