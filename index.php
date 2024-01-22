<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="jQuery Editable Select is a simple jQuery Plugin that converts a select into an text field with suggestions.">
</head>
<nav class="navbar nav border border-start-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/mundial.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            SuperElectronics
        </a>
        <div class="container text-end">
        <a type="button" href="javascript:buscar(0,1,1)" class="btn vnabar" aria-expanded="false" id="icon1">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-lock-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 4.72 4.72a3 3 0 0 0-2.709 3.248A2 2 0 0 0 9 13v2H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                    <path d="M13 9a2 2 0 0 0-2 2v1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1v-1a2 2 0 0 0-2-2Zm0 1a1 1 0 0 1 1 1v1h-2v-1a1 1 0 0 1 1-1Z" />
                </svg>
                <br>
                Almacén
            </p>
        </a>
        <a type="button" href="javascript:buscar(0,2,1)" class="btn vnabar" aria-expanded="false" id="icon1">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                </svg>
                <br>
                Adquirir
            </p>
        </a>
        <a type="button" href="javascript:buscar(0,3,1)" class="btn vnabar" aria-expanded="false" id="icon1">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <br>
                Ventas
            </p>
        </a>
        </div>
    </div>
</nav>

<body>

    <div class="containerlargo">
        
    </div>
        <div class="fluid-container text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="p-2">
                        <div class="container text-start" id="contenedor_submenu"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <div class="container" id="contenedor_submenu2"></div>
                        <div class="container" id="contenedor_submenu3"></div>
                        <div class="container" id="contenedor_submenu4"></div>
                        <div class="container" id="contenedor_submenu5"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="js/jquery-3.6.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/funcion_ajax.js"></script>
<script src="js/aritmetica.js"></script>

</html>