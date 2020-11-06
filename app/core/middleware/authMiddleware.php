<?php
/**
 * 
 */
namespace app\core\middleware;
use app\core\Application;
use app\core\Exception\forbiddenException;
class authMiddleware extends mainMiddleware
{
	public array $actions;
	function __construct(array $actions=[])
	{
		$this->actions=$actions;
	}
	public function execute()
	{
		if(Application::isGuest()){
			if(!empty($this->actions)){
				throw new forbiddenException();
				
			}

		}
	}
}
?>