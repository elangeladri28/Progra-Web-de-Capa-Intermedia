<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CurSOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/modsindex.css">

    <script type="text/javascript" src="../js/modelosJS/curso.js"></script>
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
                <h2>Los cursos mas recientes</h2>
                <hr>
                <div class="row" id="CursosRecientes">
                    <!-- <div class="col-md-4 mb-5">
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
                    </div> -->
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
                            </div>
                            <div class="card-footer">
                                <a href="seleccionado.php" class="btn btn-primary">Find Out More!</a>
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
<script type="module">
    import {
        urlglobal
    } from '../js/urlglobal.js'

    $(document).ready(function() {
        var idactual = <?php echo $_SESSION['id_usuario'] ?>;
        get3CursosRecientes();

        // //Obtenemos la información del curso
        // $('#btn-crearcurso').on('click', (event) => {
        //     event.preventDefault();
        //     if ($('#nombrecurso').val() == "" || $('#descripcioncurso').val() == "" ||
        //         $('#preciocurso').val() == "" || $('input[name="imagencurso"]')[0].files[0] == null ||
        //         $('input[name="videocurso"]')[0].files[0] == null || document.getElementById("categorias").selectedIndex == null) {
        //         debugger
        //         alert("Asegurate que los campos este completos");
        //     } else {
        //         var categorie = document.getElementById("categorias").selectedIndex;
        //         let categoriavalue = document.getElementsByTagName("option")[categorie].value;

        //         var fotocurso = $('input[name="imagencurso"]')[0].files[0];
        //         var videocurso = $('input[name="videocurso"]')[0].files[0];
        //         debugger
        //         let cursoData = new Curso(null, $('#nombrecurso').val(), $('#descripcioncurso').val(), $('#preciocurso').val(), fotocurso, videocurso, categoriavalue, null, null, idactual);

        //         crearCurso(cursoData);
        //     }


        // });

        // //Funcion CreamosCurso
        // function crearCurso(ElCurso) {
        //     var dataToSend = {
        //         nombre: ElCurso.nombre,
        //         descripcion: ElCurso.descripcion,
        //         costo: ElCurso.costo,
        //         foto: ElCurso.foto,
        //         video: ElCurso.video,
        //         categoriaid: ElCurso.categoriaid,
        //         usuid: ElCurso.usuid
        //     };
        //     //Agregamos la imagen del curso
        //     // Create an FormData object 
        //     var imageCourse = document.getElementById('imagencurso');
        //     var myFormData = new FormData();
        //     myFormData.append('foto', imageCourse.files[0]);
        //     debugger
        //     var promise = $.ajax({
        //         type: 'POST',
        //         enctype: 'multipart/form-data',
        //         url: "../Js/subir-imagen-curso.php",
        //         data: myFormData,
        //         processData: false,
        //         contentType: false,
        //         cache: false,
        //         timeout: 800000,
        //         success: function(data) {
        //             dataToSend.foto = data;
        //             alert("Imagen agregada");
        //             debugger
        //         },
        //         error: function(data) {
        //             console.log(data);
        //             debugger
        //         }
        //     });
        //     var videoCourse = document.getElementById('videocurso');
        //     var myFormData2 = new FormData();
        //     myFormData2.append('video', videoCourse.files[0]);
        //     //Agregamos el video del curso
        //     promise.then(() => {
        //         debugger
        //         var promise2 = $.ajax({
        //             type: 'POST',
        //             enctype: 'multipart/form-data',
        //             url: "../Js/subir-video-curso.php",
        //             data: myFormData2,
        //             processData: false,
        //             contentType: false,
        //             cache: false,
        //             timeout: 800000,
        //             success: function(data) {
        //                 dataToSend.video = data;
        //                 alert("Video agregado");
        //                 debugger
        //             },
        //             error: function(data) {
        //                 console.log(data);
        //                 debugger
        //             }
        //         });
        //         //Mandamos la info a la BD
        //         promise2.then(() => {
        //             var dataToSendJson = JSON.stringify(dataToSend);
        //             debugger
        //             $.ajax({
        //                 url: urlglobal.url + "/addCurso",
        //                 async: true,
        //                 type: 'POST',
        //                 data: dataToSendJson,
        //                 dataType: 'json',
        //                 contentType: 'application/json; charset=utf-8',
        //                 success: function(data) {
        //                     alert("Curso agregado correctamente");
        //                 },
        //                 error: function() {
        //                     alert("Error agregando curso, posiblemente ya exista uno con el mismo nombre");
        //                 }
        //             });
        //         });

        //     });
        // }

        function get3CursosRecientes() {
            debugger
            $.ajax({
                url: urlglobal.url + "/get3CursosRecientes",
                async: true,
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(datos) {
                    for (let dato of datos) {
                        var html = '<div class="col-md-4 mb-5">';
                        html += '<div class="card h-100">';
                        html += '<img class="card-img-top" src="'+ dato.foto +'" alt="">';
                        html += '<div class="card-body">';
                        html += '<h4 class="card-title">'+ dato.nombre +'</h4>';
                        html += '<p class="card-text">'+ dato.descripcion +'</p>';
                        html += '</div>';
                        html += '<div class="card-footer">';
                        html += '<a href="seleccionado.php?idcurso='+ dato.id_curso +'" class="btn btn-primary">Find Out More!</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        $('#CursosRecientes').append(html);
                    }
                },
                error: function() {
                    alert("Error con los cursos mas recientes");
                }
            })
        }
    });
</script>

</html>