<?php
require_once "model/LineaHistorial.class.php";
require_once "util/LineaHistorialMessage.class.php";

class LineaHistorialFormValidation {
    // ✅ Añadido 'motiu_visita' a los campos
    const ADD_FIELDS = array('id', 'data', 'motiu_visita', 'descripcio', 'mascota_id');
    const ALPHANUMERIC = "/^[a-zA-Z0-9\s]+$/";
    
    public static function checkData($fields) {
        $id = NULL;
        $data = NULL;
        $motiu_visita = NULL;
        $descripcio = NULL;
        $mascota_id = NULL;

        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['error'])) $_SESSION['error'] = [];

        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    $id = trim(filter_input(INPUT_POST, 'id'));
                    if (empty($id)) {
                        $_SESSION['error'][] = LineaHistorialMessage::ERR_FORM['empty_id'];
                    }
                    break;

                case 'data':
                    $data = trim(filter_input(INPUT_POST, 'data'));
                    if (empty($data)) {
                        $_SESSION['error'][] = LineaHistorialMessage::ERR_FORM['empty_data'];
                    }
                    break;

                case 'motiu_visita':
                    $motiu_visita = trim(filter_input(INPUT_POST, 'motiu_visita'));
                    if (empty($motiu_visita)) {
                        $_SESSION['error'][] = LineaHistorialMessage::ERR_FORM['empty_motiu_visita'];
                    } else if (!preg_match(self::ALPHANUMERIC, $motiu_visita)) {
                        $_SESSION['error'][] = LineaHistorialMessage::ERR_FORM['invalid_motiu_visita'];
                    }
                    break;

                case 'descripcio':
                    $descripcio = trim(filter_input(INPUT_POST, 'descripcio'));
                    if (empty($descripcio)) {
                        $_SESSION['error'][] = LineaHistorialMessage::ERR_FORM['empty_descripcio'];
                    }
                    break;

                case 'mascota_id':
                    $mascota_id = trim(filter_input(INPUT_POST, 'mascota_id'));
                    if (empty($mascota_id)) {
                        $_SESSION['error'][] = LineaHistorialMessage::ERR_FORM['empty_mascota_id'];
                    }
                    break;
            }
        }

        $lineaHistorial = new LineaHistorial($id, $data, $motiu_visita, $descripcio, $mascota_id);
        return $lineaHistorial;
    }
}