<?php
function required_vars($arrayFrom, &$arrayTo, $mandatory = true)
{
	if ( empty($arrayFrom) && $mandatory )
		die('NULL');
	
	foreach ($arrayFrom as $varName)
	{
		if ( empty($_GET[$varName]) )
			if ( empty($_POST[$varName]) )
				if ($mandatory)
					die('NULL: '.$varName);
				else
					$arrayTo[$varName] = NULL;
			else
				$arrayTo[$varName] = $_POST[$varName];
		else
			$arrayTo[$varName] = $_GET[$varName];
	}
}
?>