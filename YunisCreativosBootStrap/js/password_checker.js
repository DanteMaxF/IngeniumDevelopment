var password = document.getElementById("passwd1")
  , confirm_password = document.getElementById("passwd2");


function validatePassword(){
  if(password.value.length < 8){
    confirm_password.setCustomValidity("La contraseña debe contener al menos 8 caracteres.");
  }
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Las contraseñas no coinciden.");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;