<?php
    session_start();
    require_once("util.php");
  
    if( isset($_SESSION["idRol"]) && ($_SESSION["idRol"]==1492) ){
        include('partial/statusRegistroEliminarStaff.html');
        unset($_SESSION["staffStatusSuccess"]);
        unset($_SESSION["staffStatusError"]);
        $idDiseno = $_POST["idDiseno"];
        $nombrePlantilla = $_POST["nombrePlantilla"];
        $colorFondo = $_POST["colorFondo"];
        $colorTexto = $_POST["colorTexto"];
        $nombreImagen = basename($_FILES["nombreImagen"]["name"]);
        
        echo 'id Diseno: '.$idDiseno.'<br>';
        echo 'nombre Plantilla: '.$nombrePlantilla.'<br>';
        echo 'color fondo: '.$colorFondo.'<br>';
        echo 'color texto: '.$colorTexto.'<br>';
        echo 'nombre Imagen: '.$nombreImagen.'<br>';
        //die('');
        
        if ($nombreImagen==""){
            if(modificarPlantillaNoImagen($nombrePlantilla, $colorFondo, $colorTexto, $idDiseno)){
                $_SESSION["staffStatusSuccess"] = "Se ha modificado la plantilla exitosamente";
                unset($_SESSION["staffStatusError"]);
            }
        }else if ($nombreImagen != ""){
            unset($_SESSION["error_archivo"]);
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["nombreImagen"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            
                $check = getimagesize($_FILES["nombreImagen"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $_SESSION["error_archivo"] = "El archivo no es una imagen";
                    $uploadOk = 0;
                }
            
            // Check if file already exists
            if (file_exists($target_file)) {
                 $_SESSION["error_archivo"] =  "El archivo ya existe";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["nombreImagen"]["size"] > 500000) {
                $_SESSION["error_archivo"] =  "El archivo es demasiado grande.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $_SESSION["error_archivo"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["nombreImagen"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["nombreImagen"]["name"]). " has been uploaded.";
                     $_SESSION["ruta_archivo"] = $target_file;
                } else {
                    $_SESSION["error_archivo"] =  "Sorry, there was an error uploading your file.";
                }
            }
            
            if(isset($_SESSION["error_archivo"])) {
                $_SESSION["error_archivo"] = "Si se esta procesando el archivo";
                header("location:plantillas.php");
            }
            if(modificarPlantillaImagen($nombrePlantilla, $colorFondo, $colorTexto,  basename($_FILES["nombreImagen"]["name"]), $idDiseno)){
                $_SESSION["staffStatusSuccess"] = "Se ha modificado la plantilla exitosamente";
                unset($_SESSION["staffStatusError"]);
            }
        }else{
            $_SESSION["staffStatusError"] = "Hubo un error con la modificación, inténtalo de nuevo más tarde";
            unset($_SESSION["staffStatusSuccess"]);
        }
        header('location:plantillas.php');
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
?>