<?php
defined('BASEPATH') or die("No Direct Scripts Allowed");

class M_User extends CI_Model{

    public function add(){
        $data = array(
            'nm_usuario' => $this->input->post("name"),
            'vl_email' => $this->input->post("email"),
            "vl_password" => md5($this->input->post("passwd"))
        );
        return $this->db->insert("tb_usuario", $data);
    }

    public function exists_email(){
        $email = $this->input->post("email");
        $this->db->where("vl_email", $email);
        $ar = array("valid" => count($this->db->get("tb_usuario")->row_array()) >= 1);
        return $ar;
    }

    public function exists_name(){
        $name = $this->input->post("name");
        $this->db->where("nm_usuario", $name);
        $ar = array("valid" => count($this->db->get("tb_usuario")->row_array()) >= 1);
        return $ar;
    }

    public function login(){
        $email = $this->input->post("email");
        $passwd = md5($this->input->post("passwd"));

        $this->db->where("vl_email", $email);
        $this->db->where("vl_password", $passwd);

        $usr = $this->db->get("tb_usuario")->row_array();

        if($usr){
            // set up the session
            $this->load->library("session");
            $this->session->logged_usr = true;
            $this->session->usr_data = $usr;
            redirect("http://exercicio-endereco.sol/endereco", "refresh");
        }
        else{
            redirect()->route("login");
        }
    }

    public function logoff(){
        $this->load->library("session");
        $this->session->logged_usr = false;
        $this->session->usr_data = null;
    }
}
 ?>
