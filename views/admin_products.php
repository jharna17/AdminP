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
            <li> <a href="<?php echo site_url('admin/admin_aboutus'); ?>">About Us</a></li>
            <li> <a href="<?php echo site_url('admin/admin_products'); ?>">Products</a> 
                <ul id="allcategories">
                    <?php foreach ($allcat->result() as $row) { ?>
                        <li>
                            <a href="<?php echo site_url('admin/admin_productscategory/' . $row->categoryname); ?>">
                                <?php echo $row->categoryname; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li> <a href="<?php echo site_url('admin/admin_clients'); ?>">Clients</a> </li>
            <li> <a href="<?php echo site_url('admin/admin_contacts') ?>">Contacts</a> </li>
        </ul>
        <div style="border: solid red 1px; width: 48%; display: inline-block">

            <?php foreach ($allcat->result() as $row) { ?>

                <?php echo $row->categoryname; ?>

                <img alt="po" src="<?php echo base_url(); ?>/images/<?php echo $row->categoryimage; ?>.jpg">

                <p>
                    <?php
                    echo $row->categorydesc;
                    ?>
                </p>

            <?php } ?>

        </div>
        <div style="display: inline-block; width: 48%; border: solid blue 1px;">
            <div>
                <h2>Add category </h2>
                <?php echo form_open_multipart('admin/add_category'); ?>
                New category name: <input name='newcatname' type="text">
                <br>
                New category description: <input name='newcatdesc' type="text">
                <br>
                New category image: <input type="file" name="newimg">
                <br>
                <input type="submit">
                <?php echo form_close(); ?>
            </div>





            <?php foreach ($allcat->result() as $row) { ?>
            <div style="border: solid green 1px">
                    <?php echo form_open_multipart('admin/editcategory/'.$row->categoryid); ?>
                    Category name: <input name='newcatname' type="text" placeholder="<?php echo $row->categoryname; ?>" value="<?php echo $row->categoryname; ?>">
                    <br>
                    <img alt="po" src="<?php echo base_url(); ?>/images/<?php echo $row->categoryimage; ?>.jpg">
                    <br>
                    New image: <input type="file" id="newimg" name="newimg">
                    <br>   
                    Category description: <input name='newcatdesc' type="text" placeholder="<?php echo $row->categorydesc; ?>" value="<?php echo $row->categorydesc; ?>">
                    <br>
                    <input type="submit">
                    <?php echo form_close(); ?>
                </div>          
            <?php } ?>

        </div>        
    </body>
</html>