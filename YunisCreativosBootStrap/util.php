<?php

//CONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function connectDB(){
    $developerMode = false; //Cambiar a true solo cuando se vaya a pasar al entorno de produccion
    
    if ($developerMode){
        $mysql = mysqli_connect("localhost","cpses_hg3QUkUOVU@localhost","Mandala11:11","YunisCreativos");
    }else{
         $mysql = mysqli_connect("localhost","root","","YunisCreativos");
    }
    $mysql->set_charset("utf8");
    return $mysql;
    
}  



//DESCONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function disconnectDB($mysql){
  mysqli_close($mysql);
}

//FUNCION PARA VERIFICAR EL LOGIN
function login($mail, $passwd) {
  $db = connectDB();
  if ($db != NULL) {

    $query='SELECT correo FROM Usuario WHERE correo="'.$mail.
        '" AND passwd="'.$passwd.'"';
    
    //Pa' debugear
    //var_dump($query); 
    //die('');
    $results = $db->query($query);

    if (mysqli_num_rows($results) > 0)  {
        mysqli_free_result($results);
        disconnectDB($db);
        return true;
    }
    return false;
  }
  return false;
}

function getUserId($mail) {
    $db = connectDB();
    if ($db != NULL) {
        
        $query='SELECT idUsuario FROM Usuario WHERE correo="'.$mail.'"';
        
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
        if (mysqli_num_rows($results) > 0) {
            if($row = mysqli_fetch_assoc($results)) {
                $res = "".$row["idUsuario"]."";
            }else{
                $res = "-1";
            }
        }
        mysqli_free_result($results);
    }
    return $res;

}

//DEVUELVE EL ID DEL ROL DEL USUARIO EN UN ENTERO
function getRol($idUser) {
    $db = connectDB();
    if ($db != NULL) {
        
        $query= 'SELECT R.idRol FROM Rol R, tiene T, Usuario U WHERE R.idRol=T.idRol AND U.idUsuario=T.idUsuario AND U.idUsuario='.$idUser;
        
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
        if (mysqli_num_rows($results) > 0) {
            if ($row = mysqli_fetch_assoc($results)){
                $res = $row["idRol"];
            }else{
                $res = "-1";
            }
        }
        mysqli_free_result($results);
    }
    return $res;
}

function getEventosDescripcion(){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT * FROM Evento WHERE Ver="1"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value='.$row["idEvento"].'>';
                echo $row["descripcionEvento"];
                echo "</option>";
            }
        }
    }
}

function getInfoGeneralEvento($idEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT E.nombreEvento, E.descripcionEvento, E.statusEvento,En.califPromedio, Cl.nombreUsuario AS  "Cliente", Co.nombreUsuario AS  "Coordinador" FROM Evento E, Encuesta En, Usuario Cl, Usuario Co WHERE E.idEncuesta = En.idEncuesta AND E.idCliente = Cl.idUsuario AND E.idCoordinador = Co.idUsuario AND idEvento =  "'.$idEvento.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)){
                 echo '<tr>';
                 echo '<th scope="row">'.$row["nombreEvento"].'</th>';
                 echo '<th>'.$row["descripcionEvento"].'</th>';
                 echo '<th>'.$row["statusEvento"].'</th>';
                 echo '<th>'.$row["califPromedio"].'</th>';
                 echo '<th>'.$row["Cliente"].'</th>';
                 echo '<th>'.$row["Coordinador"].'</th>';

            }
        }
    }
}

function getStaffEvento($idEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT U.nombreUsuario, U.correo, U.idUsuario FROM Evento E, staffEvento S, Usuario U WHERE E.idEvento=S.idEvento AND S.idStaff=U.idUsuario AND E.idEvento="'.$idEvento.'" AND U.Ver=1 ORDER BY U.nombreUsuario';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td></tr>';
        } 
        if(mysqli_num_rows($results) > 0) {
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Eliminar</button></td>';
                 generateModalDesasignarStaff($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
             } 
        }
    }
}

function generateModalDesasignarStaff($id,$nombre) {
    echo '<div class="modal fade" id="myModal'.$id.'" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres desasignar a <strong>'.$nombre.'</strong>?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="desasignar_staff.php?idStaff='.$id.'">Borrar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>';
}



function desasignarStaff($idEvento,$idStaff){
  $db = connectDB();
        if ($db != NULL) {

            // insert command specification
            $query = 'DELETE FROM staffEvento WHERE idEvento IN (SELECT idEvento FROM Evento WHERE idEvento=?) AND idStaff=?';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ii", $idEvento, $idStaff)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
}


function getDescripcionEvento($idEvento){
    $db = connectDB();
 
    if ($db != NULL) {
        $query='SELECT descripcionEvento FROM Evento WHERE idEvento="'.$idEvento.'"';
      
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
        if (mysqli_num_rows($results) > 0) {
            if($row = mysqli_fetch_assoc($results)) {
                $res = "".$row["descripcionEvento"]."";
            }else{
                $res = "-1";
            }
        }
        mysqli_free_result($results);
    }
    return $res;
}

function ModalEliminarEvento($descripcionEvento,$idEvento){
    echo '<div class="modal fade" id="myModalEliminar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres eliminar el evento <strong>'.$descripcionEvento.'</strong>?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="Eliminar_evento.php?idEvento='.$idEvento.'">Eliminar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>';
}

function EliminarEvento($idEvento){

     $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='UPDATE Evento SET Ver=0 WHERE idEvento=?';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("i", $idEvento)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
     }

//FUNCION PARA REGISTRAR ACTIVIDAD
function registraActividad($idActividad, $Descripcion, $fechaInicio, $fehcaFin, $statusActividad, $idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'INSERT INTO Actividad(idActividad,Descripcion,fechaInicio,fehcaFin,statusActividad,idEvento) VALUES(?,?,?,?,?,?)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ss", $nombre, $imagen)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
    
    
        mysqli_free_result($results);
        disconnect($db);
        return true;
    } 
    return false;
}

//FUNCION PARA VERIFICAR EL CÓDIGO
function codigoEvento($codigo) {
  $db = connectDB();
  if ($db != NULL) {

    $query='SELECT codigo FROM Evento WHERE codigo ="'.$codigo.'"';
    
    //Pa' debugear
    //var_dump($query); 
    //die('');
    $results = $db->query($query);

    if (mysqli_num_rows($results) > 0)  {
        mysqli_free_result($results);
        disconnectDB($db);
        return true;
    }
    return false;
  }
  return false;
}

//FUNCION PARA OBTENER NOMBRE Y DESCRIPCION DEL EVENTO
function getNombreEvento($codigo){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT nombreEvento, descripcionEvento from Evento WHERE codigo ="'.$codigo.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreEvento"].'</td>';
                 echo '<td>: </td>';
                 echo '<td>'.$row["descripcionEvento"].'</td>';
                 echo '</tr>';
            }
        }
    }
}

function getStaffList($idEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT * FROM Usuario U, tiene T WHERE U.idUsuario=T.idUsuario AND T.idRol=1494 AND T.idUsuario NOT IN (SELECT U.idUsuario FROM Evento E, staffEvento S, Usuario U WHERE E.idEvento=S.idEvento AND S.idStaff=U.idUsuario AND E.idEvento="'.$idEvento.'") GROUP BY U.nombreUsuario';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value='.$row["idUsuario"].'>';
                echo $row["nombreUsuario"];
                echo "</option>";
            }
        }
    }
}


function getIdByNombreUsuario($nombre) {
    $db = connectDB();
    $query = 'SELECT idUsuario FROM Usuario WHERE nombreUsuario="'.$nombre.'"';
    //Pa' debugear
    //var_dump($query); 
    //die('');
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    if(mysqli_num_rows($results) > 0){
        while ($row = mysqli_fetch_assoc($results)) {
            return "".$row["idUsuario"]."";
        }
    }
}

function asignarStaff($idEvento,$idStaff){
    $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='INSERT INTO  staffEvento(idEvento,idStaff,fechaUsuarioEvento) VALUES(?,?,CURRENT_TIMESTAMP)';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ii", $idEvento,$idStaff)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
}




//registrarInvitado($idInvitado,$correo,$fechaNacimiento,$talla,$idEstado);
//FUNCION PARA REGISTRAR INVITADO
function registrarInvitado($idInvitado,$fechaNacimiento, $talla, $idEstado, $idIdioma){
    $db = connectDB();
    if($db != NULL){
     $query = 'INSERT INTO Invitado(idInvitado,fechaNacimiento,talla,idEstado,idIdioma) VALUES(?,?,?,?,?)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 

        if (!$statement->bind_param("issii",$idInvitado, $fechaNacimiento, $talla, $idEstado,$idIdioma)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        disconnectDB($db);
        return true;
    } 
    return false;
}
//registrarUsuario($_POST["nombreUsuario,passwd,correo,telefono"]);
//FUNCION PARA REGISTRAR USUARIO
function registrarUsuario($nombreUsuario,$passwd,$correo,$telefono){
    $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'INSERT INTO Usuario(nombreUsuario,passwd,correo,telefono,Ver) VALUES(?,?,?,?,1)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("sssi", $nombreUsuario, $passwd, $correo, $telefono)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        disconnectDB($db);
        return true;
    } 
    return false;
    
}

function getIDUserByMail($correo){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idUsuario from Usuario WHERE correo ="'.$correo.'"';
        //Pa' debugear
        //var_dump($query); 
       // die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return "".$row["idUsuario"]."";
            }
        
        }
    }
    
}

function getEstado(){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Estado';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<option value='.$row["idEstado"].'>'.$row["nombreEstado"].'</option>';
            }
        }
    }
}

function getAlergias(){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT descripcion from Alergia';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                echo '<option>'.$row["descripcion"].'</option>';
             }
        }
    }
}


/*
SELECT nombreInvitado 
FROM Usuario, invitadoEvento, Evento
WHERE Usuario.idUsuario = invitadoEvento.idUsuario AND Evento.idEvento = invitadoEvento.idEvento
	AND Evento.nombreEvento LIKE "%Lima 2017%"
*/

function getUsuarios($rol,$descripcionEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT nombreUsuario, correo, telefono FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol AND e.descripcionEvento = "'.$descripcionEvento.'" AND r.nombreRol = "'.$rol.'"';
        $results = mysqli_query($db,$query);
         //Pa' debugear
    //var_dump($query); 
     // die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td>'.$row["telefono"].'</td>';
                 echo '</tr>';
            }
        }
    }
}


function registrarPlantillas($nombrePlantilla,$colorTexto,$colorFondo,$colorBotones,$imagenFondo){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'INSERT INTO Plantilla(nombrePlantilla,colorTexto,colorFondo,colorBotones,imagenFondo) VALUES(?,?,?,?,?)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("sssss", $nombrePlantilla,$colorTexto,$colorFondo,$colorBotones,$imagenFondo)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        disconnectDB($db);
        return true;
    } 
    return false;
}
 
 
function registrarRol($idUsuario,$idRol){
    $db = connectDB();
    if($db != NULL){
         $query = 'INSERT INTO tiene(idUsuario,idRol) VALUES(?,?)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ii", $idUsuario, $idRol)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        disconnectDB($db);
        return true;
    } 
    return false;
}


function registrarUsuarioEvento($idEvento,$idUsuario){
    $db = connectDB();
    if($db != NULL){
         $query = 'INSERT INTO invitadoEvento(idEvento,idInvitado) VALUES(?,?)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ii", $idEvento, $idUsuario)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        disconnectDB($db);
        return true;
    } 
    return false;
}

function getIdEventoByCodigo($codigo){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idEvento from Evento WHERE codigo ="'.$codigo.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idEvento"];
            }
        }
    }
}

function printIdEventoForm($codigo){
    echo '<br><input type="hidden" name="idEvento" value="'.getIdEventoByCodigo($codigo).'">';
}


function getRollList($id = -1){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Rol WHERE idRol !=1495';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<option value="'.$row["idRol"].'"';
                 if ($row["idRol"] == $id) {
                     echo " selected";
                 }
                 echo '>'.$row["nombreRol"].'</option>';
            }
        }
    }
}
    
function getStaff($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT* FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i 
        WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol 
        AND e.idEvento = "'.$idEvento.'" AND r.nombreRol = "Staff" AND u.Ver=1 
        GROUP BY nombreUsuario
        ORDER BY nombreUsuario';
        $results = mysqli_query($db,$query);
         //Pa' debugear
    //var_dump($query); 
     // die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td>'.$row["telefono"].'</td>';
                 echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#modalModificarStaff'.$row["idUsuario"].'">Modificar</button></td>';
                 modalModificarStaff($row["idUsuario"],$row["nombreUsuario"],$row["correo"],$row["telefono"] );
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarStaff'.$row["idUsuario"].'">Eliminar</button></td>';
                 modalEliminarStaff($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}
function getInvitados($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT *
        FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i, usuarioAlergia ua, Alergia a  
        WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol AND ua.idUsuario = u.idUsuario AND a.idAlergia = ua.idAlergia
        AND e.idEvento = "'.$idEvento.'" AND r.nombreRol = "Invitado" AND u.Ver=1
        GROUP BY nombreUsuario
        ORDER BY nombreUsuario';
        $results = mysqli_query($db,$query);
         //Pa' debugear
    //var_dump($query); 
     // die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td>'.$row["telefono"].'</td>';
                 echo '<td>';
                 getAlergiasByIdUsuario($row["idUsuario"]);
                 echo'</td>';
                 echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#modalModificarInvitado'.$row["idUsuario"].'">Modificar</button></td>';
                 modalModificarInvitado($row["idUsuario"],$row["nombreUsuario"],$row["correo"],$row["telefono"],$row["descripcion"]);
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarInvitado'.$row["idUsuario"].'">Eliminar</button></td>';
                 modalEliminarInvitado($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}
function getCoordinador($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * 
        FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i 
        WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol 
        AND e.idEvento = "'.$idEvento.'" AND r.nombreRol = "Coordinador" AND u.Ver=1 
        GROUP BY nombreUsuario
        ORDER BY nombreUsuario';
        $results = mysqli_query($db,$query);
         //Pa' debugear
    //var_dump($query); 
     // die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td>'.$row["telefono"].'</td>';
                 echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#modalModificarStaff'.$row["idUsuario"].'">Modificar</button></td>';
                 modalModificarStaff($row["idUsuario"],$row["nombreUsuario"],$row["correo"],$row["telefono"] );
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarStaff'.$row["idUsuario"].'">Eliminar</button></td>';
                 modalEliminarStaff($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}
function eliminarUsuario($idUsuario){
  $db = connectDB();
        if ($db != NULL) {
           // insert command specification
            $query='UPDATE Usuario SET Ver=0 WHERE idUsuario=?';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("i", $idUsuario)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
}
function modalEliminarStaff($id,$nombre) {
    echo '<div class="modal fade" id="modalEliminarStaff'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres eliminar a '.$nombre.'?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="eliminar_staff_perma.php?idStaff='.$id.'">Borrar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>';
}

function modalEliminarInvitado($id,$nombre) {
    echo '<div class="modal fade" id="modalEliminarInvitado'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres eliminar a '.$nombre.'?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="eliminar_invitado.php?id='.$id.'">Borrar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>';
}

function modalModificarStaff($id,$nombre,$correo, $telefono){
    $passwd = getPasswordById($id);
    $rol = getRol($id);
     echo'<div class="modal fade" id="modalModificarStaff'.$id.'" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos de '.$nombre.'</h4>
        </div>
        <div class="modal-body">
           <form action="modificar_staff.php" method="POST">
                    <input type="hidden" name="id" value="'.$id.'">
                    <div class="form-group"
                        <label>Rol:</label>
                        <select class="form-control" id="rol" name="rol" value="'.$rol.'"required>
                            <option> </option>';
                                getRollList($rol);
                       echo '</select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="nombre">Nombre completo:</label>
                      <input type="text" class="form-control" id="usr" name="nombreUsuario" value="'.$nombre.'" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                      <label for="example-email-input" class="col-2 col-form-label">Correo:</label>
                      <div class="col-10">
                        <input class="form-control" type="email" value="'.$correo.'" id="example-email-input" name="correo" required>
                      </div>
                    </div>
                    <br>
                     <div class="form-group row">
                      <label for="example-password-input" class="col-2 col-form-label">Contraseña: </label>
                      <div class="col-10">
                        <input class="form-control" type="password" value="'.$passwd.'" id="passwd1" name="passwd1" required>
                      </div>
                    </div>
                    <br>
                    <p>
                    <div class="form-group row">
                      <label for="example-password-input" class="col-2 col-form-label">Verificar Contraseña: </label>
                      <div class="col-10">
                        <input class="form-control" type="password" value="'.$passwd.'" id="passwd2" name="passwd2" required>
                      </div>
                    </div>
                    <br>
                     <div class="form-group row">
                      <label for="example-tel-input" class="col-2 col-form-label">Teléfono:</label>
                      <div class="col-10">
                        <input class="form-control" type="tel" value="'.$telefono.'" id="example-tel-input" name="telefono" required>
                      </div>
                    </div>
                    <br>
                    <br>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="action">Registrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/password_checker.js"></script> ';
}

function modificarUsuario($idUsuario,$nombreUsuario,$passwd,$correo,$telefono){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'UPDATE Usuario SET nombreUsuario=?, passwd=?, correo=?, telefono=? WHERE idUsuario = ?';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("issss", $idUsuario, $nombreUsuario, $passwd, $correo, $telefono)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        disconnectDB($db);
        return true;
    } 
    return false;
}


function getPasswordById($idUsuario){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT passwd from Usuario WHERE idUsuario ="'.$idUsuario.'"';
        //Pa' debugear
        //var_dump($query); 
       // die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["passwd"];
            }
        
        }
    }
    
}

function modalModificarInvitado($id,$nombre,$correo, $telefono, $alergia){
   $passwd = getPasswordById($id);
    $rol = getRol($id);
     echo '<div class="modal fade" id="modalModificarInvitado'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos de '.$nombre.'</h4>
        </div>
        <div class="modal-body">
           <form action="modificar_invitado.php" method="POST">
                   <div class="form-group">
              <label for="nombre">Nombre completo:</label>
              <input type="text" class="form-control" value="'.$nombre.'" id="usr" name = "nombreUsuario" required>
              
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="fecha_nac">Fecha Nacimiento:</label>
                  <input type="date" class="form-control" id="usr" name = "fechaNacimiento" required>
                </div>
                <div class="col-md-4 mb-3">  
                  <label>Estado:</label>
                  <select class="form-control" id="Estado" name="Estado" required>
                      <option> </option>
                      <?php getEstado() ?>
                  </select>
                </div>
                <div class="col-md-2 mb-3">
                  <label>Talla:</label>
                  <select class="form-control" id="talla" name="talla" required>
                      <option> </option>
                      <option value="S">Chica (S)</option>
                      <option value="M">Mediana (M)</option>
                      <option value="L">Grande (L)</option>
                      <option value="XL">Extra Grande (XL)</option>
                      <option value="XXL">Extra Extra Grande (XXL)</option>
                  </select>
                </div>
                <div class="col-md-2 mb-3">
                  <label>Seleccionar Idioma:</label>
                  <select class="form-control" id="idioma" name="idioma" required>
                      <option> </option>
                      <option value="1">Español</option>
                      <option value="2">English</option>
                  </select>
                </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="telefono">Teléfono:</label>
                <input class="form-control" type="tel" value="'.$telefono.'" id="telefono" name="telefono" required>
              </div>
              <div class="form-group col-md-6">
                <label for="correo">Correo:</label>
                <input class="form-control" type="email" value="'.$correo.'" id="correo" name="correo" required>
              </div>
              
            </div>

            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">Contraseña: </label>
              <div class="col-10">
                <input class="form-control" type="password" value="'.$passwd.'" id="passwd1" name="passwd1" required>
              </div>
            </div>
              
            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">Verificar Contraseña: </label>
              <div class="col-10">
                <input class="form-control" type="password" value="'.$passwd.'" id="passwd2" name="passwd2" required>
              </div>
            </div>
            <div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="asistenciaSi" name="asistencia" class="custom-control-input" value="yes">
                  <label class="custom-control-label" for="asistenciaSi">Asistiré</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="asistenciaNo" name="asistencia" class="custom-control-input" value="no">
                  <label class="custom-control-label" for="asistenciaNo">NO asistiré</label>
                </div>
            </div>


            <div class="form-group">
                <label>Alergias (Si padeces más de una, más adelante podrás registrar las que falten más adelante):</label>
                <select class="form-control" id="alergias" name="alergias" value="'.$alergias.'">
                  <option> </option>
                   <?php getAlergias() ?>
                </select>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="action">Registrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <script src="js/password_checker.js"></script> ';
}

function getInvitadosEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * 
                FROM Usuario U, Evento E, invitadoEvento IE, Invitado INV, Idioma IDI, Estado EST
                WHERE E.idEvento=IE.idEvento AND U.idUsuario=IE.idInvitado AND INV.idInvitado=IE.idInvitado AND IDI.idIdioma=INV.idIdioma AND EST.idEstado=INV.idEstado
                AND IE.idEvento ='.$idEvento.' 
                ORDER BY nombreUsuario';
        $results = mysqli_query($db,$query);
         //Pa' debugear
    //var_dump($query); 
     // die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        } 
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td>'.$row["telefono"].'</td>';
                 echo '<td>'.$row["fechaNacimiento"].'</td>';
                 echo '<td>'.$row["talla"].'</td>';
                 echo '<td>'.$row["nombreIdioma"].'</td>';
                 echo '<td>'.$row["nombreEstado"].'</td>';
                 echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Eliminar</button></td>';
                 echo generateModalDesasignarInvitado($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}

function generateModalDesasignarInvitado($id,$nombre) {
    echo '<div class="modal fade" id="myModal'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres desasignar a <strong>'.$nombre.'</strong>?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="desasignar_invitado.php?idInvitado='.$id.'">Borrar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
      </div>
    </div>
  </div>';
}

function desasignarInvitado($idEvento,$idInvitado){
  $db = connectDB();
        if ($db != NULL) {
            // insert command specification
            $query = 'DELETE FROM invitadoEvento WHERE idEvento IN (SELECT idEvento FROM Evento WHERE idEvento=?) AND idInvitado=?';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ii", $idEvento, $idInvitado)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
}

function getInvitadosList($idEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = '  SELECT DISTINCT U.nombreUsuario, U.idUsuario
                    FROM  Usuario U, invitadoEvento IE
                    WHERE U.idUsuario=IE.idInvitado 
                    	  AND U.idUsuario NOT IN (SELECT I.idInvitado FROM invitadoEvento I WHERE I.idEvento='.$idEvento.')
                    ORDER BY U.nombreUsuario';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value='.$row["idUsuario"].'>';
                echo $row["nombreUsuario"];
                echo "</option>";
            }
        }
    }
}

function asignarInvitado($idEvento, $idInvitado){
    $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='INSERT INTO  invitadoEvento(idEvento,idInvitado,fechaUsuarioEvento) VALUES(?,?,CURRENT_TIMESTAMP)';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ii", $idEvento,$idInvitado)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
}

function getAlergiasByIdUsuario($idUsuario){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT a.descripcion
    FROM Alergia a, Usuario u, usuarioAlergia ua
    WHERE u.idUsuario = ua.idUsuario
    AND a.idAlergia = ua.idAlergia
    AND u.idUsuario ="'.$idUsuario.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            echo'<ul>';
             while ($row = mysqli_fetch_assoc($results)) {
                echo '<li>'.$row["descripcion"].'</li>';
             }
             echo'<ul>';
        }
    }
}

function getNombreById($idUsuario){
   $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * FROM Usuario WHERE idUsuario ="'.$idUsuario.'"';
        //Pa' debugear
        //var_dump($query); 
       // die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["nombreUsuario"];
            }
        
        }
    } 
}

function getCoordinadorList(){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT * 
                  FROM Usuario U, tiene T 
                  WHERE U.idUsuario=T.idUsuario AND T.idRol=1493';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value='.$row["idUsuario"].'>';
                echo $row["nombreUsuario"];
                echo "</option>";
            }
        }
    }
}

function getClienteList(){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT * 
                  FROM Usuario U, tiene T 
                  WHERE U.idUsuario=T.idUsuario AND T.idRol=1496';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value='.$row["idUsuario"].'>';
                echo $row["nombreUsuario"];
                echo "</option>";
            }
        }
    }
}

function getPlantillasList(){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT *
                  FROM Plantilla';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value='.$row["idDiseno"].'>';
                echo $row["nombrePlantilla"];
                echo "</option>";
            }
        }
    }
}

function registrarEvento($nombreEvento, $descripcionEvento, $idEncuesta, $idCliente, $idCoordinador, $codigo){
    $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='INSERT INTO Evento (idEvento, nombreEvento, descripcionEvento, fechaCreacion, statusEvento, idEncuesta, idCliente, idCoordinador, Ver, codigo)
                    VALUES (NULL , ?,  ?, CURRENT_TIMESTAMP, "preparando", ?, ?, ?, 1, ?)';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ssiiis", $nombreEvento,$descripcionEvento,$idEncuesta,$idCliente,$idCoordinador,$codigo)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false;
}

function registrarEventoPlantilla($idPlantilla, $idEvento){
   $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='INSERT INTO  eventoDiseno(idDiseno, idEvento)
                    VALUES (?, ?)';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ii", $idPlantilla, $idEvento)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            //mysqli_free_result($result);
            disconnectDB($db);
            return true;
        }
        return false; 
}


?>
