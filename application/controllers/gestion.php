<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion extends CI_Controller{
	
	public function __construct(){
			parent::__construct();		
			$sesion = $this->session->userdata('usuario');
			if(!empty($sesion)){
				$this->gestor 				= 120;
				$this->id_aplicacion 	= $this->session->userdata('id_aplicacion');
				$this->id_grupo 			= $this->session->userdata('id_grupo');
				$this->id_usuario			= $this->session->userdata('id_usuario');
				$this->layout->js(array(base_url()."public/libs/bootstrap/js/plugins/datatables/jquery.dataTables.js"));
				$this->layout->js(array(base_url()."public/libs/bootstrap/js/plugins/datatables/jquery.dataTables.js"));
				$this->layout->css(array(base_url()."public/libs/bootstrap//css/datatables/dataTables.bootstrap.css"));
				$this->layout->setLayout('keypanel');
			}else{
				redirect(base_url(), 301);	
			}
		}

		public function index(){			
			$this->layout->setTitle('.: Listado :.');		
			$menu 			= $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
			$sub_menu 	= $this->permisologia_model->getSubMenu($this->gestor, $this->id_usuario, $this->id_grupo);	
		
			$this->layout->view('index',compact('menu', 'sub_menu'));
		}

	/*----------------------------------------------------------------
	 | 
	 |
	 |           GESTION DE PARTICIPANTES 
	 |
	 |
	 -----------------------------------------------------------------*/

		public function participante(){			
			$this->layout->setTitle('.: Listado de Participantes :.');		
			$menu 			= $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
			$sub_menu 	= $this->permisologia_model->getSubMenu($this->gestor, $this->id_usuario, $this->id_grupo);	
		
			$participantes = $this->t_participante_model->consultar();
			$this->layout->view('participantes',compact('menu', 'sub_menu', 'participantes'));
		}		

		public function participante_editar($id){
			$this->layout->setTitle('.: Editar Participante :.');		
			$menu 		= $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
			$sub_menu = $this->permisologia_model->getSubMenu($this->gestor, $this->id_usuario, $this->id_grupo);			
			$arreglo 	= array(
				'id_participante' => $id,
				'id_asistencia' 	=> 6,
				'id_especialidad' => 5,
			);

			$asistencias 		= $this->t_tipo_model->consultar_asistencias($arreglo);
			$especialidades = $this->t_tipo_model->consultar_especialidades($arreglo);
			$patrocinantes		= $this->t_patrocinante_model->consultar();
			$participante 	= $this->t_participante_model->consultar_participante($arreglo);
			$this->layout->view('modificar_participante',compact('menu', 'sub_menu', 'participante', 'asistencias', 'especialidades', 'patrocinantes'));
		}

		public function participante_actualizar(){			
			if ($this->input->post()){
				$arreglo = array(
					'cedula_participante' 					=> $this->input->post("i_cedula"),
					'nombre_participante' 					=> $this->input->post("i_nombre"),
					'apellido_participante' 				=> $this->input->post("i_apellido"),
					'email_participante' 						=> $this->input->post("i_email"),
					'especialidad_participante' 		=> $this->input->post("s_especialidad"),									
					'laboratorio_patrocinante'			=> $this->input->post("s_laboratorio"),
					'tipo_asistencia_participante' 	=> $this->input->post("s_asistencia"),
					'id_participante'								=> $this->input->post("id_participante")
				);

				$this->t_participante_model->editar_participante($arreglo);	
			}
		}

		public function participante_eliminar($id){
			$arreglo 	= array(
				'id_participante' => $id,
			);

			$this->t_participante_model->eliminar_participante($arreglo);
		}

	 /*----------------------------------------------------------------
	 | 
	 |
	 |           GESTION DE PATROCINANTES 
	 |
	 |
	 -----------------------------------------------------------------*/

		public function patrocinante(){			
			$this->layout->setTitle('.: Listado de Participantes :.');		
			$menu 			= $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
			$sub_menu 	= $this->permisologia_model->getSubMenu($this->gestor, $this->id_usuario, $this->id_grupo);	
		
			$patrocinantes = $this->t_patrocinante_model->consultar();
			$this->layout->view('patrocinantes',compact('menu', 'sub_menu', 'patrocinantes'));
		}		

		public function patrocinante_editar($id){
			$this->layout->setTitle('.: Editar Participante :.');		
			$menu 		= $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
			$sub_menu = $this->permisologia_model->getSubMenu($this->gestor, $this->id_usuario, $this->id_grupo);			
			$arreglo 	= array(
				'id_patrocinante' => $id,
			);

			$patrocinante 	= $this->t_patrocinante_model->consultar_patrocinante($arreglo);
			$this->layout->view('modificar_patrocinante',compact('menu', 'sub_menu', 'patrocinante'));
		}

		public function patrocinante_actualizar(){			
			if ($this->input->post()){
				$arreglo = array(
					'rif_patrocinante' 						=> $this->input->post("i_rif"),
					'nombre_patrocinante' 				=> $this->input->post("i_nombre"),
					'direccion_patrocinante' 			=> $this->input->post("i_direccion"),
					'telefono_patrocinante' 			=> $this->input->post("i_telefono"),
					'email_patrocinante' 					=> $this->input->post("i_email"),									
					'id_laboratorio_patrocinante' => $this->input->post("s_laboratorio"),
					'habitacion_patrocinante' 		=> $this->input->post("i_habitacion"),
					'inscripcion_patrocinante' 		=> $this->input->post("i_inscripcion"),
					'id_patrocinante'							=> $this->input->post("id_patrocinante")
				);

				$this->t_patrocinante_model->editar_patrocinante($arreglo);	
			}
		}

		public function patrocinante_eliminar($id){
			$arreglo 	= array(
				'id_patrocinante' => $id,
			);

			$this->t_patrocinante_model->eliminar_patrocinante($arreglo);
		}
}