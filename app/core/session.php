<?php
namespace app\core;
 /**
  * 
  */
 class session
 {
 	protected const FLASH_KEY="flash_messages";
 	protected bool $sesion_started=false;
 	function __construct()
 	{
 		session_start();
 		$flashMessages=$_SESSION[self::FLASH_KEY] ?? [];
 		foreach ($flashMessages as $key => &$value) {
 			$flashMessages[$key]["remove"]=true;
 		}
 		$_SESSION[self::FLASH_KEY]=$flashMessages;
 	}
 	public function set($key,$value)
 	{
 		$_SESSION[$key]=$value;
 	}
 	public function get($key)
 	{
 		return $_SESSION[$key] ?? false;
 	}
 	public function remove($key)
 	{
 		unset($_SESSION[$key]);
 	}
 	public function setFlash($key,$message)
 	{
 		$_SESSION[self::FLASH_KEY][$key]=[
 			"message"=>$message,
 			"remove"=>false
 		];
 	}
 	
 	public function getFlash($key)
 	{
 		return $_SESSION[self::FLASH_KEY][$key]["message"] ?? false;
 	}

 	// function to end certain sessions
 	public function removeFlash()
 	{
 		$flashMessages=$_SESSION[self::FLASH_KEY];
 		foreach ($flashMessages as $key => $value) {
 			if($value["remove"]){
 				unset($flashMessages);
 			}
 		}
 		$_SESSION[self::FLASH_KEY]=$flashMessages;
 	}
 	public function __destruct()
 	{
 		$this->removeFlash();
 	}	
 }
?>