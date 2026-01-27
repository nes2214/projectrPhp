<?php

class PropietariFormValidation {

    const ADD_FIELDS = array('id', 'nom', 'email', 'mobil');
    const MODIFY_FIELDS = array('id', 'nom', 'email', 'mobil');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');
    
    const NUMERIC = "/^[0-9]+$/";  // ✅ Solo números (sin negación)
    const ALPHABETIC = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";  // ✅ Solo letras y espacios (sin negación)
    const MOBILE_PATTERN = "/^[0-9]{9}$/";
    
    public static function checkData($fields) {
        $id = NULL;
        $nom = NULL;
        $email = NULL;
        $mobil = NULL;
        
        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    $id = filter_input(INPUT_POST, 'id');
                    $id = $id !== null ? trim($id) : '';
                    
                    if (empty($id)) {
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['empty_id']);
                    }
                    else if (!preg_match(self::NUMERIC, $id)) {  // ✅ Lógica directa
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                    
                case 'nom':
                    $nom = filter_input(INPUT_POST, 'nom');
                    $nom = $nom !== null ? trim($nom) : '';
                    
                    if (empty($nom)) {
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['empty_nom']);
                    }
                    else if (!preg_match(self::ALPHABETIC, $nom)) {  // ✅ Lógica directa
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['invalid_nom']);
                    }
                    break;
                    
                case 'email':
                    $email = filter_input(INPUT_POST, 'email');
                    $email = $email !== null ? trim($email) : '';
                    
                    if (empty($email)) {
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['empty_email']);
                    }
                    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // ✅ Ya estaba bien
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['invalid_email']);
                    }
                    break;
                    
                case 'mobil':
                    $mobil = filter_input(INPUT_POST, 'mobil');
                    $mobil = $mobil !== null ? trim($mobil) : '';
                    
                    if (empty($mobil)) {
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['empty_mobil']);
                    }
                    else if (!preg_match(self::MOBILE_PATTERN, $mobil)) {  // ✅ Lógica directa
                        array_push($_SESSION['error'], PropietariMessage::ERR_FORM['invalid_mobil']);
                    }
                    break;
            }
        }
        
        $propietari = new Propietari($id, $nom, $email, $mobil);
        
        return $propietari;
    }
}