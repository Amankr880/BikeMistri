<?php
	$config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this  'mail.websitedomain.com'
    $config['smtp_port'] = '465';  //587
    $config['smtp_user'] = EMAILID; //change this
    $config['smtp_pass'] = EMAILPASSWORD; //change this
    $config['mailtype'] = 'html';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
?>