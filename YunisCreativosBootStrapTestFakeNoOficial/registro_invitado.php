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
            <p>
                <label>Confirmar asistencia:</label>
            <p>
                <input name="group1" type="radio" id="test1" />
                <label for="test1">Asistiré</label>
            </p>
            <p>
                <input name="group1" type="radio" id="test2" />
                <label for="test2">No asistiré</label>
            </p>
            
            </p>
            <br>
            <p>
                <label>*Idioma:
                    <div class="input-field col s1, validate ">
                        <select>
                            <option value="" disabled selected>Selecciona tu idioma/ Language</option>
                            <option value="esp">Español</option>
                            <option value="eng">English</option>
                        </select>
                    </div>
                </label>
            </p>
            <br
            <p>
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
            <p>
                <label>Datos Importantes (Alergias, Discapacidades, etc)
                    <!--No cambia el tamaño del campo de registro-->
                    <textarea name="message" rows="10" cols="30" placeholder="Alérgico al man"></textarea>
                    <br>
                </label>
            </p>
            <br>
            <button class="btn" type="submit" name="action">Registrar</button>
            <br><br>
        </form>
</div>

<?php include("partial/_footer.html"); ?>
