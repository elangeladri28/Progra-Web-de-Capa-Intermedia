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
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #7952b3;">
        <a class="navbar-brand" href="index.php">CurSOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Software</a>
                        <a class="dropdown-item" href="#">Marketing</a>
                        <a class="dropdown-item" href="#">Design</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mensajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
            </ul>
            <form action="#" class="form-inline my-2 my-lg-0">
                <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button onclick="revisabusqueda()" class="btn btn-success my-2 my-sm-0" type="submit"><img
                        src="https://www.seekpng.com/png/full/920-9209972_magnifying-glass-png-white-search-icon-white-png.png"
                        width="20" height="20" alt=""></button>
            </form>
            <a href="vendiendo.html"><img id="carrito" src="https://image.flaticon.com/icons/png/512/34/34568.png" alt=""></a>

            <a id="Login" class="btn btn-outline-light" href="Login.php" role="button" style="margin-left: 10px;">Acceder</a>
            <img id="imagenUser" src="http://cdn.onlinewebfonts.com/svg/img_506739.png" alt="ImagenPerfil" width="50" height="30" style="padding-left: 10px; padding-right: 10px;">
            <a id="NombreUser" style="color: #ecfdf9">Username</a>
        </div>
    </nav>

</body>
<script>
    function revisabusqueda() {
        let var1 = document.getElementById("search").value;
        if (var1 === "") {
            event.preventDefault();
        }
    }
</script>

</html>