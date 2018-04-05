var password = document.getElementById("passwd1")
  , confirm_password = document.getElementById("passwd2");


function validatePassword(){
  /*if(checkPassword(password.value)){
    password.setCustomValidity('Ya la cagaste prro');
  }*/
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Las contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;