<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->layout->setLayout('sesion');		
	}

	function index(){
		$this->layout->setTitle('Inicio Sesión');
		$contenido['error'] = '';			
		$this->layout->view('sesion', $contenido);
	}

	function registrarse(){
		$this->layout->setTitle('Nuevo Usuario');				
		$contenido['error'] = '';	
		$this->layout->view('registrarse', $contenido);
	}	

	function registrar_usuario(){
		$this->layout->setTitle('Nuevo Usuario');				
		$arreglo  	= array(
			'correo_usuario' => $this->input->post('i_usuario'),
			'clave_usuario'	 => $this->input->post('i_password')
		);
		$this->t_usuario_model->insertar_usuario($arreglo);
			$arreglo = $this->permisologia_model->getUsuario($this->input->post('i_usuario'), $this->input->post('i_password'));

		foreach ($arreglo as $key) {
			$this->session->set_userdata('usuario', $key->correo_usuario);
			$this->session->set_userdata('id_usuario', $key->id_usuario);
			$this->session->set_userdata('id_aplicacion', $key->id_aplicacion);
			$this->session->set_userdata('id_grupo', $key->id_grupo);			
		}

		$this->session->userdata('usuario');
		$this->session->userdata('id_usuario');
		$this->session->userdata('id_aplicacion');
		$this->session->userdata('id_grupo');	
		
		$sesion = $this->session->userdata('usuario');

		if (empty($sesion)){
			$error = '<div class="alert alert-danger"><strong>Verifique, Usuario y Contraseña.</strong></div>';
			$this->layout->view('sesion', compact('error'));
		}else{
			redirect(base_url().'panel/', 'refresh');	
		}	
	}	
	
	function conectar(){		
		$this->load->helper('array');
		$this->load->library('encrypt');
		$usuario = $this->input->post('i_usuario');
		$pass = $this->input->post('i_password');

		//$encriptado_key = $this->encrypt->encode($pass);
		//$desencriptado_key = $this->encrypt->decode($encriptado_key);
		$arreglo = $this->permisologia_model->getUsuario($usuario, $pass);

		foreach ($arreglo as $key) {
			$this->session->set_userdata('usuario', $key->correo_usuario);
			$this->session->set_userdata('id_usuario', $key->id_usuario);
			$this->session->set_userdata('id_aplicacion', $key->id_aplicacion);
			$this->session->set_userdata('id_grupo', $key->id_grupo);			
		}

		$this->session->userdata('usuario');
		$this->session->userdata('id_usuario');
		$this->session->userdata('id_aplicacion');
		$this->session->userdata('id_grupo');	
		
		$sesion = $this->session->userdata('usuario');

		if (empty($sesion)){
			$error = '<div class="alert alert-danger"><strong>Verifique, Usuario y Contraseña.</strong></div>';
			$this->layout->view('sesion', compact('error'));
		}else{
			redirect(base_url().'panel/', 'refresh');	
		}

	}

	function desconectar(){			
		if (empty($sesion)){
			$this->session->sess_destroy();
			redirect(base_url().'sesion/');	
		}else{
			redirect(base_url(), 301);	
		}
	}

	function registrar(){
	  if ($this->input->post()){        
      $error = null;
			$config['upload_path'] 		= './uploads/archivos/';
			$config['allowed_types'] 	= 'jpg|jpeg';
			$config['max_size']				= '51200'; 
			$config["overwrite"] 			= false;
			$config['encrypt_name'] 	= true; 
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('archivo')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('ControllerMessage', $error["error"]);
			}

			if($error == null){
			  $ima 				= $this->upload->data();
			  $file_name 	= $ima['file_name'];
			}

			if(!$error == null){
			 echo $error["error"];
			 // echo $this->session->flashdata('ControllerMessage');
			}else{
			  echo "file :".$file_name;
			}
			exit;
   	}
  }
}
