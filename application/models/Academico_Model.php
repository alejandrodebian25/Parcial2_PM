<?php
class Academico_Model extends CI_Model
{

    public function getInscripcion()
    {

        $DB2 = $this->load->database('academico', TRUE);

        $sql = "SELECT  * FROM inscripcion ORDER BY id DESC LIMIT 1";
        $query = $DB2->query($sql);
        $inscripcion = $query->row();
        if (isset($inscripcion)) {
            $data = [
                'ci' => $inscripcion->ci,
                'nombres' => $inscripcion->nombres,
                'apellidos' => $inscripcion->apellidos,
                'cedula' => $inscripcion->cedula,
                'matricula' => $inscripcion->matricula,
                'pago' => $inscripcion->pago,
                'fecha' => $inscripcion->fecha,
            ];
            return $data;
        } else {
            return [''];
        }
    }
}
