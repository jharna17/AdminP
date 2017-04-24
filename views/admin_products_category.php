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
                        <li><a href="<?php echo site_url('admin/admin_productscategory/' . $row->categoryname); ?>"><?php echo $row->categoryname; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li> <a href="<?php echo site_url('admin/admin_clients'); ?>">Clients</a> </li>
            <li> <a href="<?php echo site_url('admin/admin_contacts'); ?>">Contacts</a> </li>
        </ul>

        <div style="width: 48%;border: solid red 1px; display: inline-block">

            <?php
            //print_r($pcat->result());
            foreach ($pcat->result() as $row) {
                ?>               
                <h3><?php echo $row->productname; ?></h3>
                <img src="<?php echo base_url(); ?>/images/<?php echo $row->productimage; ?>.jpg" alt="po">
                <p><?php echo $row->productdesc; ?></p>
            <?php } ?>
        </div>

        <div style="width: 48%; border: solid blue 1px; display: inline-block">
            <div>
                
                <h2>Add product</h2>
                <?php echo form_open_multipart('admin/add_product/' . $catid); ?>
                New product name: <input name='newpname' type="text">
                <br>
                New product image: <input type="file" name="newimg">
                <br>
                New product description: <input name='newpdesc' type="text">
                <br>
                <input type="submit">
                <?php echo form_close(); ?>
            </div>
            <br>
            <div>
                <?php
                //print_r($pcat->result());
                foreach ($pcat->result() as $row) {
                    ?>
                    <div style="border: solid 1px red">
                        <a href='<?php echo site_url('admin/delete_product/' . $row->productid); ?>'> Delete product</a>
                        <br>
                        <?php echo form_open_multipart('admin/editproduct/' . $row->productid); ?>
                        Product name:
                        <input name='newpname' type="text" placeholder="<?php echo $row->productname; ?>" value="<?php echo $row->productname; ?>">
                        <br>
                        Product description:
                        <input name='newpdesc' type="text" placeholder="<?php echo $row->productdesc; ?>" value="<?php echo $row->productdesc; ?>">
                        <br>
                        <img alt="po" src="<?php echo base_url(); ?>/images/<?php echo $row->productimage; ?>.jpg">
                        <br>
                        New image: <input type="file" name="newimg">
                        <br>
                        <input type="submit">
                        <?php echo form_close(); ?>
                        <br>

                    </div>
                <?php } ?>

            </div>
        </div>

    </body>
</html>