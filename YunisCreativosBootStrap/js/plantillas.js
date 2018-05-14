function myFunction(e){
    alert(e.dataset.label)
}


function myScript(){
    let inputFile = document.getElementById("customFileLang")
    
    inputFile.addEventListener("change", myFunction, false);
}


window.addEventListener("load", myScript);