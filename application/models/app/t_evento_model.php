<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_evento_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      	    = $this->load->database('aplicacion', true);		
		$this->nombre_pago  	= '';
		$this->descripcion_pago = '';
	} 
	
	public function insertar_evento($arreglo = array()){
		$this->accion     			= 'insertar';
		$this->nombre_pago 	    = isset($arreglo['nombre_evento']) ? $arreglo['nombre_evento'] : 'n/a';
		$this->descripcion_pago = isset($arreglo['descripcion_evento']) ? $arreglo['descripcion_evento'] : 'n/a';

		$query            		  = $this->_enviar_parametros();
		return $query;
	}

	public function consultar_eventos(){
	$this->accion = 'consulta_eventos';

	$query 		  = $this->_enviar_parametros();
	return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_eventos (
				'".$this->accion."', #accion
				'".$this->nombre_pago."', #nombre_pago
				'".$this->descripcion_pago."' #descripcion_pago
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