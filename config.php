<?php
// Debug
if ( isset($_GET['debug']) )
{
	ini_set('display_errors', 1);
	ini_set('error_reporting', 2147483647);
}
// /Debug

// Includes
require_once('includes/constants.php');
require_once('includes/functions.php');
//require_once('includes/crypt.class.php'); // Will be used later. Maybe.
// /Includes

// Classes
//$Crypt = new Crypt('TO_REPLACE_16_CHARACTERS', 128);
// /Classes
?>