<?php

/** 
 * Class de cryptage de chaine, AES ECB.
 *
 * <p>Utilise les méthodes mcrypt() combinées à l'algoritme de RIJNDAEL</p>
 *  
 * @name Crypt
 * @author Adnan RIHAN (Max13) <adnan@rihan.fr>  
 * @link http://www.virtual-info.info/
 * @copyright Adnan RIHAN 2011
 * @version 1.0.0
 * @package Crypt 
 */ 
  
class Crypt { 
	/*~*~*~*~*~*~*~*~*~*~*/ 
	/*  1. propriétés    */ 
	/*~*~*~*~*~*~*~*~*~*~*/ 

	/**
	* @var string 
	* @desc Clé de cryptage. 16 caractères pour 128 bits, 32 pour 256. 
	*/ 
	private $key;

	/**
	* @var string 
	* @desc Mode de chiffrement. 
	*/ 
	private $mode;
	 

	/*~*~*~*~*~*~*~*~*~*~*/ 
	/*    2. méthodes    */ 
	/*~*~*~*~*~*~*~*~*~*~*/ 
	 
	/** 
	* Constructeur 
	*  
	* <p>création de l'instance de cryptage</p> 
	*  
	* @name Crypt::__construct() 
	* @param mode (128 ou 256) (défaut: 128)
	* @param clé (1<>16 caractères pour 128 bits, 16<>32 pour 256 bits) (défaut: 0)
	* @return void
	*/
	public function __construct($crypt_key = 0, $crypt_mode = 128) {
		if ($crypt_mode == 256)
		{
			$key = substr($crypt_key, 0, 32);
			$mode = MCRYPT_RIJNDAEL_256;
		}
		else
		{
			$key = substr($crypt_key, 0, 16);
			$mode = MCRYPT_RIJNDAEL_128;
		}
	}

	/** 
	* Crypt 
	*  
	* <p>Encrypte et retourne la chaine en paramètre</p> 
	*  
	* @name Encrypt
	* @param Chaine à encrypter
	* @return string
	*/
	public function encrypt($plain_text)
	{
		$crypted_text = mcrypt_encrypt($mode, $key, $plain_text, MCRYPT_MODE_ECB);
		return $crypted_text;
	}

	/** 
	* Crypt 
	*  
	* <p>Décrypte et retourne la chaine en paramètre</p> 
	*  
	* @name Décrypt
	* @param Chaine à décrypter
	* @return string
	*/
	public function decrypt($crypted_text)
	{
		$plain_text = mcrypt_decrypt($mode, $key, $crypted_text, MCRYPT_MODE_ECB);
		$plain_text = rtrim($plain_text, "\0\4");
		return $plain_text;
	}
} 
?>