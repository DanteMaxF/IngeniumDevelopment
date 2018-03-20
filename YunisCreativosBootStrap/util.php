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

   function eliminarEvento($idEvento){
        $db = connectDB();
        
        // insert command specification 
        $query='DELETE FROM Evento WHERE idEvento= ?';
        // Preparing the statement 
        if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$statement->bind_param("s", $idEvento)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }   
        // update execution
        if ($statement->execute()) {
            echo 'There were ' . mysqli_affected_rows($db) . ' affected rows';
        } else {
            die("Update failed: (" . $statement->errno . ") " . $statement->error);
        }
        
        disconnectDB($db); 
    
    }
    
    
 function editarEvento($idEvento, $nombreEvento, $descripcionEvento, $statusEvento, $idEncuesta, $idCliente, $idCoordinador, $idStaff){
        $db = connectDb();
        
        // insert command specification 
        $query='UPDATE Evento SET idEvento=?, nombreEvento=?, descripcionEvento=?, fechaCreacion=?, statusEvento=?, idEncuesta=?, idCliente=?, idCoordinador=? WHERE 1';
        // Preparing the statement 
        if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$statement->bind_param("sssssssss", $idEvento, $nombreEvento, $descripcionEvento, $statusEvento, $idEncuesta, $idCliente, $idCoordinador)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }   
        // update execution
        if ($statement->execute()) {
            echo 'There were ' . mysqli_affected_rows($db) . ' affected rows';
        } else {
            die("Update failed: (" . $statement->errno . ") " . $statement->error);
        }
        
        disconnectDB($db);    
    }

 function insertarEvento($idEvento, $nombreEvento, $descripcionEvento, $statusEvento, $idEncuesta, $idCliente, $idCoordinador, $idStaff) {
          $db = connectDB();
        if ($db != NULL) {
            
            // insert command specification 
            // $query='INSERT INTO productos (nombre,imagen) VALUES (?,?) ';
            $query='INSERT INTO Evento (idEvento,nombreEvento,descripcionEvento,fechaCreacion,statusEvento,idEncuesta,idCliente,idCoordinador) VALUES (?,?,?,?,?,?,?,?)';

            // Preparing the statement 
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("ss", $idEvento, $nombreEvento, $descripcionEvento, $statusEvento, $idEncuesta, $idCliente, $idCoordinador)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              } 

            
            mysqli_free_result($results);
            disconnectBD($db);
            return true;
        } 
        return false;
    }
    
    
    function insertarUsuario($idUsuario, $nombreUsuario, $passwd, $correo, $telefono) {
          $db = connectDB();
        if ($db != NULL) {
            
            // insert command specification 
            // $query='INSERT INTO productos (nombre,imagen) VALUES (?,?) ';
            $query= 'INSERT INTO Usuario (idUsuario,nombreUsuario,passwd,correo,telefono) VALUES (?,?,?,?,?)';
//            $query='INSERT INTO Evento (idEvento,nombreEvento,descripcionEvento,fechaCreacion,statusEvento,idEncuesta,idCliente,idCoordinador) VALUES (?,?,?,?,?,?,?,?)';

            // Preparing the statement 
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("ss", $idUsuario, $nombreUsuario, $passwd, $correo, $telefono)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              } 

            
            mysqli_free_result($results);
            disconnectBD($db);
            return true;
        } 
        return false;
    }
    
?>