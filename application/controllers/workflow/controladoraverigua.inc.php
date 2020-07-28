<?php

$ci = $_GET["ci"];
$nombres = $_GET["nombre"];
$apellidos = $_GET["apellido"];
$DB2 = $this->load->database('academico', TRUE);

$data = [
    'ci' => $ci,
    'nombres' => $nombres,
    'apellidos' => $apellidos,

];


$DB2->insert('inscripcion', $data);
$insert_id = $DB2->insert_id();
$this->session->set_userdata('id', $insert_id);
