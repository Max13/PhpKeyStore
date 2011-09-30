<?php
require_once('config.php');

$newArray = array();
required_vars( array('fid', 'print'), $newArray );

if ( empty($newArray['fid']) )
	die('NULL');

$filename = KEYSTORE_DIR.'/'.$newArray['fid'];

if ( file_exists($filename) && is_readable($filename) )
{
	$file = file_get_contents($filename);
	if ( empty($newArray['print']) )
		die('true');
	else
		die($file);
}
else
	die('false');
?>