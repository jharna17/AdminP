<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<html>
    <head>
        <title>Admin Functions</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>./css/common.css"/>
    </head>
    <body>
        <ul>
            <li> <a id="adminlink" href="<?php echo site_url("admin/signout"); ?>">Log Out</a></li>
            <li> <a href="<?php echo site_url('admin/admin_aboutus'); ?>">About Us</a></li>
            <li> <a href="<?php echo site_url('admin/admin_products') ?>">Products</a> 
                <ul id="allcategories">
                    <?php foreach ($allcat->result() as $row) { ?>
                        <li><a href="<?php echo site_url('admin/admin_productscategory/' . $row->categoryname); ?>"><?php echo $row->categoryname; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li> <a href="<?php echo site_url('admin/admin_clients'); ?>">Clients</a> </li>
            <li> <a href="<?php echo site_url('admin/admin_contacts') ?>">Contacts</a> </li>
        </ul>

        <div style="border: solid black 2px; width: 48%; display: inline-block">
            <?php foreach ($clients->result() as $row) { ?>        

                <h2> <?php echo $row->clientname; ?></h2>
                
                <img alt="po" src="<?php echo base_url(); ?>/images/<?php echo $row->clientimage; ?>.jpg">                
                <br>

                <?php echo $row->clientwebsitelink; ?>
                <br>
                <?php echo $row->clientmailid; ?>             
                <br>
                <br>
            <?php } ?>
        </div>

        <div style="width: 50%; border: solid red 2px; display: inline-block">
            <div style="border: solid 2px blue">
                Add clients
                <?php echo form_open_multipart('admin/add_clients/'); ?>
                <br>
                Client Name: <input name='newclientname' type="text">
                <br>
                Client Image: <input type="file" name="newimg"> 
                <br>
                Client Website: <input name='newclientwebsitelink' type="text">
                <br>
                Client Email: <input name='newclientemailid' type="text">
                <br>
                <input type="submit">
                <?php echo form_close(); ?>
            </div>


            <?php foreach ($clients->result() as $row) { ?>        
                <div style="border: solid gray 2px;">     
                    
                    <a href='<?php echo site_url('admin/delete_client/' . $row->clientid); ?>'> Delete client</a>                    

                    <?php echo form_open_multipart('admin/editclient/' . $row->clientid) ?>
                    Client Name: <input name='newcname' type="text" placeholder="<?php echo $row->clientname; ?>" value="<?php echo $row->clientname; ?>">
                    <br>
                    <img alt="po" src="<?php echo base_url(); ?>/images/<?php echo $row->clientimage; ?>.jpg">
                    <br>
                    New image: <input type="file" id="newimg" name="newimg">
                    <br>
                    Client website: <input name='newcweb' type="text" placeholder="<?php echo $row->clientwebsitelink; ?>" value="<?php echo $row->clientwebsitelink; ?>">
                    <br>
                    Client email: <input name='newcmail' type="text" placeholder="<?php echo $row->clientmailid; ?>" value="<?php echo $row->clientmailid; ?>">
                    <br>
                    <input type="submit">
                    <?php echo form_close(); ?>
                </div>
            <?php } ?>

        </div>
    </body>
</html>