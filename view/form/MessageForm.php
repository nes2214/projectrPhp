<?php
if (!empty($_SESSION['error'])) {
    if (!is_array($_SESSION['error'])) {
        $_SESSION['error'] = [$_SESSION['error']]; // convertir string en array
    }

    echo '<div class="error" id="error">';
    foreach ($_SESSION['error'] as $err) {
        echo "<p>$err</p>";
    }
    echo '</div>';

    $_SESSION['error'] = [];
}

if (!empty($_SESSION['info'])) {
    if (!is_array($_SESSION['info'])) {
        $_SESSION['info'] = [$_SESSION['info']];
    }

    echo '<div class="info" id="infogi">';
    foreach ($_SESSION['info'] as $msg) {
        echo "<p>$msg</p>";
    }
    echo '</div>';

    $_SESSION['info'] = [];
}

?>