<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_participante_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      						= $this->load->database('aplicacion', true);
		$this->nombre_participante  	= '';
		$this->apellido_participante	= '';
		$this->cedula_participante 		= '';
		$this->id_tipo_especialidad  	= '';
		$this->email_participante  		= '';
		$this->id_patrocinante				= '';
		$this->id_tipo_asistencia  		= '';
		$this->id_participante				= '';
		$this->asignar_habitacion			= '';
	} 
	
	public function insertar_participante($arreglo = array()){
		$this->accion     						= 'insertar';
		$this->nombre_participante 		= $arreglo['nombre_participante'];
		$this->apellido_participante 	= $arreglo['apellido_participante'];
		$this->cedula_participante 		= $arreglo['cedula_participante'];
		$this->id_tipo_especialidad 	= $arreglo['especialidad_participante'];
		$this->email_participante 		= $arreglo['email_participante'];
		$this->id_patrocinante 				= $arreglo['id_patrocinante'];
		$this->id_tipo_asistencia			= $arreglo['tipo_asistencia_participante'];
		$this->asignar_habitacion			= $arreglo['habitacion_participante'];

		$query            						= $this->_enviar_parametros();
		return $query;
	}

	public function consultar(){
		$this->accion    	 	= 'consulta_maestro';

		$query 							= $this->_enviar_parametros();
		return $query;
	}

	public function consultar_existencia($arreglo = array()){
		$this->accion              = 'consulta_existencia';
		$this->cedula_participante = $arreglo['cedula_participante'];		

		$query 			  = $this->_enviar_parametros();
		return $query;
	}

	public function consultar_participante($arreglo = array()){
		$this->accion    	 			= 'consulta_participante';
		$this->id_participante 	= $arreglo['id_participante'];

		$query 									= $this->_enviar_parametros();
		return $query;
	}

	public function editar_participante($arreglo = array()){
		$this->accion     						= 'editar';
		$this->nombre_participante 		= $arreglo['nombre_participante'];
		$this->apellido_participante 	= $arreglo['apellido_participante'];
		$this->cedula_participante 		= $arreglo['cedula_participante'];
		$this->id_tipo_especialidad 	= $arreglo['especialidad_participante'];
		$this->email_participante 		= $arreglo['email_participante'];
		$this->id_patrocinante 				= $arreglo['laboratorio_patrocinante'];
		$this->id_tipo_asistencia 		= $arreglo['tipo_asistencia_participante'];
		$this->id_participante				= $arreglo['id_participante'];

		$query            						= $this->_enviar_parametros();
		return $query;
	}

	public function eliminar_participante($arreglo = array()){
		$this->accion     			= 'eliminar';
		$this->id_participante 	= $arreglo['id_participante'];

		$query            			= $this->_enviar_parametros();
		return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_participante (
				'".$this->accion."', #accion
				'".strtolower(utf8_encode($this->nombre_participante))."', #nombre_participante
				'".strtolower(utf8_encode($this->apellido_participante))."', #apellido_participante
				'".$this->cedula_participante."', #cedula_participante
				'".$this->id_tipo_especialidad."', #id_tipo_especialidad
				'".strtolower(utf8_encode($this->email_participante))."', #email_participante
				'".$this->id_patrocinante."', #id_patrocinante
				'".$this->id_tipo_asistencia."', #id_tipo_asistencia
				'".$this->id_participante."', #id_participante
				'".$this->asignar_habitacion."' #asignar_habitacion
		  )"
	  );

		$query = $procedure->result();
		$procedure->next_result();
		$procedure->free_result();
		return $query;
  }
}

/* End of file ayuda.php */
/* Location: ./application/models/ayuda.php */