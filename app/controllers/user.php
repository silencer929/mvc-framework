<?php
/**
 * 
 */
use app\core\Application;
use app\core\middleware\authMiddleware;
class user extends controller{
	private $userModel;
	private array $errors=[];
public function __construct(){
		parent:: __construct();
		$this->userModel=$this->getModel("userModel");
		$this->registerMiddlewares(new authMiddleware(["profile"]));

	}
public function ajax()
	{
		if($this->request->is_ajax()){
			echo "peter";
		}
	}	
public function login(){
	if($this->request->is_post()){
		$arr=$this->request->get_data();
		if($this->validate() AND $this->userModel->login($arr)){
			Application::$app->login( $this->userModel->login($arr));
			Application::$app->user=$this->userModel->login($arr);
			Application::$app->session->setFlash("success","login successful");
			if($this->request->is_ajax()){
				echo "string";
				return;
			}
			$this->response->redirect("home");
		}
		else{
			if($this->request->is_ajax()){
				$this->errors["invalid"]="invalid user";
				echo json_encode($this->errors);
				exit();
			}
		$this->errors["invalid"]="invalid user";
		$this->router->layout="auth";
		$this->getView("login",$this->errors);
		}
			
	}
	else{
		$this->router->layout="auth";
		$this->getView("login");
	}
}
public function logout()
{
	Application::$app->logout();
	$this->response->redirect("home");
}
public function register(){
	$arr=[];
	if($this->request->is_post()){
		$arr=$this->request->get_data();
		$this->userModel->register($arr);
		$this->router->layout="auth";
		$this->getView("login");
	}else{
		$this->router->layout="auth";
	$this->getView("register");
	}
	
}
public function validate()
	{
		$arr=$this->request->get_data();
	if(empty($arr["email"])){
			$this->errors["email"]="email is required";
		}
	if(empty($arr["password"])){
			$this->errors["password"]="password is required";
		}
	if(!empty($arr["email"]) && !empty($arr["password"])){
		return true;
	}	
	}
public function profile()
	{
		$this->getView("profile");
	}
	
}
  ?>