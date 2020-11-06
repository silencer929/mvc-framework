<?php
/**
 * 
 */
namespace app\core;
use app\core\Exception\error;
class Router
{
	public array $routes=[];
	public Request $request;
	public Response $response;
	public string $layout="main";
	public $currController="site";
	public $currMethod="home";
	public $params=[];
			
			
	function __construct(Request $request){
		$this->request= $request;
		$this->response= new Response();
	}
	private function getUrl(){

	}
	public function get($path,$callback){
		$this->routes['get'][$path]=$callback;
	}
	public function post($path,$callback){
		$this->routes['post'][$path]=$callback;
	}

	public function resolve(){
		$path=$this->request->getPath();
		$method=$this->request->getMethod();
		$callback=$this->routes[$method][$path] ?? false;
		if($callback===false){
			$this->response->setStatusCode(404);
			$error= new error();
			return $this->renderView("error",["error"=>$error]);
			exit();
		}
		$type= strpos($callback,"/") ? "array" : "string";
			if($type=="string"){
			return $this->renderView($callback);
			exit();
			}
		if($type=="array"){
			$url=explode("/", $callback);
			if(file_exists(CTRL. $url[0] . ".php")){
				require_once CTRL .$url[0] .".php";
				$this->currController=$url[0];
				unset($url[0]);
			}
			$this->currController=new $this->currController();
			//print_r(get_class_methods($this->currController));

			if(method_exists($this->currController, $url[1])){
				$this->currMethod=$url[1];
				unset($url[1]);
				foreach ($this->currController->getMiddlewares() as $middleware) {
					if($middleware->actions[0]===$this->currMethod){
						$middleware->execute();
					}
				}
			}
			$this->currMethod;
			call_user_func([$this->currController,$this->currMethod]);
			
		}
	}
	public function renderView($view,$params=[]){
		$layout=$this->renderLayout();
		$content=$this->renderContent($view,$params);
		return str_replace("{{content}}", $content, $layout);
	}
	protected function renderLayout(){
		ob_start();
		include_once LAYOUT . $this->layout . ".php";
		return ob_get_clean();
	}
	protected function renderContent($view,$params){
		foreach ($params as $key => $value) {
			$$key=$value;
		}
		ob_start();
		include_once VIEWS .$view .".php";
		return ob_get_clean();
	}
}
?>