<?php
if (!empty($_SESSION['error'])) {
    echo '<div class="error">';
    foreach ($_SESSION['error'] as $err) {
        echo "<p>$err</p>";
    }
    echo '</div>';

    // Opcional: limpiar errores después de mostrarlos
    $_SESSION['error'] = array();
}

if (!empty($_SESSION['info'])) {
    echo '<div class="info">';
    foreach ($_SESSION['info'] as $msg) {
        echo "<p>$msg</p>";
    }
    echo '</div>';

    $_SESSION['info'] = array();
}
?>
