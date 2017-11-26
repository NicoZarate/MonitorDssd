<?php

namespace Monitor;
use \PDO;

class Indicador{

    function conexion(){
        return new PDO('mysql:dbname=dssd;host=localhost','dssd','dssd');
       
    }

    public static function getPremedioPresupuestosAceptados(){
        $database= new PDO('mysql:dbname=dssd;host=localhost','dssd','dssd');
        $query = $database -> prepare('SELECT count(id) as cant FROM incidents WHERE estado = "Presupuesto aceptado"
                                        ');
        $query -> execute();
        $aux = $query -> fetch();
        $query = $database -> prepare('SELECT count(id) as cant FROM incidents
                                        ');
        $query -> execute();
        $aux2 = $query -> fetch();

        $promedio = ($aux['cant'] /$aux2['cant'] ) * 100 ;

        unset($database);

        return round($promedio,2) ;

    }
    public static function getExpediantesRechazados(){
        $database= new PDO('mysql:dbname=dssd;host=localhost','dssd','dssd');
        $query = $database -> prepare('SELECT user_id,name,lastname,dni,fecha,tipo,cantidad,descripcion  FROM incidents as i inner join users as u on i.user_id=u.id WHERE estado = "Rechazado"
                                        ');
        $query -> execute();
        $aux = $query -> fetchall();
      

       

        unset($database);

        return $aux ;

    }
    
}