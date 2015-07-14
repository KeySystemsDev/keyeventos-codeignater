<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_detalle_pago_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app                	      = $this->load->database('aplicacion', true);		
		$this->id_pago  	                  = '';
		$this->id_evento                      = '';
		$this->id_tipo_pago 			      = '';
		$this->id_tipo_banco 			      = '';
		$this->numero_movimiento_detalle_pago = '';
		$this->fecha_pago_detalle_pago 		  = '';
		$this->ci_pass_pago 		          = '';
	} 
	
	public function insertar_detalle_pago($arreglo = array()){
		$this->accion     			          = 'insertar';
		$this->id_evento 	                  =  $arreglo['id_evento'];
		$this->id_tipo_pago 		          =  $arreglo['id_tipo_pago'];
		$this->id_tipo_banco 	              =  $arreglo['id_tipo_banco'];
		$this->numero_movimiento_detalle_pago =  $arreglo['numero_movimiento_detalle_pago'];
		$this->fecha_pago_detalle_pago 		  =  $arreglo['fecha_pago_detalle_pago'];
		$this->ci_pass_pago 		          =  $arreglo['ci_pass_pago'];
		
		$query            		              = $this->_enviar_parametros();
		return $query;
	}

	public function consultar_usuarios_registrados_pagos($arreglo = array()){
	$this->accion = 'consulta_por_cedula';
	$this->ci_pass_pago = $arreglo['ci_pass_pago'];

	$query 		          = $this->_enviar_parametros();
	return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_detalle_pago(
				'".$this->accion."', #accion
				'".$this->id_pago."', #id_pago
				'".$this->id_evento."', #id_evento
				'".$this->id_tipo_pago."', #id_tipo_pago
				'".$this->id_tipo_banco."', #id_tipo_banco
				'".$this->numero_movimiento_detalle_pago."', #numero_movimiento_detalle_pago
				'".$this->fecha_pago_detalle_pago."', #fecha_pago_detalle_pago 
				'".$this->ci_pass_pago."' #ci_pass_pago 
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