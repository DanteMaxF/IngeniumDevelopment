<?php include("partial/_navbarCoordinador.html") ?>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <br><br>
        <h1 class="header center white-text text-lighten-2">[Nombre Evento]</h1>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="Images/background1.jpg" alt="Unsplashed background img 1"></div>
        
  </div>
  <div class="container">
       <!-- Modal Trigger -->
       

      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Registrar Actividad</h4>
          <p>
             <form>
                        <p>
                          <label>Descripción:
                                <!--No cambia el tamaño del campo de registro-->
                                <textarea name="message" rows="10" cols="30"  style="height=500px;" class="materialize-textarea" ></textarea>
                                <br>
                          </label>
                        </p>
                        <br>
                        <p>
                            <label>Fecha y hora de inicio: 
                                <input type="datetime-local" class="validate" required/>
                            </label>
                        </p>
                        <br>
                         <p>
                            <label>Fecha y hora de fin: 
                                <input type="datetime-local" class="validate" required/>
                            </label>
                        </p>
                        
                        <p>
                          <label>Seleccionar Ubicación:</label>
                        </p>
                        <center><img src="Images/GoogleMaps.PNG" alt="GoogleMaps demo" width="90%"/></center>
                        <br><br>
                        <p>
                          <div class="switch">
                            <label> Evento Sorpresa: 
                              Off
                              <input type="checkbox">
                              <span class="lever"></span>
                               On
                            </label>
                          </div>
                        </p>
                        <br><br>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                          <i class="material-icons right">send</i>
                        </button>
                        <br><br>
                        
              </form>
          </p>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
      </div>
       <div class="container">
       <!-- Modal Trigger -->
       <div><a class="modal-trigger" href="#modal2"><img src="Images/CalendarioUsuario.PNG" alt="Full Callendar" width="100%"></a></div>

      <!-- Modal Structure -->
      <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Consultar Actividad</h4>
          <p>
             <form>
                        
                        <p>
                          <label>Descripción:</label> 
                          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                          Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                          Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                          Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                          a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
                        </p>
                        <p>
                          <label>Ubicación:</label>
                        </p>
                        <center><img src="Images/GoogleMaps.PNG" alt="GoogleMaps demo" width="90%"/></center>
                        <br><br>
                        <p>
                            <label>Evento Sorpresa: [On / OFF]</label>
                        </p>
                        <br><br>
              </form>
          </p>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
      </div>
      <br>
      <br>
      
  </div>
 <?php include("partial/_footer.html")?>