<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Mti extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_places');
    }

    function lista_get()
    {
        $tabla = $this->get('user');
        if(!$tabla){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        if($this->model_places->existe_usuario($tabla)){
            $tabla = $tabla."_places";
            $tablas = $this->model_places->listado($tabla);
            $this->response($tablas, 200);
        }else{
            $this->response(array('mensaje' => "El usuario no corresponde"), 200);
        }

    }

    function consulta_get()
    {
        $id = $this->get('id');
        $tabla = $this->get('user');
        if((!$id)||(!$tabla)){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        if($this->model_places->existe_usuario($tabla)){
            $tabla = $tabla."_places";
            $tablas = $this->model_places->consulta($tabla,$id);
            if($tablas){
                $this->response($tablas, 200);
            }
            else{
                $this->response(array('mensaje' => "No existe el registro"), 200);
            }
        }else{
            $this->response(array('mensaje' => "El usuario no corresponde"), 200);
        }
    }

    function elimina_delete()
    {
        $id = $this->delete('id');
        $tabla = $this->get('user');
        if((!$id)||(!$tabla)){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        if($this->model_places->existe_usuario($tabla)){
            $tabla = $tabla."_places";
            $exec = $this->model_places->elimina($tabla, $id);
            if($exec){
                $this->response(array('mensaje' => "Registro eliminado"), 200);
            }
            else{
                $this->response(array('mensaje' => "No se pudo eliminar"), 200);
            }

        }else{
            $this->response(array('mensaje' => "El usuario no corresponde"), 200);
        }
    }

    function inserta_put(){
        $tabla = $this->get('user');
        $name = $this->put('name');
        $lat = $this->put('lat');
        $lng = $this->put('lng');
        $url = $this->put('url');
        if((!$name)||(!$lat)||(!$lng)||(!$url)){
            $this->response(array('mensaje' => "Uno o mas datos son necesarios"), 200);
        }
        if($this->model_places->existe_usuario($tabla)){
            $tabla = $tabla."_places";
            $insert_places = array(
                'name' => $name,
                'lat' => $lat,
                'lng' => $lng,
                'url' => $url
            );
            $insert = $this->model_places->inserta($tabla,$insert_places);
            if($insert){
                $this->response(array('mensaje' => "Registro insertado"), 200);
            }
            else{
                $this->response(array('mensaje' => "No se pudo insertar"), 200);
            }
        }else{
            $this->response(array('mensaje' => "El usuario no corresponde"), 200);
        }
    }
}