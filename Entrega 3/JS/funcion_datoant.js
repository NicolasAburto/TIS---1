function mostrardia(){
    document.getElementById('dia').style.display = 'block';
    document.getElementById('semana').style.display = 'none';
    document.getElementById('semana').value = "";
    document.getElementById('mes').style.display = 'none';
    document.getElementById('mes').value = "";

}

function mostrarsemana(){
    document.getElementById('dia').style.display = 'none';
    document.getElementById('dia').value = "";
    document.getElementById('semana').style.display = 'block';
    document.getElementById('mes').style.display = 'none';
    document.getElementById('mes').value = "";
}

function mostrarmes(){
    document.getElementById('dia').style.display = 'none';
    document.getElementById('dia').value = "";
    document.getElementById('semana').style.display = 'none';
    document.getElementById('semana').value = "";
    document.getElementById('mes').style.display = 'block';
}

function mostrargrafico(){
    var x = document.getElementById("graph");
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
