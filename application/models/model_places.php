<?php
class Model_places extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function existe_usuario($usuario){
        $tabla= $usuario."_places";
        if ($this->db->table_exists($tabla)){
            return true;
        }else{
            return false;
        }
    }

    function listado($tabla){
        $query = $this->db->get($tabla);
        return $query->result_array();
    }

    function consulta($tabla,$id){
        $query = $this->db->where('id',$id)->get($tabla);
        if($query->num_rows()>0){
            return $query->row_array();
        }
        else{
            return false;
        }

    }

    function elimina($tabla,$id){
        $query = $this->db->delete($tabla, array('id' => $id));
        return $query;
    }

    function inserta($tabla,$datos){

        $query = $this->db->insert($tabla, $datos);
        return $query;
    }


}