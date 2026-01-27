<?php
require_once "controller/PropietariController.class.php";
require_once "controller/MascotaController.class.php";
require_once "controller/LineaHistorialController.class.php";
class MainController {

    // carga la vista según la opción
    public function processRequest() {

        //$request=filter_has_var(INPUT_GET, 'menu')?filter_input(INPUT_GET, 'menu'):NULL;

        $request=NULL;
        // recupera la opción de un menú
        if (filter_has_var(INPUT_GET, 'menu')) {
            $request=filter_input(INPUT_GET, 'menu');
        }

        switch ($request) {

            case "propietari":
                $controlPropietari=new PropietariController();
                $controlPropietari->processRequest();
                break;
            case "mascota":
                $controlMascota=new MascotaController();
                $controlMascota->processRequest();
                break;
            case "lineaHistorial":
                $controlLineaHistorial=new LineaHistorialController();
                $controlLineaHistorial->processRequest();
                break;
            default:
                $controlPropietari=new PropietariController();
                $controlPropietari->processRequest();
                break;
    
        }

    }
    
}