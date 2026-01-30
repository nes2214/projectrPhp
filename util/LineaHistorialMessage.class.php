<?php
class LineaHistorialMessage {
    const ERR_FORM = [
        'empty_id' => 'El camp ID és obligatori',
        'empty_data' => 'El camp data és obligatori',
        'empty_motiu_visita' => 'El camp motiu de visita és obligatori',
        'invalid_motiu_visita' => 'El motiu de visita conté caràcters no vàlids',
        'empty_descripcio' => 'El camp descripció és obligatori',  
        'empty_mascota_id' => 'El camp mascota ID és obligatori',
        'exists_id' => 'Ja existeix una línia amb aquest ID'
    ];
    
    const ERR_DAO = [
        'insert' => 'Error al inserir la línia d\'historial a la base de dades'
    ];
    
    const INF_FORM = [
        'insert' => 'Línia d\'historial afegida correctament'
    ];
}