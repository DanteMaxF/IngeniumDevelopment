<?php include("partial/_navbarCEO.html"); ?>
<h2>Crear Evento</h2>
<br><br>
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div>
          <label>Nombre evento</label>
          <input placeholder="Nombre" id="nombre_evento" type="text" class="validate">
             <br><br>
        </div>
        <div>
          <label>Descripción del evento</label>
          <textarea id="" class="materialize-textarea"></textarea>
       
        </div>
        <div class="input-field col s12">
            <label>Seleccionar Staff:</label>
            <br><br>
            <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Raul García Perez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Ramón Hernández Rodríguez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Guillermo Ramírez Ramírez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Joaquín González Sáncez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Brian Sánchez López</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">James Cameron</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">José Álvarez Arredondo</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Michael López Johnson</label>
            </p>
             <br><br><br>
        </div>
         <div class="input-field col s12">
            <label>Seleccionar Cooridinador:</label>
            <br><br>
            <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Pedro García Perez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Rodolfon Hernández Rodríguez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Gonzalo Ramírez Ramírez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">José González Sáncez</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Bernardo Sánchez López</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Juan Cameron</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Rpberto Álvarez Arredondo</label>
            </p>
             <p>
              <input type="checkbox" class="filled-in" id="staff" checked="checked" />
              <label for="filled-in-box">Miguel López Johnson</label>
            </p>
             <br><br><br>
        </div>
      
      
            <select>
              <option value="" disabled selected>Selecciona la plantilla</option>
              <option value="1">Las Vegas</option>
              <option value="2">Machu Pichu</option>
              <option value="3">Oaxaca</option>
            </select>
            <label>Seleccionar Plantillas</label>
      </div>
     </form>
    </div>
     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>
<?php include("partial/_footer.html");