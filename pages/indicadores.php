<?php

namespace Monitor;

require '../includes/config.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>



        <h1>Indicadores</h1>
         Este es el promedio: <?php print_r(Indicador::getPremedioPresupuestosAceptados()); 
                          ?> %
   

        <br/>3er indicador lista de incidencias rechazadas y su usuario
         <table class="table table-bordered" width="100%" id="tablaProcesos" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Nro Legajo</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>D.N.I</th> 
                                    
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    
                                    <th>Cantidad de Objetos</th>
                                    <th>Descripci&oacute;n</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $procesos = Indicador::getExpedientesRechazados();

                                foreach ($procesos as $proceso){
                                    echo '<tr>';
                                    echo '<td>'. $proceso['user_id'] . '</td>';
                                    echo '<td>'. $proceso['name'] . '</td>';
                                    echo '<td>'. $proceso['lastname'] . '</td>';
                                    echo '<td>'. $proceso['dni'] . '</td>';
                                    echo '<td>'. $proceso['fecha']. '</td>';
                                    echo '<td>'. $proceso['tipo']. '</td>';
                                    echo '<td>'. $proceso['cantidad'] . '</td>';
                                    echo '<td>'. $proceso['descripcion']. '</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>


