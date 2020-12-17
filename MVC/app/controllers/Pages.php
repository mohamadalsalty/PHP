<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
    	$user = $this->userModel->getUsers();

        $this->view('pages/index', $user);
    }

    public function about() {
        $this->view('pages/about');

    }

}
