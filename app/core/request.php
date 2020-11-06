<?php
/**
 * 
 */
namespace app\core;
class Request
{
	
	function __construct(){

	}

public function getPath(){
		$url=$_GET['url'] ?? "home";
		$url=filter_var($url,FILTER_SANITIZE_URL);
		return $url;
	}
public function getMethod(){
	return strtolower($_SERVER['REQUEST_METHOD']);
}
public function is_get(){
	return $this->getMethod()==="get";
}
public function is_post(){
	return $this->getMethod()=="post";
}
public function get_data(){
	$data=[];
	if($this->getMethod()==="get"){
		foreach ($_GET as $key => $value){
			$data[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}
	if($this->getMethod()==="post"){
		foreach ($_POST as $key => $value){
			$data[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
			}

		}
		return $data;
	}
public function is_ajax()
	{
		if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest"){
			return true;
		}
		return false;
	}
}
?>