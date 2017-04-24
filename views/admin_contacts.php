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

        <div style="width: 48%; border: solid red 1px; display: inline-block">
            <h1>
                CONTACTS
            </h1>
            Name:
            <?php echo $contacts->row(0)->name . "<br><br>"; ?>

            Description:
            <?php echo $contacts->row(0)->description . "<br><br>"; ?>

            Address1:
            <?php echo $contacts->row(0)->addr1 . "<br><br>"; ?>

            Address2:
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

        </div>

        <div style="width: 48%; border: solid red 1px; display: inline-block">
<!--            <div style="border: solid blue 2px;">
                Add another field in contacts:
                <?php echo form_open_multipart('admin/add_contactdetails'); ?>
                New contact field name: <input name='new_contact_field_name' type="text">
                <br>
                New contact field value: <input name='new_contact_info' type="text">
                <br>
                <input type="submit">
                <?php echo form_close(); ?>
            </div>-->
            <div>
                <?php echo form_open_multipart('admin/editcontacts') ?>
                <h2>
                    Edit Contact details
                </h2>
                Name:
                <input name='name' type="text" placeholder="<?php echo $contacts->row(0)->name; ?>" value="<?php echo $contacts->row(0)->name; ?>">
                <br>

                Description:
                <input name='desc' type="text" placeholder="<?php echo $contacts->row(0)->description; ?>" value="<?php echo $contacts->row(0)->description; ?>">
                <br>

                Addr1:                
                <input name='add1' type="text" placeholder="<?php echo $contacts->row(0)->addr1; ?>" value="<?php echo $contacts->row(0)->addr1; ?>">
                <br>

                Addr2:                                
                <input name='add2' type="text" placeholder="<?php echo $contacts->row(0)->addr2; ?>" value="<?php echo $contacts->row(0)->addr2; ?>">
                <br>

                CN1:
                <input name='cn1' type="text" placeholder="<?php echo $contacts->row(0)->contactno1; ?>" value="<?php echo $contacts->row(0)->contactno1; ?>">
                <br>

                CN2:
                <input name='cn2' type="text" placeholder="<?php echo $contacts->row(0)->contactno2; ?>" value="<?php echo $contacts->row(0)->contactno2; ?>">
                <br>

                EI1:
                <input name='email1' type="text" placeholder="<?php echo $contacts->row(0)->emailid1; ?>" value="<?php echo $contacts->row(0)->emailid1; ?>">
                <br>

                EI2:
                <input name='email2' type="text" placeholder="<?php echo $contacts->row(0)->emailid2; ?>" value="<?php echo $contacts->row(0)->emailid2; ?>">
                <br>

                Web:                
                <input name='web' type="text" placeholder="<?php echo $contacts->row(0)->website; ?>" value="<?php echo $contacts->row(0)->website; ?>">
                <br>

                fblink:
                <input name='fb' type="text" placeholder="<?php echo $contacts->row(0)->fblink; ?>" value="<?php echo $contacts->row(0)->fblink; ?>">
                <br>

                g+link:
                <input name='gplus' type="text" placeholder="<?php echo $contacts->row(0)->gpluslink; ?>" value="<?php echo $contacts->row(0)->gpluslink; ?>">
                <br>

                twittlink:
                <input name='twitr' type="text" placeholder="<?php echo $contacts->row(0)->twitterlink; ?>" value="<?php echo $contacts->row(0)->twitterlink; ?>">
                <br>

                linkdinlink:
                <input name='link' type="text" placeholder="<?php echo $contacts->row(0)->linkedinlink; ?>" value="<?php echo $contacts->row(0)->linkedinlink; ?>">
                <br>

                <input type="submit">
                <?php echo form_close(); ?>
            </div>
        </div>

        <div style="width: 48%; border: solid red 1px; display: inline-block">
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
        </div>
    </body>
</html>