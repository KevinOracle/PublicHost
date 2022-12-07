<?php

//clase para conectar con la base de datos
class conexion{
    const user = 'root';
    const pass = '';
    const bd = 'servidorIoT';
    const servidor = 'localhost';


    public function conectarbd(){

        //haciendo la conexion con mysql y sus clases
        $conectar = new mysqli(self::servidor,self::user,self::pass, self::bd);

        if($conectar->connect_errno)
        {
            die("error en la conexion".$conectar->connect_errno);
        }

        return $conectar;

    }
}

?>