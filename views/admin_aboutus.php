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
            <li> 
                <a href="<?php echo site_url('admin/admin_aboutus'); ?>">
                    About Us
                </a>
            </li>

            <li> 
                <a href="<?php echo site_url('admin/admin_products'); ?>">
                    Products
                </a>


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

            <li> 
                <a href="<?php echo site_url('admin/admin_clients'); ?>">
                    Clients
                </a>
            </li>

            <li> 
                <a href="<?php echo site_url('admin/admin_contacts') ?>">
                    Contacts
                </a>
            </li>

        </ul>
        <div style="width:49% ; display: inline-block; border: solid black 2px" >

            <h2> 
                <?php echo $aboutus_article->row(0)->heading1; ?> 
            </h2>

            <img id="aboutus_img" alt="po" src="<?php echo base_url(); ?>/images/<?php echo $aboutus_article->row(0)->image; ?>.jpg">

            <p id="leading_desc">
                <?php echo $aboutus_article->row(0)->leading_description; ?>
            </p>

            <p id="following_desc">
                <?php echo $aboutus_article->row(0)->following_description; ?>
            </p>

        </div>
        <div style="width: 50%; display: inline-block; border: solid red 2px">
            <?php echo form_open_multipart('admin/editaboutus'); ?>

            New heading: <input name='newheading1' size="50" id="newheading1" type="text" 
                                placeholder="<?php echo $aboutus_article->row(0)->heading1; ?>"
                                value="<?php echo $aboutus_article->row(0)->heading1;?>">
            <br>
            New Image: <img id="aboutus_img1" alt="po" src="<?php echo base_url(); ?>/images/<?php echo $aboutus_article->row(0)->image; ?>.jpg">
            Change here: <input type="file" name="newimg" >
            <br>
            New leading description: <textarea name='newld' id="newld" rows="10" cols="50"><?php echo $aboutus_article->row(0)->leading_description; ?>
            </textarea>
            <br>
            New following Description: <textarea name='newfd' id="newfd" rows="10" cols="50"><?php echo $aboutus_article->row(0)->following_description; ?>
            </textarea>
            <br>
            <input type="submit" name="submit">
            <?php echo form_close(); ?>
        </div>
    </body>
</html>