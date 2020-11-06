<?php  
/**
 * 
 */
class userModel extends logic
{
	public function __construct(){
		parent::__construct();
	}
	public function getUser(){
		$sql="SELECT * FROM users";
		$arr=[];
		$this->db->execQuery($sql,$arr);
		$this->db->getData();
		return $this->db->data;
	}

	public function login($arr){
		$email["email"]=$arr["email"];
		$sql="SELECT * FROM users where email= :email";
		$this->db->execQuery($sql,$email);
		$this->db->getData();
		$user=$this->db->data;
		if(($user->password==$arr["password"])){
			return $user;
		}
		else{
			return false;
		}

	}
	public function register($arr=false){
		if($arr){
			$email=["email"=>$arr['email']];
			if($this->Email($email)){
				return "email is used";
			}
			else{
				$sql="INSERT INTO users(userName,email,password) VALUES(:userName,:email,:password)";
		$this->db->execQuery($sql,$arr);
			}
		}
	}
	private function Email($email){
		$sql="SELECT * FROM users where email= :email";
		$this->db->execQuery($sql,$email);
		$this->db->getData();
		if($this->db->rows > 0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
}
?>