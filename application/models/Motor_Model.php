<?php
class Motor_Model extends CI_Model
{

    public function getProceso($codflujo, $codproceso)
    {

        $sql = "select * from proceso where codFlujo='$codflujo' and codproceso='$codproceso'";
        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            $data = [
                'codprocesosiguiente' => $proceso->codProcesoSiguiente,
                'archivo' => $proceso->pantalla,
                'tipo' => $proceso->tipo,
            ];
            return $data;
        } else {
            return [''];
        }
    }
    public function getProcesoAnterior($codFlujo, $codProceso)
    {
        $sql = "select * from proceso ";
        $sql .= "where codFlujo='$codFlujo' ";
        $sql .= "and codProcesoSiguiente='$codProceso'";
        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            $data = [
                'codProceso' => $proceso->codProceso,
            ];
            return $data;
        } else {
            return [''];
        }
    }
    public function getProcesoSiguiente($codFlujo, $codProcesoSiguiente)
    {
        $sql = "select * from proceso ";
        $sql .= "where codFlujo='$codFlujo' ";
        $sql .= "and codProceso='$codProcesoSiguiente'";
        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            $data = [
                'codProceso' => $proceso->codProceso,
            ];
            return $data;
        } else {
            return [''];
        }
    }
    public function getFlujo($codRol)
    {
        $sql = "select * from proceso ";
        $sql .= "where codRol='$codRol' ";

        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            $data = [
                'codFlujo' => $proceso->codFlujo,
                'codProceso' => $proceso->codProceso,
                'codprocesosiguiente' => $proceso->codProcesoSiguiente,
                'tipo' => $proceso->tipo,
                'codRol' => $proceso->codRol,
                'archivo' => $proceso->pantalla,

            ];
            return $data;
        } else {
            return [''];
        }
    }
    public function getRolSiguiente($codProcesoSiguiente)
    {
        $sql = "select * from proceso ";
        $sql .= "where codProceso='$codProcesoSiguiente' ";
        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            return $proceso->codRol;
        } else {
            return 'nada';
        }
    }
    public function getRolAnterior($codProceso)
    {
        $sql = "select * from proceso ";
        $sql .= "where codProcesoSiguiente='$codProceso' ";
        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            return $proceso->codRol;
        } else {
            return 'nada';
        }
    }
    public function getProcesoCondicion($codflujo, $codproceso)
    {
        $sql = "select * from proceso_cond where codFlujo='$codflujo' and codProceso='$codproceso'";
        $query = $this->db->query($sql);
        $proceso = $query->row();
        if (isset($proceso)) {
            $data = [
                'codProcesoSi' => $proceso->codProcesoSi,
                'codProcesoNo' => $proceso->codProcesoNo

            ];
            return $data;
        } else {
            return [''];
        }
    }
}
