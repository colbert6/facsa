<?php 
class Repositorio extends CI_Model {

        public $title;
        public $content;
        public $date;


        public function get_lista()
        {       

                $this->db->select("idcolaborador as id, nombre as text, dni,contacto,correo");
                $this->db->from('colaborador');
                $this->db->where('estado','Activo');
                $query = $this->db->get();

                return $query->result();
        }

        public function get_info_repositorio_log($id_repositorio)
        {       

                $this->db->select("r.id_repositorio, r.codigo_repositorio, r.nombre_repositorio, r.descripcion, r.enlace");
                $this->db->from('repositorio as r');
                $this->db->where('r.id_repositorio',$id_repositorio);
                $query = $this->db->get();

                return $query->row_array();
        }

}

