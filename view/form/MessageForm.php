<?php
// Asegurar que siempre sean arrays
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = [];
}
if (!isset($_SESSION['info'])) {
    $_SESSION['info'] = [];
}

// Convertir a array si no lo son
if (!is_array($_SESSION['error'])) {
    $_SESSION['error'] = [$_SESSION['error']];
}
if (!is_array($_SESSION['info'])) {
    $_SESSION['info'] = [$_SESSION['info']];
}

// Mostrar errores
if (!empty($_SESSION['error'])) {
    echo '<div class="error" id="error">';
    foreach ($_SESSION['error'] as $err) {
        echo "<p>" . htmlspecialchars($err) . "</p>";
    }
    echo '</div>';
}

// Mostrar información
if (!empty($_SESSION['info'])) {
    echo '<div class="info" id="infogi">';
    foreach ($_SESSION['info'] as $msg) {
        echo "<p>" . htmlspecialchars($msg) . "</p>";
    }
    echo '</div>';
}

// Limpiar mensajes MANTENIENDO como arrays vacíos
$_SESSION['error'] = [];
$_SESSION['info'] = [];
?>