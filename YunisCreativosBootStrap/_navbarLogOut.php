<!DOCKTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Yunis Creativos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#codigo">Ingresar Código</a>
            </li>
            <li class="nav-item">
                 <a href="#nosotros">Acerca de nosotros</a>
            </li>

            <li class="nav-item">
                <a href="#contacto">Contactos</a>
            </li>

            <li class="nav-item">
                <a href="home_invitado.php">Home Invitado</a>
            </li>

            <li class="nav-item">
                <a href="home_coordinador.php">Home Coordinador</a>
            </li>

            <li class="nav-item">
                <a href="home_empleado.php">Home Empleado</a>
            </li>


        </ul>
    </div>
</nav>

<br>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<ul class="right">
    <li><a class="modal-trigger" href="#modal1"><i class="material-icons">account_circle</i></a></li>
</ul>

<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <?php include("_login.html"); ?>
    </div>
