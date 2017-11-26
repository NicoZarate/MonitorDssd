<?php

namespace Monitor;

require '../includes/config.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include 'layout/defaultHead.php'; ?>

    </head>

    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <?php include 'layout/navbar.php'; ?>

            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Indicadores</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php print_r(Indicador::getPremedioPresupuestosAceptados()); ?>%
                                        </div>
                                        <div>Promedio de presupuestos aceptados</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-trophy fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php print_r(Indicador::getRevisorQueMasTareasRealizo()); ?>
                                        </div>
                                        <div>Revisor que más tareas realizó</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lista de incidencias rechazadas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

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
            </div>
            <!-- /#wrapper -->
            <?php include 'layout/defaultFooter.php'; ?>

    </body>

    </html>