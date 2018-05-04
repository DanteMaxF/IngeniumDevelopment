<?php 
    session_start();
    require_once("util.php");
    if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
        include("partial/_navbarCoordinador.html");
         include("partial/_FullCalendar.html");
         include("partial/_scripts.html");
        include ("partial/_footer.html");
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>

<script src="js/jquery.js"></script> <!-- jQuery Version 1.11.1 -->
        <script src="js/bootstrap.min.js"></script> <!-- Bootstrap JavaScript -->
        <script src='js/moment.min.js'></script> <!-- FullCalendar 1 -->
        <script src='js/fullcalendar.min.js'></script> <!-- FullCalendar 2 -->
            <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month,basicWeek,agendaDay'
                },
                defaultDate: $('#calendar').fullCalendar('today'),
                editable: true,
                eventLimit: true,
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit').modal('show');
                    });
                },
                eventDrop: function(event, delta, revertFunc) {
                    edit(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
                    edit(event);
                },
                events: [
                <?PHP 
                    foreach($events as $event):
                    $start = explode(" ", $event['start']);
                    $end = explode(" ", $event['end']);
                    if($start[1] == '00:00:00'){
                        $start = $start[0];
                    }else{
                        $start = $event['start'];
                    }
                    if($end[1] == '00:00:00'){
                        $end = $end[0];
                    }else{
                        $end = $event['end'];
                    }
                ?>
                    {
                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $event['color']; ?>',
                    },
                <?php endforeach; ?>
                ]
            });

            function edit(event){
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if(event.end){
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                }else{
                    end = start;
                }

                id =  event.id;

                Event = [];
                Event[0] = id;
                Event[1] = start;
                Event[2] = end;

                $.ajax({
                 url: 'editEventDate.php',
                 type: "POST",
                 data: {Event:Event},
                 success: function(rep) {
                        if(rep == 'OK'){
                            alert('Cambios Guardados');
                        }else{
                            alert('No se pudieron guardar los cambios, intenta de nuevo');
                        }
                    }
                });
            }

        });
        </script>