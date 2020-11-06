<?php
/**
 * 
 */
require_once  APP_ROOT ."/database/"."database.php"; 
class logic{
	public $db;
	function __construct(){
		$this->db=new database();
	}
	public function get($property,$object=false){
		if(method_exists($this, 'get' . ucfirst($property))){
			$classname='get'.ucfirst($property);
			return $this->$classname();
		}
		if(property_exists($this, $property)){
			return $this->$property;
		}
		if($object){
			if(property_exists($object, $property)){
					return $object->$property;
		}
		if(property_exists($this, $object)){
			if(property_exists($this->$object,$property)){
				return $this->$object->$property;
			}
		}
	}
	return false;
}

}
  ?>