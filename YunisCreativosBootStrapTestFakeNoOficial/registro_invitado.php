<?php include("partial/_navbarCEO.html"); ?>
    <div class="container">
        <h2>Forma de Registro:</h2>
        <form>
            <div class="form-group">
              <label for="nombre">Nombre completo:</label>
              <input type="text" class="form-control" id="usr">
            </div>
            <br>
            <div class="form-group">
                <label for="fecha_nac">Fecha Nacimiento:</label>
                 <input type="date" class="form-control" id="usr">
            </div>
            <br>
            <div class="form-group"
                <label>Estado:</label>
                <select class="form-control" id="estados">
                    <option> </option>
                    <option>Estado de México</option>
                    <option>Guanajuato</option>
                    <option>Querétaro</option>
                    <option>Sinaloa</option>
                    <option>Veracruz</option>
                </select>
            </div>
            <br>
            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">Correo:</label>
              <div class="col-10">
                <input class="form-control" type="email" value="correo@ejemplo.com" id="example-email-input">
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="example-tel-input" class="col-2 col-form-label">Teléfono:</label>
              <div class="col-10">
                <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
              </div>
            </div>
            <br>
            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">Contraseña: </label>
              <div class="col-10">
                <input class="form-control" type="password" value="" id="example-password-input">
              </div>
            </div>
            <br>
            <p>
            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">Verificar Contraseña: </label>
              <div class="col-10">
                <input class="form-control" type="password" value="" id="example-password-input">
              </div>
            </div>
            <br>
            <div class="form-group"
                <label>Talla:</label>
                <select class="form-control" id="estados">
                    <option> </option>
                    <option>Chica (S)</option>
                    <option>Mediana (M)</option>
                    <option>Grande (L)</option>
                    <option>Extra Grande (XL)</option>
                    <option>Extra Extra Grande (XXL)</option>
                </select>
            </div>
            <br>
            <div>
                <label>Confirmar Asistencia:</label><br>
                <div class="radio">
                  <label><input type="radio" name="optradio"> Asistiré</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio"> No asistiré</label>
                </div>
            </div>
            <br>
            <div class="form-group"
                <label>Seleccionar Idioma:</label>
                <select class="form-control" id="estados">
                    <option> </option>
                    <option>Español</option>
                    <option>English</option>
                </select>
            </div>
            <br>
            <div class="form-group"
                <label>Alergias:</label>
                <select class="form-control" id="estados">
                    <option> </option>
                    <option>Mani</option>
                    <option>Nueces</option>
                    <option>Fresas</option>
                    <option>Camarones</option>
                    <option>Pescado</option>
                </select>
            </div>
            <br>
            <button class="btn" type="submit" name="action">Registrar</button>
            <br><br><br>
        </form>
</div>

<?php include("partial/_footer.html"); ?>
