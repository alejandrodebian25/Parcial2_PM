<?php
if (empty($_GET["ce"])) {
    $ce = "no";
} else {
    $ce = $_GET["ce"];
}

if (empty($_GET["ma"])) {
    $ma = "no";
} else {
    $ma = $_GET["ma"];
}
if (empty($_GET["pa"])) {
    $pa = "no";
} else {
    $pa = $_GET["pa"];
}

$DB2 = $this->load->database('academico', TRUE);
$id = $this->session->id;
$sql = "UPDATE inscripcion SET cedula='$ce', matricula='$ma', pago='$pa' WHERE id=$id";
$q = $DB2->query($sql);
echo $q;
 


// $data = array(
//     'cedula' => $doc1,
//     'matricula'  => $doc2,
//     'pago'  => $doc3
// );

// $DB2->where('id',  $this->session->id);
// $DB2->update('inscripcion', $data);


// UPDATE table_name
// SET column1=value, column2=value2,...
// WHERE some_column=some_value 



// $DB2 = $this->load->database('academico', TRUE);

// $sql = "INSERT INTO inscripcion (ci, nombres, apellidos) ";
// $sql.= "VALUES ('$ci', '$nombres', '$apellidos'); ";
// $DB2->query($sql);
