<?php 
class Reporte extends CI_Model {

        public function get_lista_nombre_escuelas()
        {
                $this->db->distinct();
                $this->db->select("nombre_escuela");
                //$this->db->from('escuela_profesional'); --login_plataforma
                $this->db->from('login_plataforma');
                $query = $this->db->get();

                return $query->result_array();
        }

        public function get_lista_categoria_usuario()
        {
                $this->db->distinct();
                $this->db->select("categoria_usuario");
                //$this->db->from('usuario'); --login_plataforma
                $this->db->from('login_plataforma');
                $query = $this->db->get();

                return $query->result_array();
        }

        public function get_lista_estado_usuario()
        {
                $lista_estado_usuario = array( array('estado_usuario'=>'Vigente'), array('estado_usuario'=>'Retirado'), array('estado_usuario'=>'Egresado'));

                return $lista_estado_usuario;
        }

        public function generate_lista_ingresantes_plataforma($fecha_inicio_reporte,$fecha_fin_reporte,$nombre_escuela,$categoria_usuario)
        {
                $where_sql = " (fecha_creacion_date between '$fecha_inicio_reporte' AND '$fecha_fin_reporte' ) ";

                if( $nombre_escuela != '' ) { $where_sql .= " AND nombre_escuela = '$nombre_escuela' "; }
                if( $categoria_usuario != '' ) { $where_sql .= " AND categoria_usuario = '$categoria_usuario' "; };
                

                $this->db->select("codigo_unsm_usuario as Codigo, concat(nombres_usuario,' ',apellidos_usuario) as Nombres_Apellidos, nombre_escuela as Escuela, categoria_usuario as Categoria, fecha_creacion_datetime as Fecha_hora ");
                //$this->db->from('usuario'); --login_plataforma
                $this->db->from('login_plataforma');
                $this->db->where($where_sql);
                $this->db->order_by(' fecha_creacion_datetime DESC ');
                $query = $this->db->get();

                //echo $this->db->last_query();exit();

                return $query->result_array();
        }

         public function generate_total_usuarios_ingresantes($fecha_inicio_reporte,$fecha_fin_reporte,$nombre_escuela,$categoria_usuario)
        {
                $where_sql = " (fecha_creacion_date between '$fecha_inicio_reporte' AND '$fecha_fin_reporte' ) ";

                if( $nombre_escuela != '' ) { $where_sql .= " AND nombre_escuela = '$nombre_escuela' "; }
                if( $categoria_usuario != '' ) { $where_sql .= " AND categoria_usuario = '$categoria_usuario' "; };
                

                $this->db->select(" fecha_creacion_date as Fecha, nombre_escuela as Escuela, COUNT( DISTINCT id_usuario) as Numero_usuarios ");
                //$this->db->from('usuario'); --login_plataforma
                $this->db->from('login_plataforma');
                $this->db->where($where_sql);
                $this->db->group_by('fecha_creacion_date , nombre_escuela');
                $this->db->order_by(' fecha_creacion_date DESC ');
                $query = $this->db->get();

                //echo $this->db->last_query();exit();

                return $query->result_array();
        }

        public function generate_lista_usuarios_estado($estado_usuario, $categoria_usuario)
        {
                $where_sql = " ( 1 = 1 ) ";

                if( $estado_usuario != '' ) { $where_sql .= " AND estado_usuario = '$estado_usuario' "; }
                if( $categoria_usuario != '' ) { $where_sql .= " AND categoria_usuario = '$categoria_usuario' "; };

                $this->db->select(" u.codigo_unsm as Codigo, concat(u.nombres_usuario,' ',u.apellidos_usuario) as Nombres_Apellidos, u.estado_usuario as Estado, u.categoria_usuario as Categoria, e.nombre_escuela as Escuela ");
                //$this->db->from('usuario'); --login_plataforma
                $this->db->from('usuario as u');
                $this->db->join('escuela_profesional as e', 'u.id_escuela_profesional = e.id_escuela_profesional', 'left');
                $this->db->where($where_sql);
                $this->db->order_by(' Nombres_Apellidos DESC ');
                $query = $this->db->get();

                //echo $this->db->last_query();exit();

                return $query->result_array();
        }

         public function generate_total_uso_repositorios($fecha_inicio_reporte,$fecha_fin_reporte,$nombre_escuela,$categoria_usuario)
        {
                $where_sql = " (log.fecha_creacion_date between '$fecha_inicio_reporte' AND '$fecha_fin_reporte' ) ";

                if( $nombre_escuela != '' ) { $where_sql .= " AND log.nombre_escuela = '$nombre_escuela' "; }
                if( $categoria_usuario != '' ) { $where_sql .= " AND log.categoria_usuario = '$categoria_usuario' "; };
                

                $this->db->select(" r.codigo_repositorio as Codigo, r.nombre_repositorio as Repositorio, log.nombre_escuela as Escuela, log.categoria_usuario as Categoria,  COUNT( log.id_usuario) as Numero_usuarios ");
                //$this->db->from('usuario'); --login_plataforma
                $this->db->from('log_enlace_repositorio log');
                $this->db->join('repositorio as r', 'log.id_repositorio = r.id_repositorio', 'inner');
                $this->db->where($where_sql);

                $this->db->group_by('r.codigo_repositorio, r.nombre_repositorio, log.nombre_escuela, log.categoria_usuario');
                $this->db->order_by(' Repositorio DESC, Escuela DESC, Categoria DESC ');
                $query = $this->db->get();

                //echo $this->db->last_query();exit();

                return $query->result_array();
        }

        

        

}

