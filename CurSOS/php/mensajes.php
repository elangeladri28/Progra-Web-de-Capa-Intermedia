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


    <link rel="stylesheet" href="../css/modsMensajes.css" />
    <script type="text/javascript" src="../js/modelosJS/user.js"></script>

</head>


<body>
    <?php
    include 'navbar.php';
    ?>
    <br>


    <div class="recuadro">
        <div id="chat-container">

            <div id="search-container">
                <input type="text" placeholder="Search" />
            </div>
            <!-- PersonasConlasqueHasChateado -->
            <div id="conversation-list">
                <div class="conversation active">
                    <img src="../imagenes/unknown.png" width="40px" alt="" />
                    <div class="title-text">Carlos</div>
                </div>
                <div class="conversation">
                    <img src="../imagenes/andre.jpg" width="40px" alt="" />
                    <div class="title-text">Rodrigo</div>
                </div>
            </div>
            <!-- PersonasConlasqueHasChateado -->
            <div id="new-message-container">
                <a href="">+</a>
            </div>

            <div id="chat-title"></div>
            <!-- Mensajes de la conversacion -->
            <div id="chat-message-list">
                <div class="message-row you-message">
                    <div class="message-text">Hola</div>

                </div>
                <div class="message-row other-message">
                    <div class="message-text">Hola</div>
                </div>
            </div>
            <!-- Mensajes de la conversacion -->
            <div id="chat-form">
                <img src="https://pic.onlinewebfonts.com/svg/img_375473.png" alt="Añadir Archivo" width="30px" onclick="alert('hola');">
                <input id="MensajeAEnviar" type="text" placeholder="Escribe un mensaje">
            </div>


        </div>

    </div>
    <br>
</body>

<script>
    $(function() {
        $(".conversation").on('click', function() {
            $('.conversation.active').attr("class", "conversation"); //eliminas chat activo
            let mensajes = document.getElementById('chat-message-list'); //limpias el chat de mensajes
            while (mensajes.firstChild) {
                mensajes.removeChild(mensajes.firstChild);
            }
            $(this).attr("class", "conversation active"); //conviertes activo el que seleccionaste
            let usuarioChat = $(this).children("div").text(); //obtienes el username del que seleccionaste

            alert(usuarioChat);

        });
    });
</script>

</html>