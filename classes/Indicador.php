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
    public static function getExpedientesRechazados(){
        $database= new PDO('mysql:dbname=dssd;host=localhost','dssd','dssd');
        $query = $database -> prepare('SELECT user_id,name,lastname,dni,fecha,tipo,cantidad,descripcion  FROM incidents as i inner join users as u on i.user_id=u.id WHERE estado = "Rechazado"
                                        ');
        $query -> execute();
        $aux = $query -> fetchall();
      

       

        unset($database);

        return $aux ;

    }

    public static function getRevisorQueMasTareasRealizo(){
        $response = Task::getArchivedTasks();
        if ($response['success']) {
            $tasks = $response['data'];
            $arreglo=[];
            foreach ($tasks as $task) {
                if($task->type=="USER_TASK" && $task->name=="Revisar Presupuesto"){
                    
                   array_push($arreglo, $task->assigned_id);


                }
              
            }
               $arregloDeId= array_count_values($arreglo);
               krsort($arregloDeId);
               $id=key($arregloDeId);
               $userName=""; 
               if(isset($id)){
                   $userName=Users::getUserUsername($id);
               }
               return $userName;                 
        }


    }
    
}