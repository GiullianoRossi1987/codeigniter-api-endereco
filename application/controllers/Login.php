<?php
defined("BASEPATH") or die("No Direct Scripts Allowed");

class Login extends CI_Controller{

    public function index(){
        $this->load->view("login");
    }
}
