<?php
/**
 * 
 */
class database{
	private $database=null;
	private $server=null;
	private $username=null;
	private $password=null;

	//adpeter properties
	private $pdo=null;
	private $stmt=null;
	public $rows=null;
	public $data=null;
	function __construct(){
		$this->server=server;
		$this->username=username;
		$this->password=password;
		$this->database=db;
		if(!is_array($this->data)){
			$this->data=array();
		}
	}
	private function open(){
		$options=array(
			PDO::ATTR_PERSISTENT=>true,
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
		);
		try {
			$this->pdo=new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password,$options);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function execQuery($query,$arr){
		$this->open();
		if($this->pdo){
			$this->stmt=$this->pdo->prepare($query);
			if($this->stmt){
				if(is_string($arr)){
					 return $this->stmt->execute($arr);
				}
				if(is_array($arr)){
					foreach ($arr as $key => &$value) {
					$this->stmt->bindparam($key,$value);
				}
				$this->stmt->execute();
				}
			}
			
		}
		else{
			return false;
		}
		
	}
	
	private function num_rows(){
		if($this->stmt){
			return $this->stmt->rowCount();
		}
	}
	public function getData(){
	if($this->stmt){
		$this->rows=$this->num_rows();
		if($this->rows==1){
			$this->data=$this->stmt->fetch(PDO::FETCH_OBJ);
		}
		else if($this->rows > 0){
			$this->data=$this->stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else{
			return "data_missing";
		}
	}	
	}
}
?>