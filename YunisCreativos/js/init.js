(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('#modal1').modal('open'); 
 

  }); // end of document ready
})(jQuery); // end of jQuery name space

 $(document).ready(function() {
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('.modal').modal();
    $(".dropdown-button").dropdown();
    $('#textarea1').val('New Text');
    $('#textarea1').trigger('autoresize');
  });
  
            