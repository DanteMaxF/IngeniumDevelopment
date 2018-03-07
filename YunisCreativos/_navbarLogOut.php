<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Parallax Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
<header>
  
      <div class="padd">
           <div><a><img src="images/logo.png" alt="Image logo1" style="float:left ;width:90px;height:90px;"></a></div>
          <div class="small-12 medium-10 large-8 columns" tex-align="center"><h1>Yunis Creativos</h1></div>
      </div>
    
    <nav>
    <div class="nav-wrapper grey darken-3">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="">Ingresar a Evento</a></li>
        <li><a href="">Acerca de Yunis Creativos</a></li>
        <li><a href="">Contacto</a></li>
      </ul>

        <ul class="right">
            <li><a class="modal-trigger" href="#modal1"><i class="material-icons">account_circle</i></a></li>
        </ul>

        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <?php include("Login.html"); ?>
            </div>

            <div class="modal-footer">
                <a href="home_coordinador.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</a>
            </div>
        </div>










        <ul class="side-nav" id="mobile-demo">
          <li><a href="">Ingresar a Evento</a></li>
        <li><a href="">Acerca de Yunis Creativos</a></li>
        <li><a href="">Contacto</a></li>
      </ul>
    </div>
  </nav>

</header>
