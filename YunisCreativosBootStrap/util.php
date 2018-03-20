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
                 echo '<td>'.$row["descripcionEvento"].'</tf>';
                 echo '<td>'.$row["statusEvento"].'</tf>';
                 echo '<td>'.$row["califPromedio"].'</tf>';
                 echo '<td>'.$row["Cliente"].'</tf>';
                 echo '<td>'.$row["Coordinador"].'</tf>';
            }
        }
    }
}

function getStaffEvento(){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = '';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
    }
}

?>