<?php
    require("conexion.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aforo UCSC - FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <script type="text/javascript" src="JS/funcion_datoant.js"></script>
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
    ></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - FAQ
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active navbarlinks" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="envivo.php">En Vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="datosanteriores.php">Datos anteriores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="faq.php">FAQ</a>
                </li>

                <a href="acceso.php">
                    <span class="material-icons iconousuario text-black">
                        account_circle
                    </span>
                </a>
            </ul>
        </div>
    </nav>

    <div class="fondoportal">
        <div class="faq_capacontainer">
            <div class="container">
                <div class="row ">  
                    <div class="col-lg-12">
                        <h1 class="faq_titulo mt-5" align="center">Preguntas frecuentes</h1>
                    </div>

                    <div class="col-lg-12">
                        <div class="accordion w-100 mt-3" id="basicAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed faq_accordion_pregunta" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    ¿El contador en vivo muestra la información en tiempo real?
                                </button>
                                </h2>
                                <div id="basicAccordionCollapseOne" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-mdb-parent="#basicAccordion" style="">
                                <div class="accordion-body">
                                    <strong>Así es!!</strong> 
                                    <br>
                                    Toda la información presente en la sección <strong>En vivo</strong> está actualizada en tiempo real con lo que ocurre en la universidad.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed faq_accordion_pregunta" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    ¿Cómo acceder correctamente a un edificio?
                                </button>
                            </h2>
                                <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="headingTwo" data-mdb-parent="#basicAccordion" style="">
                                <div class="accordion-body">
                                    <strong>Debes registrarte en los totems en la entrada de cada edificio.</strong>
                                    <br>
                                    Debes ingresar tu Rut de usuario, 
                                    el mismo con el que ingresas al Portal Institucional y al Entorno Virtual de Aprendizaje (EV@). Luego, debes seleccionar 
                                    el edificio al cual accedes, y finalmente pulsar en <strong>"Ingresar al edificio"</strong>.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed faq_accordion_pregunta" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    ¿Qué hago si seleccioné un edificio equivocado?
                                </button>
                                </h2>
                                <div id="basicAccordionCollapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-mdb-parent="#basicAccordion" style="">
                                <div class="accordion-body">
                                    <strong>Pasa por el totem de salida y elige el edificio equivocado que marcaste anteriormente 
                                    para no afectar el aforo de aquel edificio.</strong>
                                    <br>    
                                    Luego pasa nuevamente por el totem de entrada y procura seleccionar el edificio correcto.
                                    <br>
                                    Si tienes tiempo, comunica la situación a algún personal del edificio, de lo contrario, puede comunicar
                                    la situación más tarde a través de la Mesa de Ayuda UCSC, donde en el mensaje debe indicar los datos
                                    del hecho, como la hora, fecha, etc. y de forma remota se atenderá su situación y el personal indicado 
                                    eliminará su acceso incorrecto luego de verificar los antecedentes.
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <footer class="footer_faq">
                        <p class="textofooterenvivo">Unidad de Infraestructura DO - UCSC. Todos los derechos reservados 2021
                            <span class="material-icons copyenvivo">
                                copyright
                            </span>
                        </p>
                        <a href="https://portal.ucsc.cl/">
                            <label class="linkfooterenvivo">Ir a Portal Institucional</label>
                        </a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
