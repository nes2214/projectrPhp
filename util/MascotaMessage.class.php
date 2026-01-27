<?php

class MascotaMessage {

    const ERR_FORM = [
        'empty_id' => 'L\'ID de la mascota és obligatori',
        'invalid_id' => 'L\'ID ha de ser numèric',
        'empty_name' => 'El nom de la mascota és obligatori',
        'invalid_name' => 'El nom no és vàlid',
        'empty_propietari' => 'Cal indicar el propietari',
        'invalid_propietari' => 'El propietari ha de ser un ID numèric',
        'not_found' => 'Mascota no trobada'
    ];

    const INF_FORM = [
        'insert' => 'Mascota afegida correctament',
        'update' => 'Mascota modificada correctament',
        'delete' => 'Mascota eliminada correctament',
        'found'  => 'Mascota trobada'
    ];

    const ERR_DAO = [
        'insert' => 'Error afegint la mascota',
        'update' => 'Error modificant la mascota',
        'delete' => 'Error eliminant la mascota'
    ];
}