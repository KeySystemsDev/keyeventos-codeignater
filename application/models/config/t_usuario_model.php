<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_usuario_model extends CI_Model {

	public function __construct(){
		parent::__construct();		
		$this->correo_usuario   = '';
		$this->clave_usuario    = '';
		$this->id_usuario       = '';
		$this->fecha_nacimiento = '';
	}
	
	public function getUsuarios(){
		$this->accion = 'consulta_maestro';
		$query        = $this->_enviar_parametros();
		return $query;
	}

	public function insertar_usuario($arreglo = array()){
		$this->accion         = 'insertar';
		$this->correo_usuario = $arreglo['correo_usuario'];
		$this->clave_usuario  = $arreglo['clave_usuario'];	
		$query                = $this->_enviar_parametros();
		return $query;
	}

	public function habilitar_usuario($arreglo = array()){
		$this->accion     = 'eliminar';
		$this->id_usuario = $arreglo['id_usuario'];		
		$query            = $this->_enviar_parametros();
		return $query;
	}	

	function _enviar_parametros(){  

    $procedure = $this->db
    ->query(
    	"CALL p_t_usuario (
				'".$this->accion."', #accion
				'".strtolower(utf8_encode($this->correo_usuario))."', #correo_usuario
				'".utf8_encode($this->clave_usuario)."', #clave_usuario
				'".$this->id_usuario."', #id_usuario
				'".$this->fecha_nacimiento."' #fecha_nacimiento
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