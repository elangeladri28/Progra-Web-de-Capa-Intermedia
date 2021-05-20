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
    <link rel="stylesheet" href="../css/modsCursos.css">

    <script type="text/javascript" src="../js/modelosJS/carrito.js"></script>
    <script type="text/javascript" src="../js/modelosJS/leccion.js"></script>
    <script type="text/javascript" src="../js/modelosJS/contrata.js"></script>

</head>


<body>
    <?php
    include 'navbar.php';
    ?>
    <br>

    <div class="container">

        <div class="row">

            <div class="col-lg-9">

                <div class="card mt-4">
                    <div id="cursoData">
                    </div>
                    <div class="card-body">
                        <br><br>
                        <button id="ComprarCurso" class="btn btn-success" style="margin-right:15px;" disabled>Añadir al carrito</button>
                        <button id="CursoCertificado" class="btn btn-success" disabled>Obtener Certificado</button>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Reseñas
                    </div>
                    <div class="card-body">
                        <p>No crei aprender tan facilmente, MUY BUEN CURSO!!.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <p>Es un poco extenso pero vale la pena verlo, recomendado.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <p>Demasiado largo, creo que deberia ser un poco mas corto, dinero tirado a la basura.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <a href="#" class="btn btn-success" onclick="alert('Comentario posteado');">Deja una reseña</a>
                    </div>
                </div>
                <!-- /.card -->

            </div>


            <div class="col-lg-3">
                <h1 class="my-4">Lecciones</h1>
                <div id="laslecciones" class="list-group">
                </div>
            </div>
            <!-- /.col-lg-3 -->



        </div>


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

    var SeleccionoLeccion = false; //True significa que si esta contratado, podemos traer lecciones
    $(document).ready(function() {
        let searchParams = new URLSearchParams(window.location.search) //Busca si fue mandado algun parametro
        var idDelCurso = searchParams.get('idcurso'); //Revisa el valor del id del curso
        getInfoCurso(idDelCurso);

        function getInfoCurso(param) {
            var dataToSend = {
                id_curso: param
            };
            var dataToSendJson = JSON.stringify(dataToSend);

            debugger
            $.ajax({
                url: urlglobal.url + "/getInfoCurso",
                async: true,
                type: 'POST',
                data: dataToSendJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(datos) {

                    debugger
                    var html = '<div class="embed-responsive embed-responsive-16by9">';
                    html += '<video  controls><source src="' + datos.video + '" type="video/mp4"></video>';
                    html += '</div>';
                    html += '<div class="card-body">';
                    html += '<h3 class="card-title">' + datos.nombre + '</h3>';
                    html += '<h4> Precio: $' + datos.costo + '</h4>';
                    html += '<p class="card-text">' + datos.descripcion + '</p>';
                    html += '</div>';
                    $('#cursoData').append(html);

                },
                error: function() {
                    alert("Error con los cursos mas recientes");
                }
            })
        };
        // Revisa si esta logueado, en caso de que si, se agrega la funcionalidad
        <?php
        if (isset($_SESSION['id_usuario'])) { ?>

            var idactual = <?php echo $_SESSION['id_usuario'] ?>;
            var nombreactual = <?php echo json_encode($_SESSION['nombre']) ?>;
            var CarritoData = new Carrito(null, idDelCurso, idactual)
            RevisaCarro(CarritoData);


        <?php } ?>
        $('#ComprarCurso').on('click', (event) => {
            AgregaEnCarrito(idDelCurso);
        });
        $('#CursoCertificado').on('click', (event) => {
            window.location.href = "../Diplomaservice/DiplomaGenerate.php?user="+nombreactual;
        });
        $("body").on("click", ".botonLeccion", function() {
            let queLeccionEs = $(this).attr("idLeccion");
            debugger
            SeleccionoLeccion = true;
            RevisaSiYaTienesLasLecciones(idDelCurso);
            SeleccionaLaLeccion(queLeccionEs);
        });

        function RevisaCarro(CarritoData) {
            var dataToSend = {
                cursoid: CarritoData.cursoid,
                usuarioid: CarritoData.usuarioid
            };
            var dataToSendJson = JSON.stringify(dataToSend);
            debugger
            var promise = $.ajax({
                url: urlglobal.url + "/getRevisaCarrito",
                async: true,
                type: 'POST',
                data: dataToSendJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    var muestrame = Object.keys(data).length; //Obtienes el numero de cursos
                    if (muestrame > 0) {
                        debugger
                        alert("Este curso ya esta en el carrito");
                    }
                },
                error: function() {
                    debugger
                    alert("Error revisando el Carrito");
                }
            });
            promise.then(() => {
                $.ajax({
                    url: urlglobal.url + "/RevisaEstaContratado",
                    async: true,
                    type: 'POST',
                    data: dataToSendJson,
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function(data) {
                        debugger
                        let numero = parseInt(data.resultado);
                        if (numero > 0) {
                            debugger
                            // alert("Este curso ya esta contratado");
                            getLeccionesCurso(idDelCurso);
                        } else {
                            debugger
                            $('#ComprarCurso').removeAttr("disabled");
                        }

                    },
                    error: function() {
                        debugger
                        alert("Error revisando Contratacion");
                    }
                });
            });
        };

        function AgregaEnCarrito(idDelCurso) {
            var dataToSend = {
                cursoid: idDelCurso,
                usuarioid: idactual
            };
            var dataToSendJson = JSON.stringify(dataToSend);
            debugger
            $.ajax({
                url: urlglobal.url + "/addCarrito",
                async: true,
                type: 'POST',
                data: dataToSendJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    debugger
                    alert("Curso agregado al Carrito");
                    $('#ComprarCurso').attr("disabled", true);
                },
                error: function() {
                    debugger
                    alert("Error agregando al Carrito");
                }
            });

        };

        function getLeccionesCurso(idDelCurso) {
            var dataToSend = {
                cursoid: idDelCurso
            };
            var dataToSendJson = JSON.stringify(dataToSend);
            debugger
            var promise = $.ajax({
                url: urlglobal.url + "/getLeccionesCurso",
                async: true,
                type: 'POST',
                data: dataToSendJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(datos) {
                    for (let dato of datos) {
                        debugger
                        var html = '<button class="list-group-item botonLeccion" idLeccion="' + dato.id_leccion + '">' + dato.nombre + '</button>';
                        $('#laslecciones').append(html);
                    }
                },
                error: function() {
                    debugger
                    alert("Error trayendo lecciones");
                }
            });
            promise.then(() => {
                RevisaSiYaTienesLasLecciones(idDelCurso);
            });
        };

        function SeleccionaLaLeccion(idDeLaLeccion) {
            var dataToSend = {
                leccionid: idDeLaLeccion
            };
            var dataToSendJson = JSON.stringify(dataToSend);
            debugger
            $.ajax({
                url: urlglobal.url + "/getLeccionEspecifica",
                async: true,
                type: 'POST',
                data: dataToSendJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(datos) {
                    let cursitoData = document.getElementById('cursoData');
                    while (cursitoData.firstChild) {
                        cursitoData.removeChild(cursitoData.firstChild);
                    }
                    debugger
                    var html = '<div class="embed-responsive embed-responsive-16by9">';
                    html += '<video controls><source src="' + datos.video + '" type="video/mp4"></video>';
                    html += '</div>';
                    html += '<div class="card-body">';
                    html += '<h3 class="card-title">' + datos.nombre + '</h3>';
                    html += '<p class="card-text">' + datos.extra + '</p>';
                    html += '<h2 class="udlite-heading-xl styles--audience__title--1Sob_">Archivo asociado</h2>';
                    html += '<ul class="styles--audience__list--3NCqY">';
                    html += '<li>';
                    html += '<a href="' + datos.archivo + '" download="Archivo">Prueba 1</a>';
                    html += '</li>';
                    html += '</ul>';
                    html += '</div>';
                    $('#cursoData').append(html);
                },
                error: function() {
                    debugger
                    alert("Error trayendo la leccion");
                }
            });

        };

        function RevisaSiYaTienesLasLecciones(idDelCurso) {
            var dataToSend2 = {
                usuarioid: idactual, //IdDelUsuarioQueVasARevisar
                cursoid: idDelCurso //IdDelCursoARevisar
            };
            var dataToSendJson2 = JSON.stringify(dataToSend2);
            debugger
            var LeccionesVistas;
            var promise2 = $.ajax({
                url: urlglobal.url + "/RevisaSiYaTienesLasLecciones",
                async: true,
                type: 'POST',
                data: dataToSendJson2,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    let numero = parseInt(data.resultado);
                    if (numero > 0) {
                        LeccionesVistas = 1; //significa que ya completo el curso
                        $('#CursoCertificado').removeAttr("disabled");
                        debugger
                    } else {
                        LeccionesVistas = 0; //le faltan lecciones

                        alert("Todavia no completa el curso")
                        debugger
                    }

                },
                error: function() {
                    alert("Error revisando");
                }
            });
            promise2.then(() => {
                debugger
                if (LeccionesVistas = 0 && SeleccionoLeccion) {
                    var dataToSend2 = {
                        usuarioid: idactual, //IdDelUsuarioQueVasARevisar
                        cursoid: idDelCurso //IdDelCursoARevisar
                    };
                    var dataToSendJson2 = JSON.stringify(dataToSend2);
                    debugger
                    $.ajax({
                        url: urlglobal.url + "/aumentaSuProgreso",
                        async: true,
                        type: 'POST',
                        data: dataToSendJson3,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function(data) {
                            alert("ProgresoAumentado");
                        },
                        error: function() {
                            alert("Error aumentando contador");
                        }
                    });
                }
            });

        }

    });
</script>

</html>