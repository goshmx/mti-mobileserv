<?php
class Model_table extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function listado(){
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    function consulta($id){
        $query = $this->db->where('id',$id)->get('usuarios');
        return $query->row_array();
    }

    function elimina($id, $nombre){
        $this->db->delete('usuarios', array('id' => $id));
        $delete = $this->db->query("DROP TABLE ".$nombre."_places");
        return $delete;
    }

    function inserta($nombre){
        $data = array(
            'usuario' => $nombre
        );
        $this->db->insert('usuarios', $data);
        $insert = $this->db->query("CREATE TABLE `".$nombre."_places` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `name` text COLLATE utf8_spanish_ci NOT NULL, `descripcion` text COLLATE utf8_spanish_ci NOT NULL,  `lat` text COLLATE utf8_spanish_ci NOT NULL,  `lng` text COLLATE utf8_spanish_ci NOT NULL,  `url` text COLLATE utf8_spanish_ci NOT NULL,  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;");
        return $insert;
    }


}