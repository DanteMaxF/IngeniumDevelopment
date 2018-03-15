<?php
//CONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function connectDB(){
  $mysql = mysqli_connect("localhost","andresyunis","","rbac");
  $mysql->set_charset("utf8");
  return $mysql;
}

//DESCONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function disconnectDB($mysql){
  mysqli_close($mysql);
}

//FUNCION PARA VERIFICAR EL LOGIN
function login($user, $passwd) {
  $db = connectDB();
  if ($db != NULL) {

    //Specification of the SQL query
    $query='SELECT Id_Usuario FROM usuario WHERE Id_Usuario="'.$user.
        '" AND Contrasena="'.$passwd.'"';
  
    
    //var_dump($query);
    //die('');
     // Query execution; returns identifier of the result group
    $results = $db->query($query);
     // cycle to explode every line of the results

    if (mysqli_num_rows($results) > 0)  {
      // it releases the associated results
      mysqli_free_result($results);
      disconnectDB($db);
      return true;
    }
    return false;
  }
  return false;
}


//DEVUELVE EL NOMBRE DEL USUARIO BASANDOSE EN EL ID
function getName($id){
  $db = connectDB();
  if ($db != NULL) {
    //Guardar query en una variable
    $query = 'SELECT Nombre FROM usuario WHERE Id_Usuario="'.$id.'"';
    //Ejecutar query y guardar en $results
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    
    //Verificar que el query encontro resultados
    if (mysqli_num_rows($results) > 0)  {
      //Guardar resultados en un string
      if($row = mysqli_fetch_assoc($results)){
        $res ="".$row["Nombre"]."";
      }else{
        $res = "-1";
      }
    }
    //Liberar resultados del query
    mysqli_free_result($results);
  }
  //Devolver nombre del usuario
  return $res;
}

function getFromUser($id,$column){
  $db = connectDB();
  if ($db != NULL) {
    //Guardar query en una variable
    $query = 'SELECT '.$column.' FROM usuario WHERE Id_Usuario="'.$id.'"';
    //Ejecutar query y guardar en $results
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    
    //Verificar que el query encontro resultados
    if (mysqli_num_rows($results) > 0)  {
      //Guardar resultados en un string
      if($row = mysqli_fetch_assoc($results)){
        $res ="".$row["".$column.""]."";
      }else{
        $res = "-1";
      }
    }
    //Liberar resultados del query
    mysqli_free_result($results);
  }
  //Devolver nombre del usuario
  return $res;
}

//Para testear
//var_dump($query);
//die('');
function getRol($id){
  $db = connectDB();
  if($db != NULL){
    $query = 'SELECT id_Rol FROM roles_usuario WHERE id_Usuario = "'.$id.'"';
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    
    if(mysqli_num_rows($results) > 0){
      if($row = mysqli_fetch_assoc($results)){
        $res ="".$row["id_Rol"]."";
      }else{
        $res = "-1";
      }
    }
    mysqli_free_result($results);
  }
  return $res;
}


function updatePersonalInfo($username,$apellido,$cumple,$passwd,$id){
  $db = connectDB();
  if ($db != NULL){
    $query = 'UPDATE usuario SET Nombre="'.$username.'", Apellidos="'.$apellido.'", Fecha_Nacimiento="'.$cumple.'", Contrasena="'.$passwd.'" WHERE id_Usuario = "'.$id.'"';
    $results = mysqli_query($db,$query);
    var_dump($query);
    
    disconnectDB($db);
    echo $results;
  }
}


function getArea($id){
  $db = connectDB();
  if($id != NULL){
    $query = 'SELECT * FROM trabajadores_areatrabajo WHERE Id_AreaTrabajo ="'.$id. '"'; 
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    
    if(mysql_num_rows($results) > 0){
        
      echo '<table class="striped responsive-table">';
      echo '<thead><tr>';
        echo '<th>Id_AreaTrabajo</th>';
      echo '<th>Id_Usuario</th>';
      echo '</tr></head>';
      echo '<tbody>'; 
      
    }
    while($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        echo "<td>".$row["Id_AreaTrabajo"]."</td>";
        echo "<td>".$row["Id_Usuario"]."</td>";
    echo "</tr>";
      
    }
      echo '</tbody>';
      echo "</table>";
  }
}




  
function getUserInfo($id) {
  $db = connectDB();
  if($db != NULL){
    $query = 'SELECT * FROM usuario WHERE Id_Usuario="'.$id.'"';
    $results = mysqli_query($db,$query);
    disconnectDB($db);
    
    if(mysqli_num_rows($results) > 0) {
      
      echo '<table class="striped responsive-table">';
      echo '<thead><tr>';
        echo '<th>Id Usuario</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '<th>Fecha de Creación</th>';
        echo '<th>Fecha de Nacimiento</th>';
        echo '<th>Balance</th>';
        echo '<th>Estado</th>';
      echo '</tr></head>';
      echo '<tbody>';
      
      while($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        echo "<td>".$row["Id_Usuario"]."</td>";
        echo "<td>".$row["Nombre"]."</td>";
        echo "<td>".$row["Apellidos"]."</td>";
        echo "<td>".$row["Fecha_Creacion"]."</td>";
        echo "<td>".$row["Fecha_Nacimiento"]."</td>";
        echo "<td>".$row["Balance"]."</td>";
        echo "<td>".$row["Habilitado"]."</td>";
        echo "</tr>";
      }
      
      echo '</tbody>';
      echo "</table>";
      
    }
  }
}

?>
