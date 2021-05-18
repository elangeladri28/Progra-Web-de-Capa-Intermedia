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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/modsCreate.css">
    <script type="text/javascript" src="../js/modelosJS/categories.js"></script>


</head>
<?php
include 'navbar.php';
?>

<body>

    <!-- Page Content -->
    <div class="noticiamarco">
        <h1 style="text-align: center;">Nuevo Curso</h1>

        <form>
            <h4>Nombre del Curso:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="nombrecurso" aria-describedby="emailHelp" placeholder="Titulo">
            </div>
            <h4>Categoria:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <select class="form-control" id="categorias">

                </select>

            </div>
            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Crear Categoria
                </button></center>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Categoria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="NombreCategoria" class="form-label">Category name</label>
                                <input type="text" class="form-control" id="NombreCategoria">
                            </div>
                            <div class="mb-3">
                                <label for="DescripcionCategoria" class="form-label">Category description</label>
                                <input type="text" class="form-control" id="DescripcionCategoria">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-crearcategoria" data-dismiss="modal">Agregar Categoria</button>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Precio:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="number" class="form-control" id="preciocurso" aria-describedby="emailHelp" placeholder="Titulo" min="0">
            </div>
            <h4>Descripcion:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <textarea class="form-control" id="descripcioncurso" placeholder="Descripcion" rows="4"></textarea>
            </div>
        </form>

        <h4 style="margin-top: 10px;">Miniatura:</h4>
        <form style="margin-bottom: 50px;">
            <div class="form-group-imagen">
                <label for="imagencurso">Agregar miniatura</label>
                <input type="file" class="form-control-file" id="imagencurso">
            </div>
        </form>
        <h4 style="margin-top: 10px;">Videos:</h4>
        <form style="margin-bottom: 50px;">
            <div class="form-group-video">
                <label for="videocurso">Agregar vídeo</label>
                <input type="file" class="form-control-file" id="videocurso">
            </div>
        </form>
        <center><button id="btn-crearcurso" type="button" class="btn btn-success">Añadir Curso</button></center>
        <br>
    </div>
    <!--Marco-->

    <br>
    <?php
    include 'footer.php';
    ?>

</body>
<script type="module">
    import {
        urlglobal
    } from '../js/urlglobal.js'
    var courseInformation;

    $(document).ready(function() {

        getCategorias();
        //Obtenemos la información del curso
        $('#btn-crearcurso').on('click', (event) => {
            event.preventDefault();
            let courseInformation = new CourseInformation($('#InputTitle').val(), $('#InputShortDescription').val(), $('#InputLongDescription').val(), $("#InputCategory option:selected").text(), "", $('#InputPrice').val());

            createCourse(courseInformation);

        });
        $('#btn-crearcategoria').on('click', (event) => {
            event.preventDefault();
            
            let categoriaInformation = new Categoria(null, $('#NombreCategoria').val(), $('#DescripcionCategoria').val(), null);
            $('#NombreCategoria').val("");
            $('#DescripcionCategoria').val("");
            addCategoria(categoriaInformation);

        });

        //Funcion CreamosCurso
        function crearCurso(ElCurso) {
            var courseData = {
                courseTitle: newCourse.courseTitle,
                shortDescription: newCourse.shortDescription,
                longDescription: newCourse.longDescription,
                categorie: newCourse.categorie,
                price: newCourse.price
            };

            var courseDataJson = JSON.stringify(courseData)
            //Mandamos la info a la BD
            var promise = $.ajax({
                url: GLOBAL.url + "/addCourse",
                async: true,
                type: 'POST',
                data: courseDataJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    console.log(data);
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);
                }
            });
            //Agregamos la imagen del curso
            promise.then(() => {

                var imageCourse = document.getElementById('miniature-course');
                var myFormData = new FormData();
                myFormData.append('foto', imageCourse.files[0]);

                $.ajax({
                    url: "../services/upload-miniature.php",
                    async: true,
                    type: 'POST',
                    data: myFormData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(x, y, z) {
                        alert("Error en la api: " + x + y + z);
                    }
                });
            });
            //Agregamos el video del curso
            promise.then(() => {

                var imageCourse = document.getElementById('miniature-course');
                var myFormData = new FormData();
                myFormData.append('foto', imageCourse.files[0]);

                $.ajax({
                    url: "../services/upload-miniature.php",
                    async: true,
                    type: 'POST',
                    data: myFormData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(x, y, z) {
                        alert("Error en la api: " + x + y + z);
                    }
                });
            });
        }

        function getCategorias() {
            $.ajax({
                url: urlglobal.url + "/getCategorias",
                async: true,
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(datos) {
                    for (let dato of datos) {
                        var category = new Categoria(dato.id_categoria, dato.categoria, null, null)
                        $('#categorias').append($('<option>', {
                            value: category.id_categoria,
                            text: category.categoria
                        }));
                    }
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);
                }
            })
        }
        //funcion agregar categoria
        function addCategoria(laCategoria) {
            var categoryData = {
                categoria: laCategoria.categoria,
                descripcion: laCategoria.descripcion
            };

            var categoryDataJson = JSON.stringify(categoryData);
            debugger
            $.ajax({
                url: urlglobal.url + "/addCategoria",
                async: true,
                type: 'POST',
                data: categoryDataJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    alert("Categoria Agregada Exitosamente");
                    $('#categorias').empty();
                    getCategorias();
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);
                }
            });

        }
    });
</script>

</html>