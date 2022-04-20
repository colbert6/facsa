<?php 
class Log_enlace_repositorio extends CI_Model {

    public $id_log_enlace_repositorio;    
    public $fecha_creacion_datetime;
    public $fecha_creacion_date;
    
    public $id_repositorio;

    public $id_usuario;
    public $codigo_unsm_usuario;
    public $nombres_usuario;
    public $apellidos_usuario;
    public $categoria_usuario;
    public $categoria_docente;
    public $estado_usuario;

    public $id_escuela_profesional;
    public $nombre_escuela;


    public function insert_log_enlace_repositorio()
    {   
        $this->fecha_creacion_datetime = date('Y-m-d H:i:s');
        $this->fecha_creacion_date = date('Y-m-d');
        return  $this->db->insert('log_enlace_repositorio', $this);
    }

}


