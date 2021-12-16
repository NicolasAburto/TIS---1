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
                                    Question #2
                                </button>
                            </h2>
                                <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="headingTwo" data-mdb-parent="#basicAccordion" style="">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed faq_accordion_pregunta" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Question #3
                                </button>
                                </h2>
                                <div id="basicAccordionCollapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-mdb-parent="#basicAccordion" style="">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>