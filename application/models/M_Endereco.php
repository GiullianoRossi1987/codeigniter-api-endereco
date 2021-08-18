<?php
defined("BASEPATH") or die("No direct Scripts allowed");

class M_Endereco extends CI_Model{

    public function add(){
        $data = array(
            "vl_estado" => $this->input->post("estado"),
            "vl_cidade" => $this->input->post("cidade"),
            "vl_num" => (int)$this->input->post("numero"),
            "vl_rua" => $this->input->post("rua"),
            "vl_bairro" => $this->input->post("bairro"),
            "vl_cep" => $this->input->post("cep")
        );
        return $this->db->insert("tb_endereco", $data);
    }

    public function get(){
        // checks for query params
        $data = array(
            "vl_estado" => $this->input->post("estado"),
            "vl_cidade" => $this->input->post("cidade"),
            "vl_num" => (int)$this->input->post("numero"),
            "vl_rua" => $this->input->post("rua"),
            "vl_bairro" => $this->input->post("bairro"),
            "vl_cep" => $this->input->post("cep")
        );
        $names = array(
            "estado" => "vl_estado",
            "cidade" => "vl_cidade",
            "numero" => "vl_num",
            "rua"    => "vl_rua",
            "bairro" => "vl_bairro",
            "cep"    => "vl_cep"
        );
        foreach ($data as $p => $value) {
            if(isset($names[$p]) && (count($value) > 0 && $value != null))
                $this->db->where($names[$p], $value);
        }

        // returning themselfs
        return $this->db->get("tb_endereco")->result_array();
    }


}
 ?>
