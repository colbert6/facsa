<?php 
class Menu_repositorio extends CI_Model {

    public $id_modulo;
    public $id_perfil;
    public $priority;

    
    

    public function get_menu_repositorio($idperfil = '-1')
    {   
        $this->db->select("modu.id_repositorio, modu.nombre_repositorio, modu.enlace as enlace, modu.descripcion, modu.imagen_repositorio");
        $this->db->from("repositorio modu");
        $this->db->join('menu_repositorio men','men.id_repositorio = modu.id_repositorio');
        $this->db->where("men.id_perfil", $idperfil);
        $this->db->order_by("men.priority", "ASC");
        $query = $this->db->get();

        return $query->result_array();
    }


}


