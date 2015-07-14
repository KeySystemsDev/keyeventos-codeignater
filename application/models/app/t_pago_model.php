<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_pago_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      	= $this->load->database('aplicacion', true);		
		$this->apellido_pago  	= '';
		$this->ci_pass_pago     = '';
		$this->edad_pago 			  = '';
		$this->email_pago 			= '';
		$this->estado_pago 		  = '';
		$this->nombre_pago 		  = '';
		$this->ocupacion_pago 	= '';
		$this->sexo_pago 			  = '';
		$this->telefono_pago 	  = '';
		$this->twitter_pago 		= '';
		$this->universidad_pago = '';
	} 
	
	public function insertar_pago($arreglo = array()){
		$this->accion     			= 'insertar';
		$this->apellido_pago 	  = isset($arreglo['apellido_pago']) ? $arreglo['apellido_pago'] : 'n/a';
		$this->ci_pass_pago 	  = isset($arreglo['ci_pass_pago']) ? $arreglo['ci_pass_pago'] : 'n/a';
		$this->edad_pago 		    = isset($arreglo['edad_pago']) ? $arreglo['edad_pago'] : 'n/a';
		$this->email_pago 	    = isset($arreglo['email_pago']) ? $arreglo['email_pago'] : 2;
		$this->estado_pago 		  = isset($arreglo['estado_pago']) ? $arreglo['estado_pago'] : 1;
		$this->nombre_pago 		  = isset($arreglo['nombre_pago']) ? $arreglo['nombre_pago'] : 'n/a';
		$this->ocupacion_pago	  = isset($arreglo['ocupacion_pago']) ? $arreglo['ocupacion_pago'] : 'n/a';
		$this->sexo_pago			  = isset($arreglo['sexo_pago']) ? $arreglo['sexo_pago'] : 'n/a';
		$this->telefono_pago		= isset($arreglo['telefono_pago']) ? $arreglo['telefono_pago'] : 'n/a';
		$this->twitter_pago		  = isset($arreglo['twitter_pago']) ? $arreglo['twitter_pago'] : 'n/a';
		$this->universidad_pago = isset($arreglo['universidad_pago']) ? $arreglo['universidad_pago'] : 'n/a';

		$query            		  = $this->_enviar_parametros();
		return $query;
	}

	public function consultar_usuarios_registrados_pagos($arreglo = array()){
	$this->accion       = 'consulta_por_cedula';
	$this->ci_pass_pago = $arreglo['ci_pass_pago'];

	$query 		          = $this->_enviar_parametros();
	return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_pagos (
				'".$this->accion."', #accion
				'".$this->apellido_pago."', #id_maestro
				'".$this->ci_pass_pago."', #ci_pass_pago_global
				'".$this->edad_pago."', #edad_pago_global
				'".$this->email_pago."', #email_pago_global
				'".$this->estado_pago."', #estado_pago_global
				'".$this->nombre_pago."', #nombre_pago_global
				'".$this->ocupacion_pago."', #ocupacion_pago_global
				'".$this->sexo_pago."', #sexo_pago_global
				'".$this->telefono_pago."', #telefono_pago_global
				'".$this->twitter_pago."', #twitter_pago_global
				'".$this->universidad_pago."' #universidad_pago_global
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