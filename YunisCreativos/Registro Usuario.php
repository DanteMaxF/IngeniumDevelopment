<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>main-page-usuario</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<header>
    <div class="logo-header row">
        <div class="col-sm-1 s2" ><a><img src="images/logo.png" alt="Image logo1" style="width:80px; height: 80px;"></a></div>
        <div class="col-sm-2 s10">Yunis Creativos</div>
    </div>
    <nav >
        <div class="parent">
            <div class="child">
                <ul>
                    <li class="button"><a  href="#">boton 1</a></li>
                    <li class="button"><a href="#">Botón 2</a></li>
                    <li class="button"><a href="#">Botón 3</a></li>

                </ul>

            </div>
            <div class="Login"><i class="large material-icons">account_circle </i></div>
        </div>




    </nav>
</header>









<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <br><br>
            <h1 class="header center teal-text text-lighten-2"> </h1>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="Images/background1.png" alt="Unsplashed background img 1"></div>

</div>
<div class="container">
    <article>
        <header>
            <h2>Forma de Registro:</h2>
        </header>
        <form>

            <div>
                <label>Rol:
                    <div class="input-field col s1, validate ">
                        <select>
                            <option value="" disabled selected> --- </option>
                            <option value="Dir">Director General.</option>
                            <option value="Coordinador">Coordinador</option>
                            <option value="Staff">Staff</option>
                            <option value="Guanajuato">Cliente</option>
                            <option value="Querétaro">Invitado</option>
                        </select>
                    </div>
                </label>



            </div>
            <p>
                <label>
                    <i class="material-icons prefix">account_circle</i>Nombre completo:
                    <input id="icon_prefix" type="text" class="validate" required/>
                </label>
            </p>
            <br>
            <p>
                <label>*Correo:
                    <input type="email" placeholder="nombre@dominio.com" required/>
                </label>
            </p>
            <br>
            <p>
           <br> <br>
            <label>*Contraseña:
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" required/>
                        <label for="password">*Contraseña:</label>
                    </div>
                </div>
            </label>
            </p>
            <br>
            <p>
                <label>*Verificar contraseña:
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password-verificar" type="password" class="validate" required/>
                            <label for="password-verificar">Contraseña</label>
                        </div>
                    </div>
                </label>
            </p>

            <br>

                <label>
                    <i class="material-icons prefix">phone</i>Número de teléfono:
                    <input type="number" required/>
                </label>
            </p>
            <br>
            <p>
                <label>Talla:
                    <div class="input-field col s2 ">
                        <select>
                            <option value="" disabled selected>Selecciona tu talla</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                    </div>
                </label>
            </p>
            <br>

            <br>

            <br>

          
            <br>
            <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                <i class="material-icons right">send</i>
            </button>
            <br><br>


        </form>
        <footer></footer>
    </article>
</div>

<footer class="page-footer teal">
    <div class="container">
        <div class="row">

            <div class="container">
                Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
