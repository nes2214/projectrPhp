<?php
class ProductView {
    public function __construct() {

    }
    public function display($template = NULL, $content = NULL) {
        // Menú principal
        include("view/menu/MainMenu.html");

        

        // Formulario o template específico
        if (!empty($template)) {
            include($template);
        }

        // Mensajes
        include("view/form/MessageForm.php");
    }    
}
