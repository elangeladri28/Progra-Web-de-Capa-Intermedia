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
                    $("#LogOut").remove();
                }
            } else {
                $("#imagenUser").remove();
                $("#NombreUser").remove();
                $("#LogOut").remove();
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
                    <a class="nav-link" href="Perfil.php">Perfil</a>
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
            <a id="LogOut" class="btn btn-outline-light" href="Login.php" role="button" style="margin-left: 10px;">Cerrar Sesion</a>
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