<?php include("partial/_navbarCEO.html") ?>
<div class="container">
    <article>
        <header>
            <h1>Consultar Usuarios</h1>
        </header>
        <table class="table">
            <thead class="thead-dark">
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
                <th class="thead-dark">Name</th>
                <th class="thead-dark">Edad</th>
                <th class="thead-dark">Estado</th>
                <th class="thead-dark">Correo|Tel</th>
                <th class="thead-dark">Talla</th>

            </tr>
            </thead >

            <tbody>
            <tr>

                <td>Raúl Moncayo</td>
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

                <td>Jonnah Hill</td>
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
        <table class="table">
            <thead class="thead-dark">
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

                <td>John Cena</td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2009</td>
                <td>EC</td>
            </tr>
            <tr>

                <td>Álvaro Álvarez</td>
                <td>52</td>
                <td>Guanajuato</td>
                <td>477 113 2010</td>
                <td>XL</td>
            </tr>
            <tr>

                <td>Xavier García</td>
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