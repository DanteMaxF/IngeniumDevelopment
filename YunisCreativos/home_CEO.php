<?php include("partial/_navbarCEO.html"); ?>
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
  <div class="container">
      <br>
      <br>
      <h2 class="align-left">Evento Las Vegas Acme Tools</h2>
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
      <h2>Evento Machu Pichu Wayne Industries</h2>
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
  </div>
  <script>
     $(document).ready(function(){
      $('.slider').slider();
    });
  </script>
<?php include("partial/_footer.html"); ?>

