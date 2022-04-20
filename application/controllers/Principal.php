<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->controller = 'Principal';//Siempre define las migagas de pan
    }


    public function index()
    {

        $this->metodo = '';//Siempre define las migagas de pan

        $this->_init(true,true,true);//Carga el tema ( $cargar_menu, $cargar_url, $cargar_template )
        $output = array('title' => 'Principal' ); 
        $output['texto'] =  "";

        $this->load->js('assets/js/bootbox.min.js');

        $this->load->model('menu_repositorio');
        $output['menu_usuario'] = $this->menu_repositorio->get_menu_repositorio($this->session->userdata('id_perfil'));

        //print_r($menu_usuario);
        //exit();

        $this->load->view('principal/index', $output ) ;
    }

    public function save_log_enlace_repositorio(){
        
        $validar_envio_cpe = 1;
        $return = array( 'estado_validacion' => true , 'estado' => false, 'msj' => '' , 'error'=> '' , 'idsave' => '' , 'enlace' => '');

        $id_usuario = $this->session->userdata('id_user');
        $id_repositorio = $this->input->post('id_repositorio');

        $this->db->trans_start();//Inicio de transaccion

        try{               

            $this->load->model('usuario');
            $this->load->model('repositorio');
            $this->load->model('log_enlace_repositorio');

            $data_usuario_log = $this->usuario->get_info_usuario_log($id_usuario);            
            $data_repositorio_log = $this->repositorio->get_info_repositorio_log($id_repositorio);

            //print_r($data_usuario_log);print_r($data_repositorio_log);exit();

            $this->log_enlace_repositorio->id_repositorio = $data_repositorio_log['id_repositorio'];
            $this->log_enlace_repositorio->id_usuario = $data_usuario_log['id_usuario'];
            $this->log_enlace_repositorio->codigo_unsm_usuario = $data_usuario_log['codigo_unsm'];

            $this->log_enlace_repositorio->nombres_usuario = $data_usuario_log['nombres_usuario'];
            $this->log_enlace_repositorio->apellidos_usuario = $data_usuario_log['apellidos_usuario'];
            $this->log_enlace_repositorio->categoria_usuario = $data_usuario_log['categoria_usuario'];
            $this->log_enlace_repositorio->categoria_docente = $data_usuario_log['categoria_docente'];
            $this->log_enlace_repositorio->estado_usuario = $data_usuario_log['estado_usuario'];

            $this->log_enlace_repositorio->id_escuela_profesional = $data_usuario_log['id_escuela_profesional'];
            $this->log_enlace_repositorio->nombre_escuela = $data_usuario_log['nombre_escuela'];

            
            $this->log_enlace_repositorio->insert_log_enlace_repositorio();

            if ($this->db->trans_status() === FALSE) { 
                //$error = $this->db->error();
                //$return['msj'] = $return['error']= 'ERROR: Operaciones de Base de Datos. <br>'.$error['message'];           
                $this->db->trans_rollback(); 

            } else {                    
                $return['msj_success_true'] = 'EXITO';
                $this->db->trans_commit();    
            }

        } catch (Exception $e) {

            $this->db->trans_rollback(); 
            $return['error']= "ERROR: Controller > ".$e->getMessage(); 
        }



    }




	

}
