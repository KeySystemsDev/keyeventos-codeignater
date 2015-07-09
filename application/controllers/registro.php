<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller{
	
	public function __construct(){
		parent::__construct();		
		$sesion 								= $this->session->userdata('usuario');

		if(!empty($sesion)){
			$this->gestor 			  = 100;
			$this->id_aplicacion 	= $this->session->userdata('id_aplicacion');
			$this->id_grupo 			= $this->session->userdata('id_grupo');
			$this->id_usuario			= $this->session->userdata('id_usuario');
			$this->menu 					= $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
			$this->sub_menu 			= $this->permisologia_model->getSubMenu($this->gestor, $this->id_usuario, $this->id_grupo);	
			$this->layout->setLayout('keypanel');	
			$this->layout->js(array(base_url()."public/libs/bootstrap/js/component/bootstrap-button.js"));					
		}else{
			redirect(base_url(), 301);	
		}
	}

	public function index(){			
		$this->layout->setTitle('.: Inscripcion :.');		
		$menu 			= $this->menu;
		$sub_menu 	= $this->sub_menu;	

		$this->layout->view('index', compact('menu', 'sub_menu'));
	}

	/* ----------------------------------------------------------------------
	|
	|
	|										  REGISTRO DE PARTICIPANTE
	|
	|
	-----------------------------------------------------------------------*/	
	public function participante(){
		$this->layout->setTitle('.: Participante :.');		
		$menu 			= $this->menu;
		$sub_menu 	= $this->sub_menu;	
		$arreglo  	= array(
			'id_asistencia'		=> 6,
			'id_especialidad'	=> 5,
		);

		$asistencias 		= $this->t_tipo_model->consultar_asistencias($arreglo);
		$especialidades = $this->t_tipo_model->consultar_especialidades($arreglo);
		$patrocinantes	= $this->t_patrocinante_model->consultar();
		$this->layout->view('participante', compact('menu', 'sub_menu', 'asistencias', 'especialidades', 'patrocinantes'));
	}	

	public function participante_agregar(){
		$arreglo = array(
			'cedula_participante' 					=> $this->input->post("i_cedula"),
			'nombre_participante' 					=> $this->input->post("i_nombre"),
			'apellido_participante' 				=> $this->input->post("i_apellido"),
			'email_participante' 						=> $this->input->post("i_email"),
			'especialidad_participante' 		=> $this->input->post("s_especialidad"),									
			'id_patrocinante'					 			=> $this->input->post("s_laboratorio"),
			'tipo_asistencia_participante' 	=> $this->input->post("s_asistencia"),
			'habitacion_participante' 			=> $this->input->post("i_habitacion")
		);
		
		$this->t_participante_model->insertar_participante($arreglo);
	}

	public function participante_consultar(){
		$arreglo = array(
			'cedula_participante' => $this->input->post("i_cedula"),
		);

		$patrocinante = $this->t_participante_model->consultar_existencia($arreglo);
		echo json_encode($patrocinante);
	}	
	/* ----------------------------------------------------------------------
	|
	|
	|										  REGISTRO DE PATROCINANTE
	|
	|
	-----------------------------------------------------------------------*/		
	public function patrocinante(){
		$this->layout->setTitle('.: Patrocinante :.');		
		$menu 				= $this->menu;
		$sub_menu 		= $this->sub_menu;
		
		$laboratorios	= $this->t_laboratorio_model->consultar();
		$this->layout->view('patrocinante', compact('menu', 'sub_menu', 'laboratorios'));
	}

	public function patrocinante_agregar(){
		$arreglo = array(
			'rif_patrocinante' 						=> $this->input->post("i_rif"),
			'nombre_patrocinante' 				=> $this->input->post("i_nombre"),
			'direccion_patrocinante' 			=> $this->input->post("i_direccion"),
			'telefono_patrocinante' 			=> $this->input->post("i_telefono"),
			'inscripciones_patrocinante' 	=> $this->input->post("i_inscripcion"),
			'habitaciones_patrocinante' 	=> $this->input->post("i_habitacion"),									
			'email_patrocinante' 					=> $this->input->post("i_email")
		);

		$this->t_patrocinante_model->insertar_patrocinante($arreglo);
	}

	public function patrocinante_consultar(){
		$arreglo = array(
			'rif_patrocinante' => $this->input->post("i_rif"),
		);
		
		$patrocinante = $this->t_patrocinante_model->consultar_existencia($arreglo);
		echo json_encode($patrocinante);
	}


		/* ----------------------------------------------------------------------
	|
	|
	|										  REGISTRO DE PAGOS
	|
	|
	-----------------------------------------------------------------------*/		
	public function pagos(){
		$this->layout->setTitle('.: Pagos :.');		
		$menu 				= $this->menu;
		$sub_menu 		= $this->sub_menu;
		$this->layout->view('pagos', compact('menu', 'sub_menu', 'pagos'));
	}

	public function consultar_pagos(){
		$arreglo = array(
			'ci_pass_pago' => $this->input->post("i_cedula"),
		);
		$pagos	= $this->t_pago_model->consultar_usuarios_registrados_pagos($arreglo);
    echo json_encode($pagos);
	}

	public function insertar_pagos(){
		$arreglo = array(
			'apellido_pago'    => $this->input->post("i_apellido"),
			'ci_pass_pago'     => $this->input->post("i_cedula"),
			'edad_pago'        => $this->input->post("i_edad"),
			'email_pago'       => $this->input->post("i_email"),
			'estado_pago'      => $this->input->post("s_estado"),									
			'nombre_pago'      => $this->input->post("i_nombre"),
			'ocupacion_pago'   => $this->input->post("s_ocupacion"),
			'sexo_pago'        => $this->input->post("s_sexo"),
			'telefono_pago'    => $this->input->post("i_telefono"),
			'twitter_pago'     => $this->input->post("i_twitter"),
			'universidad_pago' => $this->input->post("i_universidad"),
			'id_evento'        => $this->input->post("id_evento")
		);
		$insertar_pagos	= $this->t_pago_model->insertar_pago($arreglo);
	}


	/* ----------------------------------------------------------------------
	|
	|
	|										  REGISTRO DE EVENTOS
	|
	|
	-----------------------------------------------------------------------*/		
	public function registro_evento(){
		$this->layout->setTitle('.: Registros Eventos :.');		
		$menu 				= $this->menu;
		$sub_menu 		= $this->sub_menu;
		$this->layout->view('pagos', compact('menu', 'sub_menu', 'pagos'));

		$arreglo = array(
			'apellido_pago' 		=> $this->input->post("i_apellido"),
			'ci_pass_pago' 			=> $this->input->post("i_cedula"),
			'edad_pago' 				=> $this->input->post("i_edad"),
			'email_pago' 				=> $this->input->post("i_email"),
			'estado_pago' 		  => $this->input->post("s_estado"),									
			'nombre_pago'				=> $this->input->post("i_nombre"),
			'ocupacion_pago' 	  => $this->input->post("s_ocupacion"),
			'sexo_pago' 			  => $this->input->post("s_sexo"),
			'telefono_pago' 	  => $this->input->post("i_telefono"),
			'twitter_pago' 			=> $this->input->post("i_twitter"),
			'universidad_pago' 	=> $this->input->post("i_universidad"),
			'id_evento' 	      => $this->input->post("id_evento")
		);
		$insertar_pagos	= $this->t_pago_model->insertar_pago($arreglo);
	}	
}