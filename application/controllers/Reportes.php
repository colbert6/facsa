<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->controller = 'Reportes';//Siempre define las migagas de pan
    }

    public function reporte_lista_ingresantes()
    {
        $this->metodo = 'Ingresos a plataforma';//Siempre define las migagas de pan
        $this->_init(true,false,true);//Carga el tema ( $cargar_menu, $cargar_url, $cargar_template )        
        $this->load->model('reporte');
        $output['title'] = 'Lista de ingresantes a la plataforma' ; 
        $output['lista_nombre_escuelas'] = $this->reporte->get_lista_nombre_escuelas();
        $output['lista_categoria_usuario'] = $this->reporte->get_lista_categoria_usuario();
        $this->load->view('reportes/reporte_lista_ingresantes', $output ) ;
    }

    public function reporte_total_usuarios_ingresantes(){
        $this->metodo = 'Ingresos a plataforma';//Siempre define las migagas de pan
        $this->_init(true,false,true);//Carga el tema ( $cargar_menu, $cargar_url, $cargar_template )        
        $this->load->model('reporte');
        $output['title'] = 'Total usuarios ingresaron a plataforma por día y escuela ' ; 
        $output['lista_nombre_escuelas'] = $this->reporte->get_lista_nombre_escuelas();
        $output['lista_categoria_usuario'] = $this->reporte->get_lista_categoria_usuario();
        $this->load->view('reportes/reporte_total_usuarios_ingresantes', $output ) ;
    }

    public function reporte_lista_usuarios_estado(){
        $this->metodo = 'Usuarios en la plataforma';//Siempre define las migagas de pan
        $this->_init(true,false,true);//Carga el tema ( $cargar_menu, $cargar_url, $cargar_template )        
        $this->load->model('reporte');
        $output['title'] = 'Lista de usuarios en la plataforma con su estado actual' ; 
        $output['lista_estado_usuario'] = $this->reporte->get_lista_estado_usuario();
        $output['lista_categoria_usuario'] = $this->reporte->get_lista_categoria_usuario();
        //print_r($output['lista_estado_usuario']);
        //print_r($output['lista_categoria_usuario']);exit();

        $this->load->view('reportes/reporte_lista_usuarios_estado', $output ) ;
    }

    public function reporte_uso_repositorios(){
        $this->metodo = 'Uso de enlace de repositorios';//Siempre define las migagas de pan
        $this->_init(true,false,true);//Carga el tema ( $cargar_menu, $cargar_url, $cargar_template )        
        $this->load->model('reporte');
        $output['title'] = 'Totales de uso de enlaces a repositorios ' ; 
        $output['lista_categoria_usuario'] = $this->reporte->get_lista_categoria_usuario();
        $output['lista_nombre_escuelas'] = $this->reporte->get_lista_nombre_escuelas();
        //print_r($output['lista_estado_usuario']);
        //print_r($output['lista_categoria_usuario']);exit();

        $this->load->view('reportes/reporte_uso_repositorios', $output ) ;
    }

    public function generar_reporte_ingresantes($tipo_reporte){

        $this->load->model('reporte');
        
        $formato_reporte = $this->input->get('formato_reporte');
        $fecha_inicio_reporte = $this->input->get('fecha_inicio_reporte');
        $fecha_fin_reporte = $this->input->get('fecha_fin_reporte');
        $nombre_escuela = $this->input->get('nombre_escuela');
        $categoria_usuario = $this->input->get('categoria_usuario');
        
        switch ($tipo_reporte) {
            case 'lista':
                $data = $this->reporte->generate_lista_ingresantes_plataforma($fecha_inicio_reporte,$fecha_fin_reporte,$nombre_escuela,$categoria_usuario);

                $output['title'] = "Lista de ingresos a la plataforma desde $fecha_inicio_reporte al $fecha_fin_reporte, Escuela Profesional : ( $nombre_escuela) , Categoria usuario : ( $categoria_usuario) ";
                $output['campo_suma'] = False; //-- 'Total';
                $output['tipo_reporte'] = "reporte_lista_ingresantes";
                break;

            case 'total':
                $data = $this->reporte->generate_total_usuarios_ingresantes($fecha_inicio_reporte,$fecha_fin_reporte,$nombre_escuela,$categoria_usuario);
                
                $output['title'] = "Lista de ingresos a la plataforma desde $fecha_inicio_reporte al $fecha_fin_reporte, Escuela Profesional : ( $nombre_escuela) , Categoria usuario : ( $categoria_usuario) ";
                $output['campo_suma'] = 'Numero_usuarios'; //-- 'Total';
                $output['tipo_reporte'] = "reporte_total_usuarios_ingresantes";
                break;

            default:
                // code...
                $data = array( array('Reporte lista ingresantes' => 'No identificado') );
                $output = array( 'title' => 'No identificado', 'tipo_reporte' =>'No identificado', 'campo_suma'=>False );
                break;
        }
        
        //echo "<pre>";print_r($data); 

        if( count($data) == 0 ){ die("<h3>No se encontró resultados</h3>"); }

        $output['data'] = $data;
        

        if( strtolower($formato_reporte) == 'pdf' ){
            foreach ($data[0] as $key => $value) {
                $output['cabecera_data'][] = array($key, 100/count($data[0]) ,'L') ;     
            }
            $this->format_reporte_pdf($output);
        } else {
            
            $this->load->view('themes/table_basic', $output ) ;
        }
    }

    public function generar_lista_usuarios_estado($tipo_reporte){

        $this->load->model('reporte');
        
        $formato_reporte = $this->input->get('formato_reporte');
        $estado_usuario = $this->input->get('estado_usuario');
        $categoria_usuario = $this->input->get('categoria_usuario');

        switch ($tipo_reporte) {
            case 'lista':
                $data = $this->reporte->generate_lista_usuarios_estado($estado_usuario, $categoria_usuario);

                $output['title'] = "Lista de usuarios en la plataforma desde Estado usuario : ( $estado_usuario) ";
                $output['campo_suma'] = False; //-- 'Total';
                $output['tipo_reporte'] = "reporte_lista_usuarios_estado";
                break;

            default:
                // code...
                $data = array( array('Reporte lista ingresantes' => 'No identificado') );
                $output = array( 'title' => 'No identificado', 'tipo_reporte' =>'No identificado', 'campo_suma'=>False );
                break;
        }
        
        //echo "<pre>";print_r($data); 

        if( count($data) == 0 ){ die("<h3>No se encontró resultados</h3>"); }

        $output['data'] = $data;
        

        if( strtolower($formato_reporte) == 'pdf' ){
            foreach ($data[0] as $key => $value) {
                $output['cabecera_data'][] = array($key, 100/count($data[0]) ,'L') ;     
            }
            $this->format_reporte_pdf($output);
        } else {
            
            $this->load->view('themes/table_basic', $output ) ;
        }
    }

    public function generar_reporte_uso_repositorios($tipo_reporte){

        $this->load->model('reporte');
        
        $formato_reporte = $this->input->get('formato_reporte');        
        $fecha_inicio_reporte = $this->input->get('fecha_inicio_reporte');
        $fecha_fin_reporte = $this->input->get('fecha_fin_reporte');
        $nombre_escuela = $this->input->get('nombre_escuela');
        $categoria_usuario = $this->input->get('categoria_usuario');

        switch ($tipo_reporte) {
            case 'total':
                $data = $this->reporte->generate_total_uso_repositorios($fecha_inicio_reporte,$fecha_fin_reporte,$nombre_escuela,$categoria_usuario);
                
                $output['title'] = "Totales de uso de enlaces a repositorios desde $fecha_inicio_reporte al $fecha_fin_reporte, Escuela Profesional : ( $nombre_escuela) , Categoria usuario : ( $categoria_usuario) ";
                $output['campo_suma'] = 'Numero_usuarios'; //-- 'Total';
                $output['tipo_reporte'] = "reporte_total_usuarios_ingresantes";
                break;

            default:
                // code...
                $data = array( array('Reporte lista ingresantes' => 'No identificado') );
                $output = array( 'title' => 'No identificado', 'tipo_reporte' =>'No identificado', 'campo_suma'=>False );
                break;
        }
        
        //echo "<pre>";print_r($data); 

        if( count($data) == 0 ){ die("<h3>No se encontró resultados</h3>"); }

        $output['data'] = $data;
        

        if( strtolower($formato_reporte) == 'pdf' ){
            foreach ($data[0] as $key => $value) {
                $output['cabecera_data'][] = array($key, 100/count($data[0]) ,'L') ;     
            }
            $this->format_reporte_pdf($output);
        } else {
            
            $this->load->view('themes/table_basic', $output ) ;
        }
    }

    public function format_reporte_pdf($parametro){

        $orientation = 'L' ;
        $format = 'A4';
        if(isset($_GET['orientation'])){ $orientation = $this->input->get('orientation'); }
        if(isset($_GET['format'])){ $format = $this->input->get('format'); }

        $this->load->library('Pdf_reportes');
        $pdf = new Pdf_reportes($orientation, 'mm', $format , true, 'UTF-8', false);

        $pdf->tipo_documento = $parametro['tipo_reporte'];
        $pdf->nro_documento = "0001";      
        $pdf->usuario_generador = $this->session->userdata('username');
        $pdf->fecha_creacion = date("Y-m-d H:i:s");

        $nombrepdf = $pdf->tipo_documento."_".$pdf->fecha_creacion; 

        //Parametros del PDF
        $pdf->SetTitle($nombrepdf);
        
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->AddPage();

        //-- Titulo de reporte
        $pdf->MultiCell(  0, '', $parametro['title']); 

        //-- Tabla : 
        //$cabecera_tabla_reporte = array(  array('Descripcion',40 ,'L') , array('Cant.',20, 'R'),array('P.unit',20,'R'),array('Subtotal',20,'R') ); //-- array( nombre_cabecera, porcentaje_cabecera, alineacion_cabcera)
        $pdf->data_table( $parametro['data'] ,  $parametro['cabecera_data'], true);    

         /* Limpiamos la salida del búfer y lo desactivamos */
        ob_end_clean();
        $pdf->Output($nombrepdf.'.pdf', 'I');
    }

    


	

}
