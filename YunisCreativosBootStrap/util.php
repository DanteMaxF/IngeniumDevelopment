<?php

//CONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function connectDB(){
  $mysql = mysqli_connect("localhost","root","","YunisCreativos");
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
        
        $query = 'SELECT descripcionEvento FROM Evento';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                echo "<option>";
                echo $row["descripcionEvento"];
                echo "</option>";
            }
        }
    }
}

function getInfoGeneralEvento($descripcionEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT E.nombreEvento, E.descripcionEvento, E.statusEvento, En.califPromedio, Cl.nombreUsuario AS  "Cliente", Co.nombreUsuario AS  "Coordinador" FROM Evento E, Encuesta En, Usuario Cl, Usuario Co WHERE E.idEncuesta = En.idEncuesta AND E.idCliente = Cl.idUsuario AND E.idCoordinador = Co.idUsuario AND descripcionEvento =  "'.$descripcionEvento.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)){
                 echo '<tr>';
                 echo '<th scope="row">'.$row["nombreEvento"].'</th>';
                 echo '<td>'.$row["descripcionEvento"].'</td>';
                 echo '<td>'.$row["statusEvento"].'</td>';
                 echo '<td>'.$row["califPromedio"].'</td>';
                 echo '<td>'.$row["Cliente"].'</td>';
                 echo '<td>'.$row["Coordinador"].'</td>';
            }
        }
    }
}

function getStaffEvento($descripcionEvento){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT U.nombreUsuario, U.correo FROM Evento E, staffEvento S, Usuario U WHERE E.idEvento=S.idEvento AND S.idStaff=U.idUsuario AND E.descripcionEvento="'.$descripcionEvento.'"';
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
                 echo '<td><button type="button" class="btn btn-danger btn-sm"data-toggle="modal" data-target="#modaldel">Borrar</button></td>';
                 echo '</tr>';
             } 
        }
    }
}

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

?>

