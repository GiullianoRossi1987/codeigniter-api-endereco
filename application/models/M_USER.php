<?php
defined('BASEPATH') or die("No Direct Scripts Allowed");

class M_User extends CI_MODEL{

    public function add(){
        $data = array(
            'nm_usuario' => $this->input->post("name"),
        );
    }
}
 ?>
