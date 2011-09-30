<?php
require_once('config.php');

$newArray = array();
required_vars( array('fid'), $newArray );

$uniqId = $newArray['fid'];
$filename_old = KEYSTORE_DIR.'/'.$newArray['fid'];
$filename_new = KEYSTORE_DIR.'/'.$uniqId;

if ( !file_exists($filename_old) || !file_exists($filename_new) )
	die('NULL: Files');

if ( !rename($filename_old, $filename_old.SUFFIX_WAIT) )
	die('false: REN 1');

if ( !rename($filename_new, $filename_old) )
	die('false: REN 2');

if ( !unlink($filename_old.SUFFIX_WAIT) )
	die('false: DEL 0');

if ( !file_put_contents($filename_new, $fileToWrite, LOCK_EX) )
	die('false');

die('true');
?>