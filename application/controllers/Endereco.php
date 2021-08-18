<?php
defined("BASEPATH") or die("No Direct Scripts Allowed");

class Endereco extends CI_Controller{

    public function index(){
        $this->load->view("enderecos");
    }

    public function add(){
        $this->load->model("M_Endereco");
        $end = new M_Endereco;
        $end->add();
        header("Content-Type: application/json");
        echo json_encode(array("success" => true));
    }

    public function get(){
        $this->load->model("M_Endereco");
        $end = new M_Endereco;
        $cont = $end->get();
        // header("Content-Type: application/json");
        // echo json_encode(array("ends" => $cont));
        echo json_encode($cont);
    }
}
 ?>
