//Aqui se evaluará si al registrar un usuario es un invitado o un miembro de la empresa
function testSelected(){
    var selected = document.getElementById("rol").value;
    console.log(selected);
    if (selected == 1495){
        document.getElementById("invitadoForm").style = 'visibility:visible';
        document.getElementById("fechaNacimiento").required = true;
        document.getElementById("Estado").required = true;
        document.getElementById("talla").required = true;
        document.getElementById("idioma").required = true;
        
    }else{
        document.getElementById("invitadoForm").style = 'visibility:hidden';
        document.getElementById("fechaNacimiento").required = false;
        document.getElementById("Estado").required = false;
        document.getElementById("talla").required = false;
        document.getElementById("idioma").required = false;
    }
}