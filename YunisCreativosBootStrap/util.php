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
        
        $query = 'SELECT U.nombreUsuario, U.correo, U.idUsuario FROM Evento E, staffEvento S, Usuario U WHERE E.idEvento=S.idEvento AND S.idStaff=U.idUsuario AND E.idEvento="'.$idEvento.'" AND Ver=1';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
        if(mysqli_num_rows($results) > 0) {
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Eliminar</button></td>';
                 generateModal($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
             } 
        }
    }
}

function generateModal($id,$nombre) {
    echo '<div class="modal fade" id="myModal'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres eliminar a <strong>'.$nombre.'</strong>?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="eliminar_staff.php?idStaff='.$id.'">Borrar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>';
}



function eliminarStaff($descripcionEvento,$idStaff){
  $db = connectDB();
        if ($db != NULL) {

            // insert command specification
            //$query='INSERT INTO alumnos (nombreA,carreraA,deuda) VALUES (?,?,?) ';
            $query = 'DELETE FROM staffEvento WHERE idEvento IN (SELECT idEvento FROM Evento WHERE descripcionEvento=?) AND idStaff=?';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("si", $descripcionEvento, $idStaff)) {
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

function getStaffList($descripcionEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT U.nombreUsuario FROM Usuario U, tiene T WHERE U.idUsuario=T.idUsuario AND T.idRol=1494 AND T.idUsuario NOT IN (SELECT U.idUsuario FROM Evento E, staffEvento S, Usuario U WHERE E.idEvento=S.idEvento AND S.idStaff=U.idUsuario AND E.descripcionEvento="'.$descripcionEvento.'")';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo "<option>";
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
         $query = 'INSERT INTO Usuario(nombreUsuario,passwd,correo,telefono) VALUES(?,?,?,?)';
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


function getRollList(){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Rol';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<option value='.$row["idRol"].'>'.$row["nombreRol"].'</option>';
            }
        }
    }
}
    
function getStaff($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT DISTINCT  nombreUsuario, correo, telefono FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol AND e.idEvento = "'.$idEvento.'" AND r.nombreRol = "Staff" AND u.Ver=1 ORDER BY nombreUsuario';
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
                  echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Modificar</button></td>';
                 //($row["idUsuario"],$row["nombreUsuario"]);
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
        $query = 'SELECT DISTINCT  nombreUsuario, correo, telefono, a.descripcion
        FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i, usuarioAlergia ua, Alergia a  
        WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol AND ua.idUsuario = u.idUsuario AND a.idAlergia = ua.idAlergia
        AND e.idEvento = "'.$idEvento.'" AND r.nombreRol = "Invitado" AND u.Ver=1
        ORDER BY nombreUsuario ';
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
                 echo '<td>'.$row["a.descripcion"].'</td>';
                 echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Modificar</button></td>';
                 //generateModal($row["idUsuario"],$row["nombreUsuario"]);
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Eliminar</button></td>';
                // generateModal($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}
function getCoordinador($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT DISTINCT nombreUsuario, correo, telefono FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol AND e.idEvento = "'.$idEvento.'" AND r.nombreRol = "Coordinador" AND u.Ver=1 ORDER BY nombreUsuario';
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
                  echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Modificar</button></td>';
                 //generateModal($row["idUsuario"],$row["nombreUsuario"]);
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Eliminar</button></td>';
                // generateModal($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}
function eliminarStaffPerma($idUsuario){
  $db = connectDB();
        if ($db != NULL) {
           // insert command specification
            $query='UPDATE Usuario SET Ver=0 WHERE idEvento=?';
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
?>

