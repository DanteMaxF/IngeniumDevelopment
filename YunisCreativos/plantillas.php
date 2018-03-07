<?php include("partial/_navbarCEO.html"); ?>
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
  <!--<div class="container">-->
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
     <!--</div>Terminar modal-->
       </div><a class="modal-trigger" href="#modal2">
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
                <td>imagen1.jpg</td>
                <td><a href="plantillas.php"><i class="medium material-icons">mode_edit</i></a></td>
                <td><a href="plantillas.php"><i class="medium material-icons">delete</i></a></td>
            </tr>
            <tr>

                <td>Machu Pichu</td>
                <td>#ffb366</td>
                <td>#ffb366</td>
                <td>imagen2.jpg</td>
                <td><a href="plantillas.php"><i class="medium material-icons">mode_edit</i></a></td>
                <td><a href="plantillas.php"><i class="medium material-icons">delete</i></a></td>

            </tr>
            <tr>

                <td>Los Cabos</td>
                <td> #ffa31a</td>
                <td>#9999ff</td>
                <td>imagen3.jpg</td>
               <td><a href="plantillas.php"><i class="medium material-icons">mode_edit</i></a></td>
                <td><a href="plantillas.php"><i class="medium material-icons">delete</i></a></td>
            </tr>
            </tbody>
        </table>
            
        <br><br><br>
    </article>
    </div>
</div>
      <br>
      <br>
 <?php include("partial/_footer.html"); ?>