<?php
// Destruir cualquier sesión anterior
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

session_start();

// Forzar inicialización limpia
$_SESSION = array(); // Limpiar todo
$_SESSION['error'] = [];
$_SESSION['info'] = [];

$host = $_SERVER['HTTP_HOST'];
$path = rtrim(dirname($_SERVER['PHP_SELF']), "/"); 
$base = "http://" . $host . $path . "/";

define("PATH_CSS", $base . "view/css/");
define("PATH_IMG", $base . "view/img/");
define("PATH_JS", $base . "view/js/");

require_once "controller/MainController.class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Institut Provençana</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="<?=PATH_CSS?>header.css">
    <link rel="stylesheet" href="<?=PATH_CSS?>body.css">
    <script src="<?=PATH_JS?>general-fn.js"></script>


</head>

<body class="bg-gray-200">
    <div id="page">

        <?php
                

                (new MainController())->processRequest();
            ?>
    </div>
</body>
<footer class=" bg-black fixed-bottom">

</footer>

</html>