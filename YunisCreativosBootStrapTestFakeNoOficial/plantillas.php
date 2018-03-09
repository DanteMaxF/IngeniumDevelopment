<?php include("partial/_navbarCEO.html"); ?>

<div class="container">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Agregar Plantilla
  </button>
  <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Consultar Actividad</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
             <form>
                <div>
                  <label>Nombre de la Plantilla:
                    <input id="icon_prefix" type="text" class="validate" required/>
                  </label>
                </div>
                <br>
                <div>
                  <label>Color texto:
                    <input type="color">
                  </label>
                </div>
                <br>
                <div>
                  <label>Color fondo:
                    <input type="color">
                  </label>
                </div>
                <br>
                <div>
                  <label>Color botones:
                    <input type="color">
                  </label>
                </div>
                <br>
                <div>
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
                  </div>
                  <br><br>
                  <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                    <i class="material-icons right">send</i>
                  </button>
                  <br><br>
                </form>
          </div>
    
          <!-- Modal footer -->
        </div>
      </div>
    </div>
       
      
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
<br>
<br>
 <?php include("partial/_footer.html"); ?>