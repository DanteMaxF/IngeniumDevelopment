<?php include("_navbarCEO.html"); ?>
<div class="container">
    <article>
        <header>
            <h2>Forma de Registro:</h2>
        </header>
        <form>

            <div>
                <label>Rol:
                    <div class="input-field col s1, validate ">
                        <select>
                            <option value="" disabled selected> --- </option>
                            <option value="Dir">Director General.</option>
                            <option value="Coordinador">Coordinador</option>
                            <option value="Staff">Staff</option>
                            <option value="Guanajuato">Cliente</option>
                            <option value="Querétaro">Invitado</option>
                        </select>
                    </div>
                </label>



            </div>
            <p>
                <label>
                    <i class="material-icons prefix">account_circle</i>Nombre completo:
                    <input id="icon_prefix" type="text" class="validate" required/>
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
           <br> <br>
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

            <br>

            <br>

          
            <br>
            <br>
            <button class="btn waves-effect waves-light grey darken-3" type="submit" name="action">Registrar
                <i class="material-icons right ">send</i>
            </button>
            <br><br>


        </form>
        <footer></footer>
    </article>
</div>
<?php include("_footer.html"); ?>
