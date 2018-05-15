function myFunction(e){
    alert(e.dataset.label)
}


function myScript(){
    let inputFiles = document.querySelectorAll(".custom-file-input");
    
    inputFiles.forEach(function(inputFile){
        inputFile.addEventListener("change", function(event) {
            let inputLabel = document.getElementById("labelFile" + event.target.dataset.label);
            inputLabel.innerHTML = "Cambiar imagen: " + event.target.value;
        });
    });
}


window.addEventListener("load", myScript);