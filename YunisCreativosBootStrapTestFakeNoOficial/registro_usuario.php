<?php include("partial/_navbarCEO.html"); ?>
<div class="container">
    <article>
        <header>
            <h2>Forma de Registro:</h2>
        </header>
        <form>
            <div class="form-group"
                <label>Rol:</label>
                <select class="form-control" id="estados">
                    <option> </option>
                    <option>Invitado</option>
                    <option>Coordinador</option>
                    <option>Empleado</option>
                    <option>CEO</option>
                </select>
            </div>
            <br>
            <div class="form-group">
              <label for="nombre">Nombre completo:</label>
              <input type="text" class="form-control" id="usr">
            </div>
            <br>
            <br>
            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">Correo:</label>
              <div class="col-10">
                <input class="form-control" type="email" value="correo@ejemplo.com" id="example-email-input">
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
             <div class="form-group row">
              <label for="example-tel-input" class="col-2 col-form-label">Teléfono:</label>
              <div class="col-10">
                <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
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
            <br>
           
            <button class="btn waves-effect waves-light grey darken-3" type="submit" name="action">Registrar</button><br><br>
        </form>
        <br><br><br>
        <footer></footer>
    </article>
</div>
<?php include("partial/_footer.html"); ?>
