<?php include("partial/_navbarCEO.html"); ?>
  <div class="container">
    <div class="form-group"
      <label>Seleccionar evento:</label>
      <select class="form-control" id="estados">
          <option> </option>
          <option>Las Vegas</option>
          <option>Machu Pichu</option>
          <option>Oaxaca</option>
          <option>Cancún</option>
      </select>
    </div>
    <h2 class="align-left">Evento Seleccionado</h2>
    <!-- Button to Open the Modal -->
    <img src="Images/CalendarioUsuario.PNG" data-toggle="modal" data-target="#myModal" alt="Full Callendar" width="100%">
    
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Consultar Actividad</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
             <form>
                            
                            <div>
                              <label>Descripción:</label> 
                              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                              Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                              Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                              Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                              a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
                            </div><br>
                            <div>
                              <label>Ubicación:</label>
                            </div><br>
                            <center><img src="Images/GoogleMaps.PNG" alt="GoogleMaps demo" width="90%"/></center>
                            <br><br>
                            <div>
                                <label>Evento Sorpresa: [On / OFF]</label>
                            </div>
                            <br><br>
                  </form>
          </div>
    
          <!-- Modal footer -->
    
        </div>
      </div>
    </div>
     <br><br>
      
</div>
<?php include("partial/_footer.html"); ?>

