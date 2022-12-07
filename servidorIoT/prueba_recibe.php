<?php

//incluir la conexion de la base de datos
require_once('conexion.php');

//variables recibidas
$device = $_GET['device_label'];
$temperatura = $_GET['input_temperatura'];
$humedad = $_GET['input_humedad'];

//se esta creando un objeto de la clase conexion.
$conn = new conexion();



//--------------------------------------VERIFICA SI EXISTE-------------------------------------

//los valores son los que ya recuperamos.
$query = "SELECT * FROM device_state WHERE ID_device = '$device'";
//select a la base de datos.
$select = mysqli_query($conn->conectarbd(), $query);

//cuantas filas nos ha devuelto la consulta, si hay cero filas no existe 
if ($select->num_rows) {



    //-----------------------------------------------INSERT----------------------------------------------------------------

    //VA E INSERTA A LA TABLA DEL HISTORICO DEL USUARIO 
    $query = "INSERT INTO device_historic (ID_device,variable, valor, fecha) VALUES ('$device','temperatura','$temperatura',NOW())";
    //insercion a la base de datos.
    $insert = mysqli_query($conn->conectarbd(), $query);

    //los valores son los que ya recuperamos.
    $query = "INSERT INTO device_historic (ID_device,variable, valor, fecha) VALUES ('$device','humedad','$humedad',NOW())";
    //insercion a la base de datos.
    $insert = mysqli_query($conn->conectarbd(), $query);




    //---------------------------------------------UPDATE------------------------------------------------------------------

    //VA Y ACTUALIZA AL USUARIO LOS NUEVOS VALORES DE SUS CAMPOS.
    $query = "UPDATE device_state SET db_temp = $temperatura, db_humedad=$humedad where ID_device = '$device'";
    //actualizacion a la base de datos.
    $uptade = mysqli_query($conn->conectarbd(), $query);




    echo "DATOS REGISTRADOS ";

    //ESTO ES LO QUE REGRESA DEL SERVIDOR 
    echo "datos ingresados: <br>";
    echo "{Device: " . $device . ", Temperatura: " . $temperatura . ", Humedad" . $humedad;



} else {
    //el ID no existe

    echo "la tarjeta no existe ";

}
?>
