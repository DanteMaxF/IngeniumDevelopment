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
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Yunis Creativos</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <br><br>
        <h1 class="header center white-text text-lighten-2">Plantillas de diseño</h1>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="Images/background1.jpg" alt="Unsplashed background img 1"></div>
        
  </div>
  <div class="container">
       <!-- Modal Trigger -->
       <a class="waves-effect waves-light btn modal-trigger black" href="#modal1" style="float:right;">Agregar Plantilla</a>

      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Agregar Plantilla</h4>
          <p>
             <form>
                        <p>
                            <label>Nombre de la Plantilla:
                                <input id="icon_prefix" type="text" class="validate" required/>
                            </label>
                        </p>
                        <br>
                        <p>
                          <label>Color texto:
                                <input type="color">
                          </label>
                        </p>
                        <br>
                         <p>
                          <label>Color fondo:
                                <input type="color">
                          </label>
                        </p>
                        <br>
                        <p>
                          <label>Color botones:
                                <input type="color">
                          </label>
                        </p>
                        <br>
                         <p>
                           <label>Adjuntar Imagen:
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Archivo</span>
                              <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>
                          </label>
                        </p>
                        <br><br>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                          <i class="material-icons right">send</i>
                        </button>
                        <br><br>
                        
              </form>
          </p>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
      </div>
       <div class="container">
       <!-- Modal Trigger -->
       <div><a class="modal-trigger" href="#modal2">
         
         <div class="container">
    <article>
  
        <table class="bordered striped black-text" >
            <thead>
            <h3 class="black-text">Plantillas Registradas:</h3>
              <tr>
                <th>Nombre plantilla</th>
                <th>Color Fuente</th>
                <th>Color botones</th>
                <th>Dirección de la imágen</th>
            </tr>
            </thead>

            <tbody>
            <tr>

                <td>Vegas</td>
                <td>#b3ffb3</td>
                <td>#ffb366</td>
                <td>477 113 2009</td>
                <td><button> <div><a class="btn-floating btn-flat black"><i class="large material-icons">mode_edit</i></a></div></button></button></td>
                 <td><button> <div><a class="btn-floating btn-flat red"><i class="large material-icons">delete</i></a></div></button></button></td>
            </tr>
            <tr>

                <td>Machu Pichu</td>
                <td>#ffb366</td>
                <td>#ffb366</td>
                <td>477 113 2010</td>
                <td><button> <div><a class="btn-floating btn-flat black"><i class="large material-icons">mode_edit</i></a></div></button></button></td>
                 <td><button> <div><a class="btn-floating btn-flat red"><i class="large material-icons">delete</i></a></div></button></button></td>

            </tr>
            <tr>

                <td>Los Cabos</td>
                <td> #ffa31a</td>
                <td>#9999ff</td>
                <td>477 113 2011</td>
                <td><button> <div><a class="btn-floating btn-flat black"><i class="large material-icons">mode_edit</i></a></div></button></button></td>
                <td><button> <div><a class="btn-floating btn-flat red"><i class="large material-icons">delete</i></a></div></button></button></td>

            </tr>
            </tbody>
        </table>
            
        <br><br><br>
    </article>
</div>
       </a></div>
      <br>
      <br>
  </div>
  <footer class="page-footer black">
    <div class="container">
      <div class="row">
      
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>
