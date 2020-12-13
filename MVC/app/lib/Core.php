<?php

class Core{
	protected $currentController = 'Pages';
	protected $currentMethod = 'index';
	protected $params = [];



	public function __construct(){
		$url = $this->getUrl();//to get the URL

		//Look in controllers for URL
		if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
			$this->currentController = ucwords($url[0]);
			unset($url[0]);
		}

		//require the controller
		require_once '../app/controllers/'.$this->currentController . '.php';//to require the file with .php
		$this->currentController = new $this->currentController;//to return it

		//check if the url has index 1
		if(isset($url[1])){
			if(method_exists($this->currentController, $url[1])){
				$this->currentMethod = $url[1];
				unset($url[1]);

			}

		}


		//to get params
		$this->params = $url ? array_values($url) : [];
		//callback
		call_user_func_array([$this->currentController, $this->currentMethod],$this->params);



	}


	//this function is to get the url
	public function getUrl(){
		if(isset($_GET['url'])){//to check the url
			$url = rtrim($_GET['url'], '/');//to delete spaces
			$url = filter_var($url,FILTER_SANITIZE_URL);//to filter vars
			$url = explode('/',$url);//put it in an array
			return $url;//to return the url
		}

	}


}