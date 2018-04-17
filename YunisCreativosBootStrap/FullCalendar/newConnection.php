<?php
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "YunisCreativos";
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check Connection
    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }

    $con->set_charset('utf8');

    return $con;    
}

function disconnect($bdd){
       mysqli_close($bdd);
}
?>
