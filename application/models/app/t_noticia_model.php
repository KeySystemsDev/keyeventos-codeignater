<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_noticia_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db_app      					= $this->load->database('aplicacion', true);		
		$this->id_noticia  					= '';
		$this->titulo_noticia 			= '';
		$this->descripcion_noticia 	= '';
		$this->fecha_noticia  			= '';
		$this->id_tipo  						= '';
		$this->id_usuario						= '';
		$this->link_noticia  				= '';
		$this->url_imagen  					= '';
	} 
	
	public function insertar_noticia($arreglo = array()){
		$this->accion     					= 'insertar';
		$this->titulo_noticia 			= isset($arreglo['titulo_noticia']) ? $arreglo['titulo_noticia'] : 'n/a';
		$this->descripcion_noticia 	= isset($arreglo['descripcion_noticia']) ? $arreglo['descripcion_noticia'] : 'n/a';
		$this->fecha_noticia 				= isset($arreglo['fecha_noticia']) ? $arreglo['fecha_noticia'] : 'n/a';
		$this->id_tipo 							= isset($arreglo['id_tipo']) ? $arreglo['id_tipo'] : 2;
		$this->id_usuario 					= isset($arreglo['id_usuario']) ? $arreglo['id_usuario'] : 1;
		$this->link_noticia 				= isset($arreglo['link_noticia']) ? $arreglo['link_noticia'] : 'n/a';
		$this->url_imagen						= isset($arreglo['url_imagen']) ? $arreglo['url_imagen'] : 'n/a';

		$query            					= $this->_enviar_parametros();
		return $query;
	}

	public function editar_noticia($arreglo = array()){
		$this->accion     					= 'editar';
		$this->id_noticia 					= $arreglo['id_noticia'];
		$this->descripcion_noticia 	= $arreglo['descripcion_noticia'];
		$this->link_noticia 				= $arreglo['link_noticia'];
		$this->titulo_noticia 			= $arreglo['titulo_noticia'];
		$this->url_imagen 					= isset($arreglo['url_imagen']) ? $arreglo['url_imagen'] : 'n/a';

		$query            					= $this->_enviar_parametros();
		return $query;
	}

	public function consultar(){
		$this->accion    	 	= 'consulta';

		$query 							= $this->_enviar_parametros();
		return $query;
	}

	public function paginacion($pagina, $por_pagina, $hacer){
    switch ($hacer) {
      case 'limit':
        $query = $this->db_app
							        ->select("*")
							        ->from("t_noticia")
							        ->order_by("id_noticia","asc")
							        ->limit($por_pagina, $pagina)
							        ->get();
						        	return $query->result();
      break;
      case 'cuantos':
        $query = $this->db_app
							        ->select("*")
							        ->from("t_noticia")
							        ->order_by("id_noticia","desc")
							        ->count_all_results();
						        	return $query;
      break;            
    }	
	}	



	public function consultar_noticia($arreglo = array()){
		$this->accion    	 	= 'consulta_noticia';
		$this->id_noticia 	= $arreglo['id_noticia'];

		$query 							= $this->_enviar_parametros();
		return $query;
	}

	public function eliminar_noticia($arreglo = array()){
		$this->accion     	= 'eliminar';
		$this->id_noticia 	= $arreglo['id_noticia'];

		$query            	= $this->_enviar_parametros();
		return $query;
	}

	function _enviar_parametros(){  
    $procedure = $this->db_app
    ->query(
    	"CALL p_t_noticia (
				'".$this->accion."', #accion
				'".$this->id_noticia."', #id_noticia
				'".strtolower(utf8_encode($this->titulo_noticia))."', #titulo_noticia
				'".strtolower(utf8_encode($this->descripcion_noticia))."', #descripcion_noticia
				'".date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $this->fecha_noticia)))."', #fecha_noticia
				'".$this->id_tipo."', #id_tipo
				'".$this->id_usuario."', #id_usuario
				'".strtolower(utf8_encode($this->link_noticia))."', #link_noticia
				'".strtolower(utf8_encode($this->url_imagen))."' #url_imagen
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