<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CurSOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/modsindex.css">
    <script>
        $(document).ready(function() {
            let searchParams = new URLSearchParams(window.location.search)
            if (searchParams.has('Logueado')) // true
            {
                let param = searchParams.get('Logueado');
                if (param == "Si") {
                    $("#Login").remove();
                } else {
                    $("#imagenUser").remove();
                    $("#NombreUser").remove();
                }
            } else {
                $("#imagenUser").remove();
                $("#NombreUser").remove();
            }
        });
    </script>
</head>

<body>
    <?php
        include 'navbar.php';
    ?>
    <header class="py-5 mb-5" style="background-color: #eee;
     background-image: url(https://www.incimages.com/uploaded_files/image/1920x1080/getty_933383882_2000133420009280345_410292.jpg); 
     height: 500px;">

        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12" style="background-color: rgba(255, 255, 255, 0.719); ">
                    <h1 class="display-4 text-black mt-5 mb-2" style="text-align: center;">CurSOS</h1>
                    <p class="lead mb-2 text-black-20" style="text-align: center;">Aprende nuevas habilidades o desafía tus limites con CurSOS.</p>
                    <p class="lead mb-4 text-black-20" style="text-align: center;">No dejes tus conocimientos obsoletos y rompe las barreras del conocimiento.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12 mb-5">
                <h2>Lo mejor de Software</h2>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://miro.medium.com/max/3960/0*HICLyAdNSIyT0ODU.jpg" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Master en Desarrollo Web.</h4>
                                <p class="card-text">Aprende a programar desde cero y desarrollo web con JavaScript, jQuery, JSON, TypeScript, Angular, Node, MEAN, +30 horas.</p>
                                <p class="card-text"><small class="text-muted">Angel Adrian Hernandez Martinez</small>
                                </p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                                <p class="card-text"><small class="text-muted">30 horas</small></p>
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.html" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://miro.medium.com/max/3960/0*HICLyAdNSIyT0ODU.jpg" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Master en Desarrollo Web.</h4>
                                <p class="card-text">Aprende a programar desde cero y desarrollo web con JavaScript, jQuery, JSON, TypeScript, Angular, Node, MEAN, +30 horas.</p>
                                <p class="card-text"><small class="text-muted">Angel Adrian Hernandez Martinez</small>
                                </p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                                <p class="card-text"><small class="text-muted">30 horas</small></p>
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.html" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://miro.medium.com/max/3960/0*HICLyAdNSIyT0ODU.jpg" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Master en Desarrollo Web.</h4>
                                <p class="card-text">Aprende a programar desde cero y desarrollo web con JavaScript, jQuery, JSON, TypeScript, Angular, Node, MEAN, +30 horas.</p>
                                <p class="card-text"><small class="text-muted">Angel Adrian Hernandez Martinez</small>
                                </p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                                <p class="card-text"><small class="text-muted">30 horas</small></p>
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.html" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-5">
                <h2>Lo mejor de Marketing</h2>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://miro.medium.com/max/8000/1*JrHDbEdqGsVfnBYtxOitcw.jpeg" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Scrum Master + Liderar Equipos Scrum y Ágil.</h4>
                                <p class="card-text">Gestión de Proyectos Agiles con Scrum y manejo de incertidumbre en tiempos de crisis.</p>
                                <p class="card-text"><small class="text-muted">Carlos Adrian Betancourt</small>
                                </p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                                <p class="card-text"><small class="text-muted">100 horas</small></p>
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.html" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://miro.medium.com/max/8000/1*JrHDbEdqGsVfnBYtxOitcw.jpeg" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Scrum Master + Liderar Equipos Scrum y Ágil.</h4>
                                <p class="card-text">Gestión de Proyectos Agiles con Scrum y manejo de incertidumbre en tiempos de crisis.</p>
                                <p class="card-text"><small class="text-muted">Carlos Adrian Betancourt</small>
                                </p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                                <p class="card-text"><small class="text-muted">100 horas</small></p>
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.html" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://miro.medium.com/max/8000/1*JrHDbEdqGsVfnBYtxOitcw.jpeg" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Scrum Master + Liderar Equipos Scrum y Ágil.</h4>
                                <p class="card-text">Gestión de Proyectos Agiles con Scrum y manejo de incertidumbre en tiempos de crisis.</p>
                                <p class="card-text"><small class="text-muted">Carlos Adrian Betancourt</small>
                                </p>
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> 4.0 stars
                                <p class="card-text"><small class="text-muted">100 horas</small></p>
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.html" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->



    </div>
    <br>
    <?php
        include 'footer.php';
    ?>
</body>

</html>