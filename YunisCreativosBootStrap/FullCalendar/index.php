

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Calendario</title>

        <!-- Estilos de Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos de FullCalendar -->
        <link href='css/fullcalendar.css' rel='stylesheet' />
        
        <!-- Estilos Personalizados -->
        <style>
        body {
            padding-top: 70px;
            /* Se usa para el .navbar-fixed-top. Se puede quitar si usamos .navbar-static-top. Cambia si el alto de la navegación cambia */
        }
        #calendar {
            max-width: 1000px;
        }
        .col-centered{
            float: none;
            margin: 0 auto;
        }
        </style>
    </head>
    
    <body>


        <!-- Contenido de la página -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- Título Principal -->
                    <h1>Calendario</h1>
                    <p class="lead">Consulta tus actividades del evento</p>
                    <!-- Aquí se añade el calendario -->        
                    <div id="calendar" class="col-centered">
                    </div>
                </div>
            </div>

            <!-- Creación de Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Inicio del formulario -->
                        <form class="form-horizontal" method="POST" action="FullCalendar/addEvent.php">
                        <!-- Título del modal -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Añade una actividad</h4>
                        </div>
                        <!-- Contenido del modal -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Titulo</label> <!-- Primera Opción (Título del evento)-->
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo aquí">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Status de actividad</label> <!-- Segunda Opción (Color del evento) -->
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Elije uno</option>
                                        <option style="color:#008000;" value="#008000">&#9724; Activo</option>
                                        <option style="color:#FFD700;" value="#FFD700">&#9724; Preparandose</option>
                                        <option style="color:#FF0000;" value="#FF0000">&#9724; Finalizado</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start" class="col-sm-2 control-label">Inicia</label> <!-- Tercera Opción (Fecha de Inicio) No modificable -->
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end" class="col-sm-2 control-label">Termina</label> <!-- Cuarta Opción (Fecha de Fin) No modificable -->
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> <!-- Botón para cerrar modal -->
                            <button type="submit" class="btn btn-primary">Guardar los cambios</button> <!-- Botón para guardar datos del evento -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Modal (Para cuando se edita) -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="editEventTitle.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Actividad</h4>
                        </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Titulo</label> <!-- Primera Opción (Título del evento)-->
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Titulo aquí">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Color</label> <!-- Segunda Opción (Color del evento) -->
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
                                    <option value="">Elije uno</option>
                                    <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
                                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label class="text-danger"><input type="checkbox"  name="delete">Borrar evento</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" class="form-control" id="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> <!-- Botón para cerrar modal -->
                        <button type="submit" class="btn btn-primary">Guardar los cambios</button> <!-- Botón para guardar datos del evento -->
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
     
    
    </body>
</html>
