<?php
class Controller{
	public function model($model){
		require_once('../app/models/'.$model.'.php');//require the model file
		return new $model();//return the model func
	}

	public function view($view,$data = []){
		if(file_exists('../app/views/'.$view.'.php')){//looking for the file if it exists
			require_once '../app/views/'.$view.'.php';//if so, it will require it
		}else{//else
			die('view does not exists');//we will die the page
		}
	}
}