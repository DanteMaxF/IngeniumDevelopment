<?php include("_navbarCEO.html"); ?>
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <br><br>
            <h1 class="header center teal-text text-lighten-2">[Nombre Evento]</h1>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="Images/background1.jpg" alt="Unsplashed background img 1"></div>

</div>
<div class="container">
    <article>
        <header>
            <h2>Forma de Registro:</h2>
        </header>
        <form>
            <p>
                <label>
                    <i class="material-icons prefix">account_circle</i>Nombre completo:
                    <input id="icon_prefix" type="text" class="validate" required/>
                </label>
            </p>
            <br>
            <p>
                <label>Fecha Nacimiento:
                    <input type="date" class="validate" required/>
                </label>
            </p>
            <br>
            <p>
                <label>Estado:
                    <div class="input-field col s1, validate ">
                        <select>
                            <option value="" disabled selected>Selecciona tu estado</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Querétaro">Querétaro</option>
                        </select>
                    </div>
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
            <p>
                <label>Confirmar asistencia:
            <p>
                <input name="group1" type="radio" id="test1" />
                <label for="test1">Asistiré</label>
            </p>
            <p>
                <input name="group1" type="radio" id="test2" />
                <label for="test2">No asistiré</label>
            </p>
            </label>
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
            <br>
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
            <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                <i class="material-icons right">send</i>
            </button>
            <br><br>


        </form>
        <footer></footer>
    </article>
</div>

<?php include("_footer.html"); ?>
