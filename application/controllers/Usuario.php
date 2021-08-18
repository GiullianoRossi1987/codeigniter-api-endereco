<?php
defined("BASEPATH") or die("No Direct Scripts Allowed");

class Usuario extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("M_USER");
    }

    public function cadastro(){
        $usr = new M_User;
        // $usr->add();
        $this->load->helper("url");
        redirect("http://exercicio-endereco.sol/", "refresh");
    }

    public function email_exists(){
        $usr = new M_User;
        header("Content-Type: application/json");
        $em = $usr->exists_email();
        echo json_encode($em);
    }

    public function name_exists(){
        $usr = new M_User;
        header("Content-Type: application/json");
        $em = $usr->exists_name();
        echo json_encode($em);
    }

    public function login(){
        $usr = new M_User;
        $usr->login();
    }

    public function cad(){
        $this->load->view("cadastro");
    }

    public function logoff(){
        $usr = new M_User;
        $usr->logoff();
        $this->load->helper("url");
        redirect("http://exercicio-endereco.sol/", "refresh");
    }
}
 ?>
