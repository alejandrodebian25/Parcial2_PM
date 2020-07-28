<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
    }
    public function index()
    {
        $this->load->view('workflow/header.view.php');
        $this->load->view('workflow/login/login.view.php');
        $this->load->view('workflow/footer.view.php');
        // echo "login";
    }
    public function validar()
    {
        		// recibiendo los datos por POST y verifinaco la existencia
		if (isset($_POST['ci']) && isset($_POST['clave'])) {
			// TODO: realizar las validaciones de los inputs si estan vacios 
			// se recibeindo en variables
			$ci = $this->input->post('ci');
			$clave = $this->input->post('clave');
			//verificando desde el modelo si ci y clave estan en bd
			if($this->login_model->verificar_ci_clave($ci,$clave)){
				// print_r(" si user");
				$data=$this->login_model->getUsuario($ci);
				$this->session->set_userdata('ci',$data['ci']);
				$this->session->set_userdata('codRol',$data['codRol']);
				redirect(base_url('motor'));
			}else{
				$this->session->set_flashdata('mensaje', 'Usuario o clave no validos');
				redirect(base_url('login'));
			};
		  }
		else{
			redirect(base_url('login'));
		}
    }
}
