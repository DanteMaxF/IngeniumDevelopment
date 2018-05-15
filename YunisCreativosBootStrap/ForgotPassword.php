<?php
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
 
 require_once("util.php");
    $error = NULL;
    unset($_SESSION["correo"]);
    unset($_SESSION["correoAux"]);
    include("partial/_contrasena.html");
       
        if ($_GET["correoinput"] == "") {
        
        } else {
         $_SESSION["correo"] =  $_GET["correoinput"];
          $_SESSION["correoAux"] = PasswordForgot($_SESSION["correo"]);
           $_SESSION["UsuarioCorreo"] =  GetUsuarioPassword($_SESSION["correo"]);
         
            //var_dump($_SESSION["correoAux"]);
             //var_dump($_SESSION["correo"]);
             //var_dump($_SESSION["UsuarioCorreo"]);
       
       // require'class.phpmailer.php';
        

          require 'PHPMailer/src/Exception.php';
          require 'PHPMailer/src/PHPMailer.php';
          require 'PHPMailer/src/SMTP.php';
       
         
            //Nuevo correo electronico.
            $mail = new PHPMailer(true);
         
         
            //Caracteres.
           // $mail->SMTPDebug = 2; 
            
            $mail->isSMTP(); 
            $mail->Host ='smtp.gmail.com';
             $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username ='yuniscreativospruebas';                 // SMTP username
            $mail->Password ='yuniscreativos1';    
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
             
           $mail->setFrom('yuniscreativospruebas@gmail.com','Yunis Creativos');

            //Dirección de envio y nombre.
             $mail->addAddress($_SESSION["correo"]);
            
            
            //Dirección a la que responderá destinatario.
            $mail->addReplyTo('yuniscreativospruebas@gmail.com','El lechero');

            
            //$mail->addCC('yuniscreativospruebas@gmail.com');

            
            $mail->isHTML(true);
            //Titulo email.
            $mail->Subject = "Recuperacion de Contraseña";
            //Cuerpo email con HTML.
            $mail->Body = "Estimado <b> " .$_SESSION["UsuarioCorreo"]. "</b>    su contraseña es: </br></br> <b>" .$_SESSION["correoAux"]; 
           
            
            
            if(!$mail->send()) {                    
                $error = "Ocurrió un error inesperado con él envió del correo electrónico, inténtelo de nuevo más tarde, disculpa las molestias.";
                echo $error;
            } else {
                $error = "Se envio correctamente el correo electrónico.";
                echo $error;
                 //header("location:index.php");
                
            }   
       
        

        }
 
 
?>
