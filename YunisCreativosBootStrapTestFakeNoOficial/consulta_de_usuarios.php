<?php include("partial/_navbarCEO.html") ?>
<div class="container">
    <article>
        <header>
            <h1>Consultar Usuarios</h1>
        </header>
        <table class="table">
            <thead class="thead-dark">
            <form>
            <div class="form-group"
                <label>Rol:</label>
                 <select class="form-control" id="estados">
                    <option>-</option>
                    <option>Invitado</option>
                    <option>Coordinador</option>
                    <option>Empleado</option>
                    <option>CEO</option>
                   </select>
            </div>
            <div class="form-group"
                <label>Evento:</label>
                 <select class="form-control" id="evento">
                    <option> </option>
                    <option>Las Vegas</option>
                    <option>Machu Pichu</option>
                    <option>San Miguel</option>
                    <option>Cancún</option>
                   </select>
            </div>
            </form>
            <h3>Invitados</h3>
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
        <button class="btn waves-effect waves-light" type="submit" name="action">Borrar</button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modificar</button>
        <br><br>
    </article>
</div>
<?php include("partial/_footer.html")?>