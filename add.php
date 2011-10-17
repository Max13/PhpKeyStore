<?php
require_once('config.php');

$newArray = array();
required_vars( array('uuid', 'nickname', 'email', 'pubKey'), $newArray );

$filename = tempnam(dirname(__FILE__).'/'.KEYSTORE_DIR, PREFIX_ID);
// ICI : problème de fichier qui se crée pas en ligne :/
/*
if ( preg_match('#^[a-zA-Z0-9\-\_\{\}]+$#', $GLOBALS['newArray']['uuid']) == 0 || preg_match('#^[a-zA-Z0-9]+$#', $GLOBALS['newArray']['nickname']) == 0 || preg_match('#^([a-zA-Z0-9]+[\-\_\.]?)+@([a-zA-Z0-9]+[\-\_\.]?)+\.[a-zA-Z]{2,5}$#', $GLOBALS['newArray']['email']) == 0 || preg_match('#^[a-zA-Z0-9\+\/=]+$#', $GLOBALS['newArray']['publicKey']) == 0 )
	die('NULL');
*/

$required_vars = array();
foreach ($newArray as $key => $var)
	$required_vars[$key] = htmlentities($var, ENT_QUOTES, 'UTF-8');
$required_vars['created_on'] = time();
$required_vars['created_with'] = $_SERVER['HTTP_USER_AGENT'];

$fileToWrite = json_encode($required_vars);

if ( !file_put_contents($filename, $fileToWrite, LOCK_EX) )
	die('false');

$email_to = $newArray['nickname'].' <'.$newArray['email'].'>';
$email_subject = "[TagPG] Welcome (again) in TagPG ! [".$newArray['uuid']."]";
$email_text = 
"Hey !\n\n
I'm TagPG. Just want to tell you that you can help\n
the developers, you just have to send some feedbacks.\n
You can say hi, ask for help, tell us what you want/think...\n
So, don't hesitate. You can simply answer to this email !\n\n
PS. Ah, last thing: this is the first and last email\n
you will ever receive from me\n
(except to answer you/confirm identify modification).\n
Don't forget to include the SAME subject (so click on \"answer\")\n
If you want to send us something ;)\n\n
Here is your public TagPG identity:\n
=== Begin TagPG Identity ===\n
UUID:\t ".$newArray['uuid']."\n
Nickname:\t ".$newArray['nickname']."\n
Email:\t ".$newArray['email']."\n
pubKey:\t ".$newArray['pubKey']."\n
Created on:\t ".$newArray['created_on']."\n
Created with:\t ".$newArray['created_with']."\n
=== End TagPG Identity ===\n\n
Good day !";

$email_headers =
"From: TagPG <NoReply@tag-team.fr>\r\n
Reply-To: TagPG <contact@tag-team.fr>\r\n
X-Mailer: PHP/".phpversion();

if ( mail($email_to, $email_subject, $email_text, $email_headers) )
	die(basename($filename));
else
	die('false');
?>