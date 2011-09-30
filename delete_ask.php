<?php
require_once('config.php');

$newArray = array();
required_vars( array('fid'), $newArray );

$uniqId = uniqid($newArray['fid']);
$filename = KEYSTORE_DIR.'/'.$newArray['fid'];

if ( !file_exists($filename) || !is_readable($filename) )
	die('NULL');

$identity = json_decode( file_get_contents($filename), true, 512, JSON_BIGINT_AS_STRING );

if ( file_put_contents(KEYSTORE_DIR.'/'.$uniqId, $filename, LOCK_EX) )
	die('NULL');

$confirm_link = 'http://'.$_SERVER['HTTP_HOST'].'/'._DIR_SELF.'/delete_confirm.php?fid='.$uniqId;

$email_to = $identity['nickname'].' <'.$identity['email'].'>';
$email_subject = '[TagPG] Can you confirm this ? ['.$identity['uuid'].']';
$email_text =
"Hey !\n\n
I'm TagPG, remember ?\n
This time I come to you because you (maybe not)\n
asked for an identity deletion. You must confirm it:\n\n
=== Begin TagPG Identity ===\n
UUID:\t ".$identity['uuid']."\n
Nickname:\t ".$identity['nickname']."\n
Email:\t ".$identity['email']."\n
pubKey:\t ".$identity['pubKey']."\n
Created on:\t ".$identity['created_on']."\n
Created with:\t ".$identity['created_with']."\n
=== End TagPG Identity ===\n\n
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