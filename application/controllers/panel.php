<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->id_aplicacion 	= $this->session->userdata('id_aplicacion');
		$this->id_grupo 			= $this->session->userdata('id_grupo');
		$this->id_usuario			= $this->session->userdata('id_usuario');
		$this->menu 	        = $this->permisologia_model->getMenu($this->id_aplicacion, $this->id_grupo, $this->id_usuario);
		$this->layout->setLayout('keypanel');							
	}

	function index(){
		$this->layout->setTitle('.: Keypanel :.');		
		$menu         = $this->menu;;			
		$this->layout->view('index',compact('menu')); 
	}
}
