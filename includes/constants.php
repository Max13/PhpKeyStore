<?php
// System
define('_APPNAME', 'PhpKeyStore');
define('KEYSTORE_DIR', 'keystore');
define('PREFIX_ID', 'ID_');
define('SUFFIX_WAIT', '_upd');
// /System

// Other
$php_self = explode('/', $_SERVER['PHP_SELF']);
define('_PHP_SELF', $php_self[count($php_self)-1]);
define('_DIR_SELF', $php_self[count($php_self)-2]);
// ---
?>