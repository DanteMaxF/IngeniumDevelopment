<?php

function modalModificarStaff($id,$nombre,$correo, $telefono){
    $passwd = getPasswordById($id);
     echo '<div class="modal fade" id="modalModificarStaff'.$id.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos de '.$nombre.'</h4>
        </div>
        <div class="modal-body">
           <form action="modificar_staff.php?id='.$id.',?nombreUsuario='.$nombre.',correo='.$correo.'" method="POST">
                    <input type="hidden" class="form-control" value="'.$id.'" id="usr" name = "id" required>
                    <div class="form-group"
                        <label>Rol:</label>
                        <select class="form-control" id="rol" name="rol" value="'.$rol.'"required>';
                            getRollList($id);
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
                      <label for="example-password-input" class="col-3 col-form-label">Contraseña: </label>
                      <div class="col-15">
                        <input class="form-control" type="password" value="'.$passwd.'" id="passwd1" name="passwd1" required>
                      </div>
                    </div>
                    <br>
                    <p>
                    <div class="form-group row">
                      <label for="example-password-input" class="col-3 col-form-label">Verificar Contraseña: </label>
                      <div class="col-15">
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

function modificarUsuario($nombreUsuario,$passwd,$correo,$telefono,$idUsuario){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'UPDATE Usuario SET nombreUsuario = ? ,passwd = ?, correo = ?,telefono = ? WHERE idUsuario = ?';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ssssi", $nombreUsuario, $passwd, $correo, $telefono, $idUsuario)) {
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
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos de '.$nombre.'</h4>
        </div>
        <div class="modal-body">
        <div class="container">
           <form action="modificar_invitado.php" method="POST">
                   <div class="form-group">
                <input type="hidden" class="form-control" value="'.$id.'" id="usr" name = "id" required>
              <label for="nombre">Nombre completo:</label>
              <input type="text" class="form-control" value="'.$nombre.'" id="usr" name = "nombreUsuario" required>
              
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="fecha_nac">Fecha Nacimiento:</label>
                  <input type="date" class="form-control" id="usr" value="';
                  
                   echo getFechaNacimiento($id);
                  
                   echo '" name = "fechaNacimiento" required>
                </div>
                <div class="col-md-4 mb-3">  
                  <label>Estado:</label>
                  <select class="form-control" id="Estado" name="Estado" required>';
                        getEstadoList($id);
            echo'</select>
                </div>
                <div class="col-md-2 mb-3">
                  <label>Talla:</label>
                  <select class="form-control"  id="talla" name="talla" required>';
                            getTallaList($id);
            echo'</select>
                </div>
                <div class="col-md-2 mb-3">
                  <label>Idioma:</label>
                  <select class="form-control" id="idioma" name="idioma" required>';
                     getIdiomaList($id);
                  echo'</select>
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
            </div>';
             echo getAsistenciaByIdUsuario($id);
             echo  '<div class="form-group">
                      <label for="alergias">Alergias (opcional)</label>
                      <textarea class="form-control" id="alergias" name="alergias" rows="3">';
                      echo getAlergiasById($id);
                      echo'</textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="medicamentos">Medicamentos (opcional)</label>
                      <textarea class="form-control" id="medicamentos" name="medicamentos" rows="3">';
                       echo getMedicamentosById($id);
                       echo'</textarea>
                    </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="action">Registrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
        </form>
      </div>
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
        //die('');
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
                 echo '<td>'.$row["alergias"].'</td>';
                 echo '<td>'.$row["medicamentos"].'</td>';
                 echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Expulsar</button></td>';
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
                    FROM  Usuario U, tiene T
                    WHERE U.idUsuario=T.idUsuario AND idRol=1495 
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

function getAlergiasByIdUsuario($idInvitado){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Invitado    WHERE
    idInvitado ="'.$idInvitado.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            echo'<ul>';
             while ($row = mysqli_fetch_assoc($results)) {
                echo '<li>'.$row["alergias"].'</li>';
             }
             echo'<ul>';
        }
    }
}

function modalModificarEvento($idEvento){
    $descripcionEvento = getDescripcionEvento($idEvento);
    $nombreEmpresa = getNombreEventoByIdEvento($idEvento);
    $estadoEvento = getStatusEvento($idEvento);
    $codigo = getCodigoEvento($idEvento);
    echo'<div class="modal fade" id="modalModificarEvento'.$id.'" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos:</h4>
        </div>
        <div class="modal-body">
           <form action="modificar_evento.php" method="POST">
                    <input type="hidden" name="idEvento" value="'.$idEvento.'">
                    <div class="form-group">
                      <label for="nombre">Nombre Empresa:</label>
                      <input type="text" class="form-control" name="nombreEmpresa" value="'.$nombreEmpresa.'" required>
                    </div>
                    <div class="form-group">
                      <label for="nombre">Descripcion del evento:</label>
                      <input type="text" class="form-control" name="descripcionEvento" value="'.$descripcionEvento.'" required>
                    </div>
                     <div class="form-group">
                      <label for="nombre">Estado del evento:</label>
                      <input type="text" class="form-control" name="estadoEvento" value="'.$estadoEvento.'" required>
                    </div>
                     <div class="form-group">
                      <label for="nombre">Código del Evento:</label>
                      <input type="text" class="form-control" name="codigoEvento" value="'.$codigo.'" required>
                    </div>
                    <div>
                        <label>Coordinador:</label>
                         <select class="form-control"  id="coordinador" name="coordinador" required>';
                            getCoordinadorEvento($idEvento);
                    echo'</select><br>
                    </div>
                     <div>
                        <label>Cliente:</label>
                         <select class="form-control"  id="cliente" name="cliente" required>';
                            getClienteEvento($idEvento);
                    echo'</select><br>
                    </div>
                    <div>
                        <label>Plantilla:</label>
                         <select class="form-control"  id="plantilla" name="plantilla" required>';
                            getPlantillaEvento($idEvento);
                    echo'</select><br>
                    </div>
                    
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="action">Registrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>';
}


function getIdPlantillaByIdEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idDiseno from Evento WHERE idEvento ="'.$idEvento.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idDiseno"];
            }
        }
    }
    
}

function plantillaTable(){
     $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * 
                  FROM Plantilla
                  WHERE Ver=1';
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
                 echo '<td>'.$row["nombrePlantilla"].'</td>';
                 echo '<td>'.$row["colorFondo"].'</td>';
                 echo '<td>'.$row["colorTexto"].'</td>';
                 echo '<td>'.$row["nombreImagen"].'</td>';
                 echo '<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEditarPlantilla'.$row["idDiseno"].'">Editar</button></td>';
                 modalEditarPlantilla($row["idDiseno"]);
                 echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.$row["idDiseno"].'">Eliminar</button></td>';
                 modalEliminarPlantilla($row["idDiseno"],$row["nombrePlantilla"]);
                 echo '</tr>';
            }
        }
    }
    
}

function getEstadoById($id){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Estado e, Invitado i WHERE e.idEstado = i.idEstado AND i.idInvitado = "'.$id.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idEstado"];
            }
        }
    }
}



function getEstadoList($id){
    $db = connectDB();
    if($db != NULL){
    $not = getEstadoById($id);
    $query = 'SELECT * FROM Estado ORDER BY nombreEstado ASC';
     //Pa' debugear
    //var_dump($query); 
    //die('');
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    if(mysqli_num_rows($results) > 0){
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<option value="'.$row["idEstado"].'" ';
            if($row["idEstado"]==$not){
                echo 'selected';
            }
             echo'>'.$row["nombreEstado"].'</option>';
            }
        }
    }  
}


function getTallaById($id){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Talla t, Invitado i WHERE t.idTalla = i.talla AND i.idInvitado = "'.$id.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                return $row["talla"];
            }
        }
    }
}

function getTallaList($id){
    $db = connectDB();
    if($db != NULL){
    $not = getTallaById($id);
    $query = 'SELECT * FROM Talla  ORDER BY DescripcionTalla ASC';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
         if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<option value="'.$row["idTalla"].'" ';
                 if($row["idTalla"]==$not){
                     echo 'selected';
                 }
                 
                 echo'>'.$row["DescripcionTalla"].'</option>';
            }
        }
    }  
}


//CONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function connectDB(){
    $developerMode = true; //Cambiar a true solo cuando se vaya a pasar al entorno de produccion
    
    if ($developerMode){
        $mysql = mysqli_connect("localhost","root","","YunisCreativos");
    }else{
         $mysql = mysqli_connect("localhost","DanteMaxF","Ingenium123","YunisCreativos");
    }
    $mysql->set_charset("utf8mb4");
    return $mysql;
    
}  



//DESCONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function disconnectDB($mysql){
  mysqli_close($mysql);
}

//FUNCION PARA VERIFICAR EL LOGIN
function login($mail, $passwd) {
  /*
  VULNERABLE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $db = connectDB();
  if ($db != NULL) {

    $query='SELECT correo FROM Usuario WHERE correo="'.$mail.
        '" AND passwd="'.$passwd.'" AND Ver=1';
    
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
  */
  $db = connectDB();
        if ($db != NULL) {

            // insert command specification
            $query = 'SELECT correo FROM Usuario WHERE correo=? AND passwd=? AND Ver=1';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ss", $mail, $passwd)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              }
            $result = $statement->get_result();
            disconnectDB($db);
            if ($row = $result->fetch_assoc()){
                return true;
            }else{
                return false;
            }
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
        
        $query = 'SELECT * FROM Evento WHERE Ver="1" ORDER BY descripcionEvento ASC';
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
                 echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModificarEvento'.$row["idEvento"].'">Modificar</button></td>';
                 modalModificarEvento($idEvento);

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
                 echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Expulsar</button></td>';
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
          <p>¿Estás seguro que quieres expulsar a <strong>'.$nombre.'</strong>?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="desasignar_staff.php?idStaff='.$id.'">Expulsar</a>
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
function registrarInvitado($idInvitado,$fechaNacimiento, $talla, $idEstado, $idIdioma,$alergias,$medicamentos){
    $db = connectDB();
    if($db != NULL){
     $query = 'INSERT INTO Invitado(idInvitado,fechaNacimiento,talla,idEstado,idIdioma,alergias,medicamentos,asistencia) VALUES(?,?,?,?,?,?,?,"yes")';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 

        if (!$statement->bind_param("issiiss",$idInvitado, $fechaNacimiento, $talla, $idEstado,$idIdioma,$alergias,$medicamentos)) {
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
    $query = 'SELECT * from Estado ORDER BY nombreEstado';
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


function registrarPlantillas($nombrePlantilla,$colorFondo,$colorBotones,$nombreImagen){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'INSERT INTO Plantilla(nombrePlantilla,colorFondo,colorBotones, nombreImagen, Ver) VALUES(?,?,?,?,1)';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ssss", $nombrePlantilla,$colorFondo,$colorBotones,$nombreImagen)) {
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
         $query = 'UPDATE tiene SET idRol= ? WHERE idUsuario=?';
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


function getRollList($id){
    $db = connectDB();
    if($db != NULL){
    $not = getRollById($id);
    $query = 'SELECT * FROM Rol';
     //Pa' debugear
    //var_dump($query); 
    //die('');
    $results = mysqli_query($db,$query);
    disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value="'.$row["idRol"].'"';
                if($row["idRol"]==$not){
                    echo 'selected';
                }
                echo'>'.$row["nombreRol"].'</option>';
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
        if(mysqli_num_rows($results) == 0){
                echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td><td></td><td></td></tr>';
        }
    }
}
function getInvitados($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT *
        FROM Usuario u, Evento e, invitadoEvento ie, tiene t, Rol r, Invitado i  
        WHERE u.idUsuario = ie.idInvitado AND e.idEvento = ie.idEvento AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol 
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
                 echo '<td>';
                 getMediacamentosByIdUsuario($row["idUsuario"]);
                 echo'</td>';
                 echo '<td><button type="button" class="btn btn" data-toggle="modal" data-target="#modalModificarInvitado'.$row["idUsuario"].'">Modificar</button></td>';
                 modalModificarInvitado($row["idUsuario"],$row["nombreUsuario"],$row["correo"],$row["telefono"],$row["descripcion"]);
                 echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarInvitado'.$row["idUsuario"].'">Eliminar</button></td>';
                 modalEliminarInvitado($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
        if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td><td></td><td></td></tr>';
        }
    }
}
function getCoordinador($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * 
        FROM Usuario u, Evento e, tiene t, Rol r
        WHERE e.idCoordinador = u.idUsuario AND u.idUsuario = t.idUsuario AND t.idRol = r.idRol
		AND r.idRol = 1493 AND e.idEvento = "'.$idEvento.'"
        GROUP BY nombreUsuario
        ORDER BY nombreUsuario';
        $results = mysqli_query($db,$query);
         //Pa' debugear
         //var_dump($query); 
        //die('');
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
         if(mysqli_num_rows($results) == 0){
                echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td><td></td><td></td></tr>';
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

// TODO Rewrite this function to diplay in plantillas page
function getPlantillasListTemp(){
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
                echo '<div style="color:'.$row["colorTexto"].'; ">';
                echo $row["nombrePlantilla"];
                echo "</div>";
            }
        }
    }
}




function registrarEvento($nombreEvento, $descripcionEvento, $idEncuesta, $idCliente, $idCoordinador, $codigo,$idDiseno){
    $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='INSERT INTO Evento (idEvento, nombreEvento, descripcionEvento, fechaCreacion, statusEvento, idEncuesta, idCliente, idCoordinador, Ver, codigo, idDiseno) 
                    VALUES (NULL, ?, ?, CURRENT_TIMESTAMP, "preparando", ?, ?, ?, 1, ?, ?);';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("ssiiisi", $nombreEvento,$descripcionEvento,$idEncuesta,$idCliente,$idCoordinador,$codigo,$idDiseno)) {
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

function getFechaNacimiento($idInvitado){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT  * from Invitado  WHERE idInvitado = "'.$idInvitado.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo $row["fechaNacimiento"];
            }
        }
    }
}

function getTalla($id ){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT  * from Invitado i WHERE idInvitado = "'.$id.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<option>'.$row["talla"].'</option>';
            }
        }
    }
}



function getNombreEventoByIdEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT nombreEvento from Evento WHERE idEvento ="'.$idEvento.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["nombreEvento"];
            }
        }
    }
}

function getStatusEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT statusEvento from Evento WHERE idEvento ="'.$idEvento.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["statusEvento"];
            }
        }
    }
}

function getLastEventInvitado($idUser){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idEvento FROM invitadoEvento WHERE idInvitado='.$idUser.' ORDER BY fechaUsuarioEvento DESC LIMIT 1';
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
        else{
            return -1;
        }
    }
    
}

function getIdEventoByIdInvitado($idInvitado){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idEvento from invitadoEvento WHERE idInvitado ="'.$idInvitado.'"';
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


function getIdPlantillaByIdInvitado($idInvitado){
    $idEvento = getIdEventoByIdInvitado($idInvitado);
    return getIdPlantillaByIdEvento($idEvento);
}


function getPlantillaById($idPlantilla){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT *
                  FROM Plantilla where idDiseno ="'.$idPlantilla.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            /*while ($row = mysqli_fetch_assoc($results)) {
                echo '<div style="color:'.$row["colorTexto"].'; ">';
                echo $row["nombrePlantilla"];
                echo "</div>";
            }*/
            return mysqli_fetch_assoc($results);
        }
    }
}


function uploadMsg($idUser, $idEvent, $msg){
    $db = connectDB();
 
      if ($db != NULL) {

            // insert command specification
            $query='INSERT INTO  chat (idUsuario, idEvento, fechaMensaje, mensaje)
                    VALUES (?,?,CURRENT_TIMESTAMP,?)';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("iis", $idUser, $idEvent, $msg)) {
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

function getAsistenciaByIdUsuario($id){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Invitado  WHERE idInvitado = "'.$id.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                if($row["asistencia"]=="yes"){
                echo
                '<div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="asistenciaSi" name="asistencia" class="custom-control-input" value="yes" checked>
                          <label class="custom-control-label" for="asistenciaSi">Asistiré</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="asistenciaNo" name="asistencia" class="custom-control-input" value="no">
                          <label class="custom-control-label" for="asistenciaNo">NO asistiré</label>
                        </div>
                    </div>';
                    
                }else if ($row["asistencia"]=="no"){
                echo
                    '<div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="asistenciaSi" name="asistencia" class="custom-control-input" value="yes">
                          <label class="custom-control-label" for="asistenciaSi">Asistiré</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="asistenciaNo" name="asistencia" class="custom-control-input" value="no" checked>
                          <label class="custom-control-label" for="asistenciaNo">NO asistiré</label>
                        </div>
                    </div>';
                    
                }
            }
        }
    }
}

function getIdiomaById($id){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * FROM Invitado WHERE idInvitado = "'.$id.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                return $row["idIdioma"];
            }
        }
    }
}

function showMsg($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query =   'SELECT U.nombreUsuario, R.nombreRol, C.fechaMensaje, C.mensaje
                    FROM chat C, Usuario U, Rol R, tiene T
                    WHERE U.idUsuario=C.idUsuario AND U.idUsuario=T.idUsuario AND R.idRol=T.idRol
                    AND idEvento='.$idEvento.' ORDER BY C.fechaMensaje ASC';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo  '<div class="card border-secondary text-left" >
                            <div class="card-header bg-info">
                                <h6 class="text-white">'.$row["nombreUsuario"].'<strong> ['.$row["nombreRol"].']</strong></h6>
                                <div class="text-white">'.$row["fechaMensaje"].'</div>
                            </div>
                            <div class="card-body bg-light">
                              <p class="card-text">'.$row["mensaje"].'</p>
                            </div>
                        </div>
                        <br>';           
             }
        }
    }
}


function getIdiomaList($id){
    $db = connectDB();
    if($db != NULL){
    $not = getIdiomaById($id);
    $query = 'SELECT * FROM Idioma  ORDER BY nombreIdioma ASC';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
         if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<option value="'.$row["idIdioma"].'"';
                 if($row["idIdioma"]==$not){
                     echo 'selected';
                 }
                 
                 echo'>'.$row["nombreIdioma"].'</option>';
            }
        }
    }  
}

function getLastEventoCoordinador($idUser){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idEvento FROM Evento WHERE idCoordinador='.$idUser.' ORDER BY fechaCreacion DESC LIMIT 1';
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
        else{
            return -1;
        }
    }
}

function getRollById($id){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from tiene WHERE idUsuario = "'.$id.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idRol"];
            }
        }
    }
}

function eliminarRolUsuario($idUsuario){ 
     $db = connectDB(); 
     //Pa' debugear 
    //var_dump($passwd);  
      //die(''); 
    if($db != NULL){ 
         $query = 'Delete FROM tiene WHERE idUsuario = ?'; 
        // Preparing the statement  
         if (!($statement = $db->prepare($query))) { 
            die("Preparation failed: (" . $db->errno . ") " . $db->error); 
          } 
        // Binding statement params  
        if (!$statement->bind_param("i",$idUsuario)) { 
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

function getAlergiasById($idUsuario){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * from Invitado WHERE idInvitado ="'.$idUsuario.'"';
        //Pa' debugear
        //var_dump($query); 
       // die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["alergias"];
            }
        }
    }
}
        

function getMedicamentosById($idUsuario){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * from Invitado WHERE idInvitado ="'.$idUsuario.'"';
        //Pa' debugear
        //var_dump($query); 
       // die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 return $row["medicamentos"];
            }
        
        }
    }
}

function modificarInvitado($idEstado, $talla, $idIdioma, $asistencia, $alergias, $medicamentos,$fechaNacimiento,$idInvitado){
    $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'UPDATE Invitado SET idEstado = ?, talla = ?, idIdioma = ?, asistencia = ?,alergias = ?, medicamentos = ?, fechaNacimiento= ? WHERE idInvitado = ?';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("isissssi", $idEstado, $talla, $idIdioma, $asistencia,$alergias, $medicamentos,$fechaNacimiento,$idInvitado)) {
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

function getCodigoEvento($idEvento){
     $db = connectDB();
    if ($db != NULL) {
        $query='SELECT codigo FROM Evento WHERE idEvento="'.$idEvento.'"';
      
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        
        if (mysqli_num_rows($results) > 0) {
            if($row = mysqli_fetch_assoc($results)) {
                $res = "".$row["codigo"]."";
            }else{
                $res = "-1";
            }
        }
        mysqli_free_result($results);
    }
    return $res;
    
}
 function getCoordinadorByIdEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Evento e, Usuario u WHERE e.idCoordinador = u.idUsuario AND e.idEvento = "'.$idEvento.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idUsuario"];
            }
        }
    }
}



function getCoordinadorEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $not = getCoordinadorByIdEvento($idEvento);
        $query = 'SELECT * FROM   Usuario u, tiene t WHERE t.idUsuario = u.idUsuario AND idRol = 1493';
         //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value="'.$row["idUsuario"].'" ';
                if($row["idUsuario"]==$not){
                    echo 'selected';
                }
                 echo'>'.$row["nombreUsuario"].'</option>';
            }
        }
    }  
}

 function getClienteByIdEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Evento e, Usuario u WHERE e.idCliente = u.idUsuario AND e.idEvento = "'.$idEvento.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idUsuario"];
            }
        }
    }
}



function getClienteEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $not = getClienteByIdEvento($idEvento);
        $query = 'SELECT * FROM   Usuario u, tiene t WHERE t.idUsuario = u.idUsuario AND idRol = 1496';
         //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value="'.$row["idUsuario"].'" ';
                if($row["idUsuario"]==$not){
                    echo 'selected';
                }
                 echo'>'.$row["nombreUsuario"].'</option>';
            }
        }
    }  
}

 function getPlantillaByIdEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * from Evento WHERE  idEvento = "'.$idEvento.'"';
     //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 return $row["idDiseno"];
            }
        }
    }
}



function getPlantillaEvento($idEvento){
    $db = connectDB();
    if($db != NULL){
        $not = getPlantillaByIdEvento($idEvento);
        $query = 'SELECT * FROM Plantilla';
         //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value="'.$row["idDiseno"].'" ';
                if($row["idDiseno"]==$not){
                    echo 'selected';
                }
                 echo'>'.$row["nombrePlantilla"].'</option>';
            }
        }
    }  
}

function modificarEvento($nombreEmpresa,$descripcionEvento,$statusEvento,$codigo,$idCoordinador,$idCliente,$idDiseno,$idEvento){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'UPDATE Evento SET nombreEvento = ? ,descripcionEvento = ?, statusEvento = ?,codigo = ?,idCoordinador = ?, idCliente = ?, idDiseno=? WHERE idEvento = ?';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ssssiiii",$nombreEmpresa,$descripcionEvento,$statusEvento,$codigo,$idCoordinador,$idCliente,$idDiseno,$idEvento)) {
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

function getMediacamentosByIdUsuario($idInvitado){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Invitado    WHERE
    idInvitado ="'.$idInvitado.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            echo'<ul>';
             while ($row = mysqli_fetch_assoc($results)) {
                echo '<li>'.$row["medicamentos"].'</li>';
             }
             echo'<ul>';
        }
    }
}

function modalEliminarPlantilla($idDiseno,$nombrePlantilla) {
    echo '<div class="modal fade" id="myModal'.$idDiseno.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro que quieres eliminar la plantilla:  <strong>'.$nombrePlantilla.'</strong>?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="eliminar_plantilla.php?idDiseno='.$idDiseno.'">Eliminar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
        </div>
      </div>
    </div>
  </div>';
}

function eliminarPlantilla($idDiseno){
     $db = connectDB();
        if ($db != NULL) {
           // insert command specification
            $query='UPDATE Plantilla SET Ver=0 WHERE idDiseno=?';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("i", $idDiseno)) {
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

function getInvitadosCliente($idEvento, $idCliente){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT * 
                FROM Usuario U, Evento E, invitadoEvento IE, Invitado INV, Idioma IDI, Estado EST
                WHERE E.idEvento=IE.idEvento AND U.idUsuario=IE.idInvitado AND INV.idInvitado=IE.idInvitado AND IDI.idIdioma=INV.idIdioma AND EST.idEstado=INV.idEstado
                AND IE.idEvento ='.$idEvento.' AND U.idUsuario !='.$idCliente.' 
                ORDER BY nombreUsuario';
        $results = mysqli_query($db,$query);
        //Pa' debugear
        //var_dump($query); 
        //die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        } 
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["correo"].'</td>';
                 
                 echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.$row["idUsuario"].'">Expulsar</button></td>';
                 echo generateModalDesasignarInvitado($row["idUsuario"],$row["nombreUsuario"]);
                 echo '</tr>';
            }
        }
    }
}

function getTelefonoById($id){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Usuario    WHERE
    idUsuario ="'.$id.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo $row["telefono"];
             }
        }
    }
}


function modalEditarPlantilla($idDiseno){
   echo'  <!-- The Modal -->
    <div class="modal fade" id="modalEditarPlantilla'.$idDiseno.'">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Editar Plantilla</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
            <form action="modificar_plantilla.php" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                 <input type="hidden" class="form-control" value="'.$idDiseno.'"  name = "idDiseno" required>
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" class="form-control" id="nombrePlantilla" value="'.getNombrePlantillaById($idDiseno).'" name="nombrePlantilla">
                  </div>
                <br>
                <label>Color fondo:</label>
                <div class="col-10">
                  <input class="form-control" type="color" id="colorFondo"  value="'.getColorFondoById($idDiseno).'" name="colorFondo">
                </div>
                <br>
                <label>Color texto:</label>
                <div class="col-10">
                  <input class="form-control" type="color" id="colorTexto"  value="'.getColorTextoById($idDiseno).'" name="colorTexto">
                </div>
                <br>            
                <div class="custom-file">
                    <input type="file" class="custom-file-input" style="display:none;"  data-label="'.$idDiseno.'" id="customFileLang'.$idDiseno.'" lang="es" name="nombreImagen">
                    <label class="c6 btn btn-primary" id="labelFile'.$idDiseno.'" for="customFileLang'.$idDiseno.'" >Cambiar imagen:'.getImagenById($idDiseno).'</label>
                </div>
                <br><br>
                <button class="btn waves-effect waves-light" type="submit" name="action">Registrar</button>
                <br><br>  
            </form>
          </div>
    
          <!-- Modal footer -->
        </div>
      </div>';
}

function getImagenById($idDiseno){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Plantilla   WHERE
    idDiseno="'.$idDiseno.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
    $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                return $row["nombreImagen"];
            }      
        }
    }
}

function getFotos($idEvento){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT *
                  FROM Galeria    
                  WHERE idEvento='.$idEvento;
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<a href="images/gallery/'.$row['path'].'"><img src="images/gallery/'.$row['path'].'" class="img-thumbnail img-responsive" alt="" width="20%"></a>';
            }
        }
    }
}

function uploadFoto($idEvento, $photo){
    $db = connectDB();
        if ($db != NULL) {
           // insert command specification
            $query='INSERT INTO Galeria (idFoto,idEvento,path) VALUES (NULL ,?,?);';
            mysqli_query($db, $query);
            // Preparing the statement
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$statement->bind_param("is", $idEvento,$photo)) {
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

function PasswordForgot($correo){
    $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * FROM Usuario WHERE correo = "'.$correo.'"';
    
    $results = mysqli_query($db,$query);
    //Pa' debugear
    // var_dump($results); 
    // die('');
    
 
   if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No existe un correo registrado</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        } 
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
             return $row["passwd"]; 
         } 
        }
   disconnectDB($db);
        }
}


function GetUsuarioPassword($correo){
     $db = connectDB();
    if($db != NULL){
    $query = 'SELECT * FROM Usuario WHERE correo = "'.$correo.'"';
    
    $results = mysqli_query($db,$query);
    //Pa' debugear
    // var_dump($results); 
    // die('');
    
 
   if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No existe un correo registrado</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        } 
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
             return $row["nombreUsuario"]; 
            header("location:index.php");
         } 
        }
   disconnectDB($db);
        }
}


function getNombrePlantillaById($idDiseno){
     $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Plantilla   WHERE
    idDiseno="'.$idDiseno.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                return $row["nombrePlantilla"];
             }
        }
    }
}

function getColorFondoById($idDiseno){
     $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Plantilla   WHERE
    idDiseno="'.$idDiseno.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                return $row["colorFondo"];
             }
        }
    }
}

function getColorTextoById($idDiseno){
     $db = connectDB();
    if($db != NULL){
    $query = 'SELECT *
    FROM Plantilla   WHERE
    idDiseno="'.$idDiseno.'"';
     //Pa' debugear
    //var_dump($query); 
    //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                return $row["colorTexto"];
             }
        }
    }
}

function modificarPlantillaNoImagen($nombrePlantilla, $colorFondo, $colorTexto, $idDiseno){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'UPDATE Plantilla SET nombrePlantilla = ? , colorFondo = ?,colorTexto = ? WHERE idDiseno = ?';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("sssi",$nombrePlantilla, $colorFondo, $colorTexto, $idDiseno)) {
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

function modificarPlantillaImagen($nombrePlantilla, $colorFondo, $colorTexto, $nombreImagen, $idDiseno){
     $db = connectDB();
     //Pa' debugear
    //var_dump($passwd); 
      //die('');
    if($db != NULL){
         $query = 'UPDATE Plantilla SET nombrePlantilla = ? , colorFondo = ?, colorTexto = ?, nombreImagen = ? WHERE idDiseno = ?';
        // Preparing the statement 
         if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
          }
        // Binding statement params 
        if (!$statement->bind_param("ssssi",$nombrePlantilla, $colorFondo, $colorTexto, $nombreImagen, $idDiseno)) {
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

function getLastEventoStaff($idUser){
    $db = connectDB();
    if($db != NULL){
        $query = 'SELECT idEvento FROM staffEvento WHERE idStaff='.$idUser.' ORDER BY fechaUsuarioEvento DESC LIMIT 1';
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
        else{
            return -1;
        }
    }
}

function getInvitadosForStaff($idEvento){
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
        //die('');
        disconnectDB($db);
        if(mysqli_num_rows($results) == 0){
            echo '<tr><td>No hay usuarios registrados por el momento</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        } 
        if(mysqli_num_rows($results) > 0){
             while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["nombreUsuario"].'</td>';
                 echo '<td>'.$row["nombreEstado"].'</td>';
                 echo '<td>'.$row["telefono"].'</td>';
                 echo '<td>'.$row["talla"].'</td>';
                 echo '</tr>';
            }
        }
    }
}

?>
