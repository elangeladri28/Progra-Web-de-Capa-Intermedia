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
                        <button id="ComprarCurso" href="#" class="btn btn-success" style="margin-right:15px;" disabled>Añadir al carrito</button>
                        <button id="CursoCertificado" href="../imagenes/Certificado.docx" download="Certificado" class="btn btn-success pruebame" disabled>Obtener Certificado</button>
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
                <h1 class="my-4">Material de Trabajo</h1>
                <div class="list-group">
                    <a href="../imagenes/PRUEBA_1.pdf" download="PRUEBA_1" class="list-group-item active">Prueba 1</a>
                    <a href="#" class="list-group-item">Prueba 2</a>
                    <a href="#" class="list-group-item">Prueba 3</a>
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
            var CarritoData = new Carrito(null, idDelCurso, idactual)
            RevisaCarro(CarritoData);
            

        <?php } else { ?>

        <?php } ?>

        $('#ComprarCurso').on('click', (event) => {

            AgregaEnCarrito(idDelCurso);
        });

        function RevisaCarro(CarritoData) {
            var dataToSend = {
                cursoid: CarritoData.cursoid,
                usuarioid: CarritoData.usuarioid
            };
            var dataToSendJson = JSON.stringify(dataToSend);
            debugger
            $.ajax({
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
                    } else {
                        debugger
                        $('#ComprarCurso').removeAttr("disabled");
                    }

                },
                error: function() {
                    debugger
                    alert("Error revisando el Carrito");
                }
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
                    window.location.reload();
                },
                error: function() {
                    debugger
                    alert("Error agregando al Carrito");
                }
            });

        };
    });
</script>

</html>