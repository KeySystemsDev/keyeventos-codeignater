<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_laboratorio_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      							= $this->load->database('aplicacion', true);		
		$this->nombre_laboratorio  			= '';
		$this->descripcion_laboratorio	= '';
		$this->id_laboratorio 					= '';
	} 
	
	public function insertar_laboratorio($arreglo = array()){
		$this->accion     							= 'insertar';
		$this->nombre_laboratorio 			= isset($arreglo['nombre_laboratorio']) ? $arreglo['nombre_laboratorio'] : 'n/a';
		$this->descripcion_laboratorio 	= isset($arreglo['descripcion_laboratorio']) ? $arreglo['descripcion_laboratorio'] : 'n/a';

		$query            							= $this->_enviar_parametros();
		return $query;
	}
	
	public function eliminar_laboratorio($arreglo = array()){
		$this->accion     			= 'eliminar';
		$this->id_laboratorio 	= $arreglo['id_laboratorio'];

		$query            			= $this->_enviar_parametros();
		return $query;
	}

	public function consultar($arreglo = array()){
		$this->accion    	 	= 'consulta_maestro';

		$query 							= $this->_enviar_parametros();
		return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_laboratorio (
				'".$this->accion."', #accion
				'".strtolower(utf8_encode($this->nombre_laboratorio))."', #nombre_laboratorio
				'".strtolower(utf8_encode($this->descripcion_laboratorio))."', #descripcion_laboratorio
				'".$this->id_laboratorio."' #id_laboratorio
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