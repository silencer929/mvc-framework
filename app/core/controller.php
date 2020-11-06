<?php
use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\core\middleware\baseMiddleware;
use app\core\middleware\authMiddleware;
class controller {
	protected Router $router;
	protected Request $request;
	protected Response $response;
	public array $middlewares=[];
	public    string $action='';
	protected function __construct()
	{
		$request=new Request();
		$this->router=new Router($request);
		$this->response=new Response();
		$this->request= new Request();
	}


	public function getModel($model){
		if(file_exists(MODEL_ROOT .$model .'.php')){
			require_once MODEL_ROOT .$model .'.php';
			return new $model;
		}
	}
	public function getView($view,$data=[]){
		if(file_exists(VIEWS .$view . ".php")){
			echo $this->router->renderView($view,$data);
		}
		else{
			die("view does not exist");
		}
	}
public function registerMiddlewares($middleware)
	{
		$this->middlewares=[$middleware];

	}
public function getMiddlewares() : array
	{
		return $this->middlewares;
	}	
}
?>