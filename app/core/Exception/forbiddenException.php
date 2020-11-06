<?php

/**
 * 
 */
namespace app\core\Exception;
class forbiddenException extends \Exception
{
	protected $message= "you don't have permission to access this page";
	protected $code="403";

}
/**
 * 
 */
?>