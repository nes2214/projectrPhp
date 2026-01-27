<?php
require_once "model/Mascota.class.php";
require_once "util/MascotaMessage.class.php";

class MascotaFormValidation {

    const ADD_FIELDS    = array('id', 'name', 'propietari_id');
    const MODIFY_FIELDS = array('id', 'name', 'propietari_id');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');

    const NUMERIC = "/^[0-9]+$/";
    const ALPHANUMERIC = "/^[a-zA-Z0-9\s]+$/";

    public static function checkData($fields) {
        $id = NULL;
        $name = NULL;
        $propietari_id = NULL;

        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['error'])) $_SESSION['error'] = [];

        foreach ($fields as $field) {
            switch ($field) {

                case 'id':
                    $id = trim(filter_input(INPUT_POST, 'id'));
                    if (empty($id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['empty_id'];
                    } else if (!preg_match(self::NUMERIC, $id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['invalid_id'];
                    }
                    break;

                case 'name':
                    $name = trim(filter_input(INPUT_POST, 'name'));
                    if (empty($name)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['empty_name'];
                    } else if (!preg_match(self::ALPHANUMERIC, $name)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['invalid_name'];
                    }
                    break;

                case 'propietari_id':
                    $propietari_id = trim(filter_input(INPUT_POST, 'propietari_id'));
                    if (empty($propietari_id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['empty_propietari'];
                    } else if (!preg_match(self::NUMERIC, $propietari_id)) {
                        $_SESSION['error'][] = MascotaMessage::ERR_FORM['invalid_propietari'];
                    }
                    break;
            }
        }

        $mascota = new Mascota($id, $name);
        $mascota->setPropietari_id($propietari_id);

        return $mascota;
    }
}