<?php
class Login_Model extends CI_Model
{

    function verificar_ci_clave($ci, $clave)
    {
        $DB2 = $this->load->database('academico', TRUE);
        $sql = "select * from usuario WHERE ci='" . $ci . "' and clave='" . $clave . "'";
        $usuario = $DB2->query($sql)->result();
        if (!empty($usuario))
            return true;
        else
            return false;
    }
    function getUsuario($ci)
    {
        $DB2 = $this->load->database('academico', TRUE);
        $sql = "select * from usuario WHERE ci='$ci'";
        $usuario = $DB2->query($sql)->row();
        if (isset($usuario)) {

            $data = [
                'ci' => $usuario->ci,
                'codRol' => $usuario->codRol
            ];
            return $data;
        } else {
            return $usuario;
        }
    }
}
