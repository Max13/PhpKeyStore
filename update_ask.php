<?php
require_once('config.php');

$newArray = array();
required_vars( array('fid', 'uuid', 'nickname', 'email', 'pubKey'), $newArray );

$uniqId = uniqid($newArray['fid']);
$filename_old = KEYSTORE_DIR.'/'.$newArray['fid'];
$filename_new = KEYSTORE_DIR.'/'.$uniqId;

if ( !file_exists($filename_old) || !is_readable($filename_old) )
	die('NULL');

$required_vars = array();
foreach ($newArray as $key => $var)
	$required_vars[$key] = htmlentities($var, ENT_QUOTES, 'UTF-8');
$required_vars['created_on'] = time();
$required_vars['created_with'] = $_SERVER['HTTP_USER_AGENT'];

$oldIdentity = json_decode( file_get_contents($filename_old), true, 512, JSON_BIGINT_AS_STRING );
$fileToWrite = json_encode($required_vars);

if ( !file_put_contents($filename_new, $fileToWrite, LOCK_EX) )
	die('false');

$confirm_link = 'http://'.$_SERVER['HTTP_HOST'].'/'._DIR_SELF.'/update_confirm.php?fid='.$uniqId;

$email_to = $newArray['nickname'].' <'.$newArray['email'].'>';
$email_subject = '[TagPG] Can you confirm this ? ['.$newArray['uuid'].']';
$email_text =
"Hey !\n\n
I'm TagPG, remember ?\n
This time I come to you because you (maybe not)\n
asked for an identity update. You must confirm it:\n\n
=== Begin old TagPG Identity ===\n
UUID:\t ".$oldIdentity['uuid']."\n
Nickname:\t ".$oldIdentity['nickname']."\n
Email:\t ".$oldIdentity['email']."\n
pubKey:\t ".$oldIdentity['pubKey']."\n
Created on:\t ".$oldIdentity['created_on']."\n
Created with:\t ".$oldIdentity['created_with']."\n
=== End old TagPG Identity ===\n\n
=== Begin new TagPG Identity ===\n
UUID:\t ".$newArray['uuid']."\n
Nickname:\t ".$newArray['nickname']."\n
Email:\t ".$newArray['email']."\n
pubKey:\t ".$newArray['pubKey']."\n
Created on:\t ".$newArray['created_on']."\n
Created with:\t ".$newArray['created_with']."\n
=== End new TagPG Identity ===\n\n
Please click <a href='$confirm_link'>here</a> to confirm.\n\n
Good day !";

$email_headers =
"From: TagPG <NoReply@tag-team.fr>\r\n
Reply-To: TagPG <contact@tag-team.fr>\r\n
X-Mailer: PHP/".phpversion();

if ( mail($email_to, $email_subject, $email_text, $email_headers) )
	die('true');
else
	die('false');
?>