<?php
require_once "model/Mascota.class.php";
require_once "util/MascotaMessage.class.php";

class MascotaFormValidation {

    const ADD_FIELDS    = array('id', 'nom', 'propietari_id');
    const MODIFY_FIELDS = array('id', 'nom', 'propietari_id');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');

    const NUMERIC = "/^[0-9]+$/";
    const ALPHANUMERIC = "/^[a-zA-Z0-9\s]+$/";

    public static function checkData($fields) {
        $id = NULL;
        $nom = NULL;
        $propietari_id = NULL;

        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['error'])) $_SESSION['error'] = [];

        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    // El ?? '' evita el error de trim(null)
                    $id = trim(filter_input(INPUT_POST, 'id') ?? '');
                    if (empty($id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['empty_id'];
                    } else if (!preg_match(self::NUMERIC, $id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['invalid_id'];
                    }
                    break;

                case 'nom': // Cambiado de 'name' a 'nom' para coincidir con tu HTML
                    $nom = trim(filter_input(INPUT_POST, 'nom') ?? '');
                    if (empty($nom)) {
                        $_SESSION['error'][] = "El nom no pot estar buit.";
                    } else if (!preg_match(self::ALPHANUMERIC, $nom)) {
                        $_SESSION['error'][] = "El nom té caràcters no vàlids.";
                    }
                    break;

                case 'propietari_id':
                    $propietari_id = trim(filter_input(INPUT_POST, 'propietari_id') ?? '');
                    if (empty($propietari_id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['empty_propietari'];
                    } else if (!preg_match(self::NUMERIC, $propietari_id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['invalid_propietari'];
                    }
                    break;
            }
        }

        // Creamos el objeto para devolverlo a la vista
        $mascota = new Mascota($id, $nom);
        $mascota->setPropietari_id($propietari_id);

        return $mascota;
    }
}