//para validar que solo se acepte numeros
function solonumeros(e){

    key=e.keyCode || e.which;

    teclado=String.fromCharCode(key);

    numeros="0123456789";

    especiales="8-37-39-46";

    tecla_especial=false;

    for(var i in especiales){
        if(key==especiales[i]){
            tecla_especial=true;
        }
    }

    if(numeros.indexOf(teclado)==-1 && !tecla_especial){
        return false;
    }

}


//para asignar cada valor
function retornar(num){

    var anterior=document.fo.valores.value;

    document.getElementById("valores").value=anterior+num;

}

//para eliminar ultimo caracter
function eliminar(){

    var anterior=document.fo.valores.value;

    var nuevovalor=anterior.substring(0,anterior.length-1);

    document.getElementById("valores").value=nuevovalor;
}

// para eliminar todo
function eliminar_todo(){
    document.fo.valores.value="";
}