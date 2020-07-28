<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imagen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $this->load->view('imagen/imagen.view.php');
    }
}
