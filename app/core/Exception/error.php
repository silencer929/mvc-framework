<?php
namespace app\core\Exception;
class error extends \ErrorException
{
	protected $code="404";
	protected $message="page not found";
	public function __construct()
	{

	}
}
?>