<?php
require_once('config.php');

$newArray = array();
required_vars( array('fid'), $newArray );

if ( empty($newArray['fid']) )
	die('NULL');

$filename = KEYSTORE_DIR.'/'.$newArray['fid'];

if ( file_exists($filename) && is_readable($filename) )
{
	$file = file_get_contents($filename);
	die($file);
}
else
	die('false: '.KEYSTORE_DIR.'/'.$newArray['fid'].' / '.file_exists($filename).' / '.is_readable($filename));
?>