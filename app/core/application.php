<?php 
namespace app\core;
/**
*@peter
** @package ${NAMESPACE}
 */
class Application{
	public Router $router;
	public Request $request;
	public session $session;
	public $user;
	public static Application $app;
	function __construct(){
		$this->request= new Request();
		$this->response=new Response();
		$this->session = new session();
		$this->router= new Router($this->request);
		self::$app=$this;
		//session geti
		if(!self::$app->user){
			$this->user=$this->session->get("user");
		}
		else{
			$this->user=null;
		}
	}
	public static function isGuest()
	{
		return !self::$app->user;
	}
	public function login($user)
	{
		
		$this->session->set("user", $user);
	}
	public function logout()
	{
		$this->user=null;
		$this->session->remove("user");
	}
	public function run(){
		try {
			 echo $this->router->resolve();
		} catch (\Exception $e) {
			echo $this->router->renderView("exception" ,["exception"=>$e]);
		}
	}
}
 ?>