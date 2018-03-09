<?php include("partial/_navbarCEO.html"); ?>

<div class="container">
  <!-- Button to Open the Modal -->
  <div class="float-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Agregar Plantilla
  </button></div>
  <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Registrar Plantilla</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
             <form>
                 <div class="form-group">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre plantilla">
                  </div>
                <br>
                <label>Color texto:</label>
                <div class="col-10">
                  <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                </div>
                <br>
                <label>Color fondo:</label>
                <div class="col-10">
                  <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                </div>
                <br>
                <label>Color botones:</label>
                <div class="col-10">
                  <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                </div>
                <br>
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo:</label>
                 </div>
                  <br><br>
                  <button class="btn waves-effect waves-light" type="submit" name="action">Registrar</button>
                  <br><br>
                </form>
          </div>
    
          <!-- Modal footer -->
        </div>
      </div>
    </div>
       
      
        <article>
        <h3 class="black-text">Plantillas Registradas:</h3><br>
        <table class="table" >
            <thead class="thead-dark">
              <tr>
                <th>Nombre plantilla</th>
                <th>Color Fuente</th>
                <th>Color botones</th>
                <th>Dirección de la imágen</th>
                <th> </th>
                <th> </th>
            </tr>
            </thead>

            <tbody>
            <tr>

                <td>Vegas</td>
                <td>#b3ffb3</td>
                <td>#ffb366</td>
                <td>imagen1.jpg</td>
                <td><a href="#"></a><span class="glyphicon glyphicon-edit"></span></a></td>
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