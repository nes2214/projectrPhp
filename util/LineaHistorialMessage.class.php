<?php

class LineaHistorialMessage {
    
    const ERR_FORM = array(
        'empty_id' => 'El ID no puede estar vacío',
        'invalid_id' => 'El ID debe ser numérico',
        'empty_data' => 'La fecha no puede estar vacía',
        'invalid_data' => 'El formato de la fecha no es válido',
        'empty_motiu_visita' => 'El motivo de visita no puede estar vacío',
        'invalid_motiu_visita' => 'El motivo de visita no es válido',
        'empty_mascota_id' => 'El ID de la mascota no puede estar vacío',
        'invalid_mascota_id' => 'El ID de la mascota debe ser numérico',
        'exists_id' => 'Ya existe una línea de historial con ese ID',
        'not_exists_id' => 'No existe una línea de historial con ese ID',
        'not_exists_mascota' => 'No existe una mascota con ese ID',
        'not_found' => 'No se encontraron resultados'
    );
    
    const INF_FORM = array(
        'insert' => 'Línea de historial insertada correctamente',
        'update' => 'Línea de historial actualizada correctamente',
        'delete' => 'Línea de historial eliminada correctamente',
        'found' => 'Datos encontrados'
    );
    
    const ERR_DAO = array(
        'insert' => 'Error al insertar la línea de historial en la base de datos',
        'update' => 'Error al actualizar la línea de historial en la base de datos',
        'delete' => 'Error al eliminar la línea de historial de la base de datos',
        'select' => 'Error al consultar la base de datos',
        'connection' => 'Error de conexión con la base de datos'
    );
    
    const INF_DAO = array(
        'insert' => 'Línea de historial insertada correctamente en la base de datos',
        'update' => 'Línea de historial actualizada correctamente en la base de datos',
        'delete' => 'Línea de historial eliminada correctamente de la base de datos'
    );
}