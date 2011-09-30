<?php
require_once('config.php');

$newArray = array();
required_vars( array('fid'), $newArray );

$uniqId = $newArray['fid'];
$filename_tmp = KEYSTORE_DIR.'/'.$newArray['fid'];

if ( !file_exists($filename_tmp) )
	die('NULL: Files');

$filename_toDel = KEYSTORE_DIR.'/'.file_get_contents($filename_tmp);

if ( !unlink($filename_tmp) )
	die('false: DEL 0');

if ( !unlink($filename_toDel) )
	die('false: DEL 1');

die('true');
?>