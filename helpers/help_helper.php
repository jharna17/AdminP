<?php

function cml($toPage="welcome/index")
{
	$CI = & get_instance();
	if($CI->session->userdata("username")==""){
		$CI->session->set_userdata('error',"Wrong approach , plase login first !");
		redirect_location($toPage);
	}

}

function redirect_location($Location)
{
	$CI = & get_instance();
	header("Location: " . $CI->config->base_url() . "index.php?//" . $Location);
}


?>