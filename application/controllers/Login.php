<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
    }


	public function index()
	{      
        $parametros ['token'] = $this->generar_token();
        $this->load->view('login/index',$parametros) ;
	}

    public function verificar() 
    {
        if ($this->input->post('token') == $this->session->flashdata('token') ) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');//md5()

            //echo $password;exit();
            if ($this->check_login($username, $password) == FALSE) {
                //echo "false";
                $this->session->set_flashdata('error_login', 'Usuario o Contraseña incorrecta!');
                
                redirect('login', 'location’');
            } else {
                redirect('principal', 'location’');                

            }
        } else {
            //echo "no token";    
            redirect('login', 'location’');

        }
    }

    private function generar_token(){

        $token =  md5(rand(10,999)) ; 
        $this->session->set_flashdata('token',$token );
        return $token;
    }

    private function check_login($username, $password){
             
        $rpta = false;

        $this->db->select("col.id_usuario as id_user,col.id_perfil as id_perfil, col.nombres_usuario as nombre ,  per.nombre_perfil as perfil ");
        $this->db->from('usuario as col');
        $this->db->join('seg_perfil per','col.id_perfil = per.id_perfil');
        $this->db->where('usuario',$username);
        $this->db->where('clave',$password);
        $acceso = $this->db->get();

        if($acceso->num_rows()==1){

            $datos = $acceso->row();

            $this->insert_login_plataforma($datos->id_user);

            $array = array (
            'id_user' => $datos->id_user,
            'id_perfil' => $datos->id_perfil,
            'username' => $datos->nombre,
            'perfil' => $datos->perfil,
            'logeado_sis' =>  true
            );

            $this->session->set_userdata($array);
            $rpta = true;
        }
        return $rpta;
    }

    private function insert_login_plataforma($id_usuario){

        $this->load->model('usuario');
        $this->load->model('login_plataforma');

        $data_usuario_log = $this->usuario->get_info_usuario_log($id_usuario);
        $this->login_plataforma->id_usuario = $data_usuario_log['id_usuario'];
        $this->login_plataforma->codigo_unsm_usuario = $data_usuario_log['codigo_unsm'];

        $this->login_plataforma->nombres_usuario = $data_usuario_log['nombres_usuario'];
        $this->login_plataforma->apellidos_usuario = $data_usuario_log['apellidos_usuario'];
        $this->login_plataforma->categoria_usuario = $data_usuario_log['categoria_usuario'];
        $this->login_plataforma->categoria_docente = $data_usuario_log['categoria_docente'];
        $this->login_plataforma->estado_usuario = $data_usuario_log['estado_usuario'];

        $this->login_plataforma->id_escuela_profesional = $data_usuario_log['id_escuela_profesional'];
        $this->login_plataforma->nombre_escuela = $data_usuario_log['nombre_escuela'];

        
        $this->login_plataforma->insert_login_plataforma();

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login', 'location’');
    }

	

}
