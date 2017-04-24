<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>
<!doctype html>
<html>
    <head>
        <title>
            Punchmukhi Industries
        </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/common.css">
    </head>
    <body>

        <ul>
            <li> <a id="adminlink" href="<?php echo site_url("universal/adminlogin"); ?>">Admin</a></li>
            <li> <a href="<?php echo site_url('universal/aboutus'); ?>">About Us</a></li>
            <li> <a href="javascript:void(0);">Products</a> 
                <ul id="allcategories">
<?php foreach ($allcat->result() as $row) { ?>
                        <li><a href="<?php echo site_url('universal/productscategory/' . $row->categoryname); ?>"><?php echo $row->categoryname; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li> <a href="<?php echo site_url('universal/clients'); ?>">Clients</a> </li>
            <li> <a href="<?php echo site_url('universal/contacts') ?>">Contacts</a> </li>
        </ul>
        Name:
            <?php echo $contacts->row(0)->name . "<br><br>"; ?>
        Desc:
            <?php echo $contacts->row(0)->description . "<br><br>"; ?>
        Addr1:
            <?php echo $contacts->row(0)->addr1 . "<br><br>"; ?>
        Addr2:
            <?php echo $contacts->row(0)->addr2 . "<br><br>"; ?>
        CN1:
            <?php echo $contacts->row(0)->contactno1 . "<br><br>"; ?>
        CN2:
            <?php echo $contacts->row(0)->contactno2 . "<br><br>"; ?>
        EI1:
            <?php echo $contacts->row(0)->emailid1 . "<br><br>"; ?>
        EI2:
            <?php echo $contacts->row(0)->emailid2 . "<br><br>"; ?>
        Web:
            <?php echo $contacts->row(0)->website . "<br><br>"; ?>
        fblink:
            <?php echo $contacts->row(0)->fblink . "<br><br>"; ?>
        g+link:
            <?php echo $contacts->row(0)->gpluslink . "<br><br>"; ?>
        twittlink:
            <?php echo $contacts->row(0)->twitterlink . "<br><br>"; ?>
        linkdinlink:
            <?php echo $contacts->row(0)->linkedinlink . "<br><br>"; ?>
    
        <h2>Inquirers</h2>
        <form action="<?php echo site_url('universal/inquiry'); ?>" method="post">
            Name <input name="name" type="text"><br>
            Email Id <input name="emailid" type="text"><br>
            Subject <input name="subject" type="text"><br>
            Contactno <input name="contactno" type="number"><br>
            Address <input name="address" type="text"><br>
            Message <input name="message" type="text"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>