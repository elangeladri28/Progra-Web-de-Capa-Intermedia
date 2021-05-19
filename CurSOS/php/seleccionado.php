<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CurSOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/modsCursos.css">
</head>
<script type="module">
    import {
        urlglobal
    } from '../js/urlglobal.js'
    $(document).ready(function() {
        let searchParams = new URLSearchParams(window.location.search) //Busca si fue mandado algun parametro
        let param = searchParams.get('idcurso'); //Revisa el valor del id del curso
        getInfoCurso(param);

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
                    html += '<video  controls><source src="'+ datos.video +'" type="video/mp4"></video>';
                    html += '</div>';
                    html += '<div class="card-body">';
                    html += '<h3 class="card-title">'+ datos.nombre +'</h3>';
                    html += '<h4> Precio: $'+ datos.costo +'</h4>';
                    html += '<p class="card-text">'+ datos.descripcion +'</p>';
                    html += '<br>';
                    html += '<br>';
                    html += '<a href="#" class="btn btn-success" style="margin-right:15px";>Añadir al carrito</a>';
                    html += '<a href="../imagenes/Certificado.docx" download="Certificado" class="btn btn-success">Obtener Certificado</a>';
                    html += '</div>';
                    $('#cursoData').append(html);

                },
                error: function() {
                    alert("Error con los cursos mas recientes");
                }
            })
        }

    });
</script>

<body>
    <?php
    include 'navbar.php';
    ?>
    <br>

    <div class="container">

        <div class="row">

            <div class="col-lg-9">

                <div id="cursoData" class="card mt-4">
                    <!-- <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/z95mZVUcJ-E" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" id="ElTitulo">Curso de JavaScript</h3>
                        <h4 id="preciocurso">$300 MXN</h4>
                        <p class="card-text" id="Descripcion_Extra">Aprende el lenguaje más popular! JavaScript! El curso incluye ES6, ES7, ES8, ES9 y ES10 También el curso incluye webpack, node.js, express, mongodb, react, electron y mucho más! En este curso aprenderás JavaScript desde los fundamentos
                            hasta temas más avanzados como Prototypes, Delegation, Classes, Ajax, Promises, Generadores, Orientado a Objetos, Fetch API, Async Await, Async JS, Objetos, así como consumir REST APIs entre muchos más. Si estos temas no son
                            de tu conocimiento, estas en el curso adecuado para aprenderlos! La mejor forma de aprender es desarrollando algo, en este curso crearemos bastantes proyectos que te llevaran desde el nivel básico hasta avanzado!.</p>
                        <br>
                        <br>

                        <a href="#" class="btn btn-success" onclick="alert('Curso añadido');">Añadir al carrito</a>
                        <a href="../imagenes/Certificado.docx" download="Certificado" class="btn btn-success">Obtener Certificado</a>
                    </div> -->


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

</html>