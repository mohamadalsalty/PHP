<?php
class Pages extends Controller{

	public function __construct(){
		$userModel = $this->model('User');
	}


	public function index(){//to get the index page 
		$data = [
			'name'=>'Mohamad',
			'email'=>'mohamadhazems@gmail.com'
		];
		$this->view('pages/index',$data);
	}

	public function about(){//to get the about page
		$this->view('pages/about');
	}



}