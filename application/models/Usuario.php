<?php 
class Usuario extends CI_Model {

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

        public function get_info_usuario_log($id_usuario)
        {       

                $this->db->select("u.id_usuario, u.nombres_usuario, u.apellidos_usuario, u.categoria_usuario, u.categoria_docente, u.estado_usuario, u.id_escuela_profesional, u.codigo_unsm, e.nombre_escuela");
                $this->db->from('usuario as u');
                $this->db->join('escuela_profesional as e', 'u.id_escuela_profesional = e.id_escuela_profesional', 'left');
                $this->db->where('u.id_usuario',$id_usuario);
                $query = $this->db->get();

                return $query->row_array();
        }

}

