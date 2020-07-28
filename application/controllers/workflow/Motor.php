<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Motor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//ruta protegida
		if (!$this->session->userdata('ci'))
			redirect(base_url('login'));

		$this->load->model('motor_model');
		$this->load->model('academico_model');
	}
	public function index()
	{
		// Si el usuario ingresa por primera vez ,buscamos su flujo segun su rol
		if (isset($_GET["codflujo"])) {

			$codFlujo = $this->input->get('codflujo', TRUE);
			$codProceso = $this->input->get('codproceso', TRUE);
			$data = $this->motor_model->getProceso($codFlujo, $codProceso);
			$data['codFlujo'] = $codFlujo;
			$data['codProceso'] = $codProceso;
			$data['ci'] = $this->session->ci;
			$data['codRol'] = $this->session->codRol;
			$rolSig = $this->motor_model->getRolSiguiente($data['codprocesosiguiente']);
			$rolAnt = $this->motor_model->getRolAnterior($codProceso);
			$data['codRolSig'] = $rolSig;
			$data['codRolAnt'] = $rolAnt;
			$datos=[];
			if ($this->session->codRol=="K") {
				$datos = $this->academico_model->getInscripcion();
			}
		
			$this->load->view('workflow/header.view.php',$datos);
			$this->load->view('workflow/motor.view.php', $data);
			$this->load->view('workflow/footer.view.php');
		} else {
			// echo "no";

			$data = $this->motor_model->getFlujo($this->session->codRol);
			$archivoEnvia = "motor?codflujo=" . $data['codFlujo'] . "&codproceso=" . $data['codProceso'];
			redirect(base_url($archivoEnvia));
		}
	}
	public function controlador()
	{

		$codFlujo = $this->input->get("codflujo");
		$codProceso = $this->input->get("codproceso");
		$codProcesoSiguiente = $this->input->get("codprocesosiguiente");
		$archivo = $this->input->get("archivo");
		$tipo = $this->input->get("tipo");


		if ($tipo == "C") {

			// guardamos en session el proceso anterior 
			$this->session->set_userdata('proAnt', $codProceso);
			if (isset($_GET["Anterior"])) {
				$data = $this->motor_model->getProcesoAnterior($codFlujo, $codProceso);
			}
			if (isset($_GET["Siguiente"])) {
				// if()
				$condicion = $this->input->get("condicion");
				$datacond = $this->motor_model->getProcesoCondicion($codFlujo, $codProceso);
		
				if ($condicion == 'si') {
					$data = [
						'codProceso' => $datacond['codProcesoSi']
					];
				} else {
					$data = [
						'codProceso' => $datacond['codProcesoNo']
					];
				}
			}
			$codprocesoEnvia = $data['codProceso'];
			echo $codprocesoEnvia;
			$archivoEnvia = "motor?codflujo=" . $codFlujo . "&codproceso=" . $codprocesoEnvia;
			redirect(base_url($archivoEnvia));
		} else {
			if (isset($_GET["Anterior"])) {
				// verificamos si existe algo en la session proAnt a causa de un proceso condicional
				if ($this->session->proAnt == "") {
					$data = $this->motor_model->getProcesoAnterior($codFlujo, $codProceso);
				} else {
					$data['codProceso'] = $this->session->proAnt;
					$this->session->set_userdata('proAnt', "");
				}
			}
			if (isset($_GET["Siguiente"])) {
				if (isset($archivo)) {
					include_once("controlador" . $archivo);
				}


				$data = $this->motor_model->getProcesoSiguiente($codFlujo, $codProcesoSiguiente);
			}
			$codprocesoEnvia = $data['codProceso'];
			echo $codprocesoEnvia;
			$archivoEnvia = "motor?codflujo=" . $codFlujo . "&codproceso=" . $codprocesoEnvia;
			redirect(base_url($archivoEnvia));
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
