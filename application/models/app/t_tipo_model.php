<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_tipo_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      	= $this->load->database('aplicacion', true);		
		$this->id_maestro  	= '';
		$this->nombre_tipo	= '';
		$this->id_tipo 			= '';
	} 
	
	public function insertar_participante($arreglo = array()){
		$this->accion     						= 'insertar';
		$this->nombre_participante 		= isset($arreglo['titulo_noticia']) ? $arreglo['titulo_noticia'] : 'n/a';
		$this->apellido_participante 	= isset($arreglo['descripcion_noticia']) ? $arreglo['descripcion_noticia'] : 'n/a';
		$this->cedula_participante 		= isset($arreglo['fecha_noticia']) ? $arreglo['fecha_noticia'] : 'n/a';
		$this->id_tipo_especialidad 	= isset($arreglo['id_tipo']) ? $arreglo['id_tipo'] : 2;
		$this->email_participante 		= isset($arreglo['id_usuario']) ? $arreglo['id_usuario'] : 1;
		$this->id_laboratorio 				= isset($arreglo['link_noticia']) ? $arreglo['link_noticia'] : 'n/a';
		$this->id_tipo_asistencia			= isset($arreglo['url_imagen']) ? $arreglo['url_imagen'] : 'n/a';

		$query            						= $this->_enviar_parametros();
		return $query;
	}

	public function consultar_asistencias($arreglo = array()){
		$this->accion    	 	= 'consulta_generica';
		$this->id_maestro 	= $arreglo['id_asistencia'];

		$query 							= $this->_enviar_parametros();
		return $query;
	}

	public function consultar_especialidades($arreglo = array()){
		$this->accion    	 	= 'consulta_generica';
		$this->id_maestro 	= $arreglo['id_especialidad'];

		$query 							= $this->_enviar_parametros();
		return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_tipo (
				'".$this->accion."', #accion
				'".$this->id_maestro."', #id_maestro
				'".strtolower(utf8_encode($this->nombre_tipo))."', #nombre_tipo
				'".$this->id_tipo."' #id_tipo
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