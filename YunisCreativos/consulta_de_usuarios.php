<?php include("partial/_navbarCEO.html") ?>
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <br><br>
            <h1 class="header center teal-text text-lighten-2"> </h1>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="Images/background1.png" alt="Unsplashed background img 1"></div>

</div>
<div class="container">
    <article>
        <header>
            <h1>Consultar Usuarios</h1>
        </header>
        <table class="bordered striped">
            <thead>
            <h3>Invitados</h3>
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
                    <label>Evento
                        <div class="input-field col s1, validate ">
                            <select>
                                <option value="" disabled selected> --- </option>
                                <option value="Dir">Evento</option>
                                <option value="Coordinador">Evento mejorado</option>
                                <option value="Staff">Evento 2000</option>
                                <option value="Guanajuato">Súper Evento</option>
                                <option value="Querétaro">Evento</option>
                            </select>
                        </div>
                    </label>
                </div>
            </form>

                    <tr>
                <th>Name</th>
                <th>Edad</th>
                <th>Estado</th>
                <th>Correo|Tel</th>
                <th>Talla</th>

            </tr>
            </thead>

            <tbody>
            <tr>

                <td>Raúl</td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2009</td>
                <td>EC</td>
            </tr>
            <tr>

                <td>Alvin Yakitori</td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2010</td>
                <td>XL</td>
            </tr>
            <tr>

                <td></td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2011</td>
                <td>M</td>
            </tr>
            </tbody>
        </table>

            <br>

            <br>

          
            <br>
            <br>
        <table class="bordered striped">
            <thead>
            <h3>Empresarial</h3>
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
                    <label>Evento
                        <div class="input-field col s1, validate ">
                            <select>
                                <option value="" disabled selected> --- </option>
                                <option value="Dir">Evento</option>
                                <option value="Coordinador">Evento mejorado</option>
                                <option value="Staff">Evento 2000</option>
                                <option value="Guanajuato">Súper Evento</option>
                                <option value="Querétaro">Evento</option>
                            </select>
                        </div>
                    </label>
                </div>
            </form>

            <tr>
                <th>Name</th>
                <th>Edad</th>
                <th>Estado</th>
                <th>Correo|Tel</th>
                <th>Talla</th>

            </tr>
            </thead>

            <tbody>
            <tr>

                <td>Raúl</td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2009</td>
                <td>EC</td>
            </tr>
            <tr>

                <td>Alvin Yakitori</td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2010</td>
                <td>XL</td>
            </tr>
            <tr>

                <td></td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2011</td>
                <td>M</td>
            </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Borrar
                <i class="material-icons right">send</i>
            </button>

        <button class="btn waves-effect waves-light" type="submit" name="action">Modificar
            <i class="material-icons right">send</i>
        </button>
        <br><br>


    </article>
</div>
<?php include("partial/_footer.html")?>