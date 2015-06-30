<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_patrocinante_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      								= $this->load->database('aplicacion', true);		
		$this->nombre_patrocinante  			= '';
		$this->rif_patrocinante						= '';
		$this->inscripciones_patrocinante = '';
		$this->habitaciones_patrocinante 	= '';
		$this->id_patrocinante						= '';
		$this->email_patrocinante  				= '';
		$this->direccion_patrocinante  		= '';
		$this->telefono_patrocinante  		= '';
	} 
	
	public function insertar_patrocinante($arreglo = array()){
		$this->accion     								= 'insertar';
		$this->nombre_patrocinante 				= $arreglo['nombre_patrocinante'];
		$this->rif_patrocinante 					= $arreglo['rif_patrocinante'];
		$this->inscripciones_patrocinante = $arreglo['inscripciones_patrocinante'];
		$this->habitaciones_patrocinante 	= $arreglo['habitaciones_patrocinante'];
		$this->email_patrocinante 				= $arreglo['email_patrocinante'];
		$this->direccion_patrocinante 		= $arreglo['direccion_patrocinante'];
		$this->telefono_patrocinante 			= $arreglo['telefono_patrocinante'];

		$query            								= $this->_enviar_parametros();
		return $query;
	}

	public function consultar(){
		$this->accion = 'consulta_maestro';

		$query 			  = $this->_enviar_parametros();
		return $query;
	}

	public function consultar_existencia($arreglo = array()){
		$this->accion           = 'consulta_existencia';
		$this->rif_patrocinante	= $arreglo['rif_patrocinante'];		

		$query 			  = $this->_enviar_parametros();
		return $query;
	}

	public function consultar_patrocinante($arreglo = array()){
		$this->accion    	 			= 'consulta_patrocinante';
		$this->id_patrocinante 	= $arreglo['id_patrocinante'];

		$query 									= $this->_enviar_parametros();
		return $query;
	}

	public function editar_patrocinante($arreglo = array()){
		$this->accion     								= 'editar';
		$this->nombre_patrocinante 				= $arreglo['nombre_patrocinante'];
		$this->rif_patrocinante 					= $arreglo['rif_patrocinante'];
		$this->inscripciones_patrocinante = $arreglo['inscripcion_patrocinante'];
		$this->id_laboratorio 						= $arreglo['id_laboratorio_patrocinante'];
		$this->habitaciones_patrocinante 	= $arreglo['habitacion_patrocinante'];
		$this->email_patrocinante 				= $arreglo['email_patrocinante'];
		$this->direccion_patrocinante 		= $arreglo['direccion_patrocinante'];
		$this->telefono_patrocinante 			= $arreglo['telefono_patrocinante'];
		$this->id_patrocinante 						= $arreglo['id_patrocinante'];

		$query            								= $this->_enviar_parametros();
		return $query;
	}

	public function eliminar_patrocinante($arreglo = array()){
		$this->accion     			= 'eliminar';
		$this->id_patrocinante 	= $arreglo['id_patrocinante'];

		$query            			= $this->_enviar_parametros();
		return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_patrocinante (
				'".$this->accion."', #accion
				'".strtolower(utf8_encode($this->nombre_patrocinante))."', #nombre_patrocinante
				'".strtolower(utf8_encode($this->rif_patrocinante))."', #rif_patrocinante
				'".$this->inscripciones_patrocinante."', #inscripciones_patrocinante
				'".$this->habitaciones_patrocinante."', #habitaciones_patrocinante
				'".$this->id_patrocinante."', #id_patrocinante
				'".strtolower(utf8_encode($this->email_patrocinante))."', #email_patrocinante
				'".strtolower(utf8_encode($this->direccion_patrocinante))."', #direccion_patrocinante
				'".strtolower(utf8_encode($this->telefono_patrocinante))."' #telefono_patrocinante
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