<?php include("partial/_navbarCEO.html"); ?>

<div class="container">
 <h2>Registrar Evento</h2>
 <br>
    <form>
      <div class="form-group">
        <div>
          <label>Nombre evento</label>
          <input placeholder="Nombre" id="nombre_evento" type="text" class="form-control">
             <br><br>
        </div>
        <div "form-group">
          <label>Descripción del evento</label>
          <textarea id="" class="form-control"></textarea>
        </div><br>
        <div>
           <div class="form-group">
              <label for="sel1">Seleccionar Coordinador:</label>
              <select class="form-control" id="sel1">
                <option>Pedro García Perez</option>
                <option>Rodolfon Hernández Rodríguez</option>
                <option>Gonzalo Ramírez Ramírez</option>
                <option>Juan Cameron</option>
                
              </select>
              <br>
              <label for="sel2">Seleccionar Staff: (hold shift to select more than one):</label>
              <select multiple class="form-control" id="sel2">
                <option>Raul García Perez</option>
                <option>Ramón Hernández Rodrígue</option>
                <option>Guillermo Ramírez Ramírez</option>
                <option>Joaquín González Sáncez</option>
                <option>Brian Sánchez López</option>
              </select>
            </div><br>
            <label>Seleccionar Plantillas</label>
            <select class="form-control">
              <option value="" disabled selected>Selecciona la plantilla</option>
              <option value="1">Las Vegas</option>
              <option value="2">Machu Pichu</option>
              <option value="3">Oaxaca</option>
            </select><br>
      </div>
     </form>
     <button class="btn" type="submit" name="action">Ingresar</button><br><br><br>
    </div>
     
<?php include("partial/_footer.html");