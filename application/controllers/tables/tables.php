<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tables extends REST_Controller
{

    function lista_get()
    {
        $this->load->model('model_table');
        $tablas = $this->model_table->listado();
        $this->response($tablas, 200);
    }

    function consulta_get()
    {
        $id = $this->get('id');
        if(!$id){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        $this->load->model('model_table');
        $tablas = $this->model_table->consulta($id);
        $this->response($tablas, 200);
    }

    function elimina_delete()
    {
        $id = $this->delete('id');
        if(!$id){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        $this->load->model('model_table');
        $tabla = $this->model_table->consulta($id);
        $this->model_table->elimina($id,$tabla['usuario']);
        $this->response(array('mensaje' => "Usuario eliminado"), 200);
    }

    function inserta_put(){
        $nombre = $this->put('usuario');
        if(!$nombre){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        $this->load->model('model_table');
        $this->model_table->inserta($nombre);
    }
}