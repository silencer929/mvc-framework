<?php
 /**
    * 
    */
   class site extends controller
   {

   	function __construct()
   	{
      parent:: __construct();
   	}
   	public function home(){
      $params=["name"=>"code-holic"];
      $this->getView("home",$params);
   	}
    public function login()
    {
      $this->getView("login");
    }
   }  ?>