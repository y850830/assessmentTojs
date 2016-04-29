<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
        
        parent::__construct();
        $this->load->helper('url');
        @session_start();
    }
	public function index()
	{
		//$this->load->view('welcome_message');
	
		if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"] != null){ //已經登入的話直接回首頁
            @session_destroy();
            redirect(base_url());
        }else {
            $this->load->view('login');
        }
	}
	public function check() {
	
        $account = trim($this->input->post("account"));  
        $password = trim($this->input->post("password"));  
        $selectUser = $this->input->post("selectUser");

        $this->load->model("LoginModel");
        if ($selectUser == 0)  
            $user = $this->LoginModel->getUserAdmin($account,$password); 
        else if ($selectUser == 1)
            $user = $this->LoginModel->getUserDrillmaster($account,$password); 
        
        $_SESSION["LoginStatus"] = $user;
        
       
        redirect(base_url());
        //echo $_SESSION['name'];
        //$_SESSION["user"] = $user;  

    }
}
