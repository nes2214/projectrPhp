<?php

class PropietariMessage {
    
    const ERR_FORM = array(
        'empty_id' => 'El ID no puede estar vacío',
        'invalid_id' => 'El ID debe ser numérico',
        'empty_nom' => 'El nombre no puede estar vacío',
        'invalid_nom' => 'El nombre solo puede contener letras',
        'empty_email' => 'El email no puede estar vacío',
        'invalid_email' => 'El formato del email no es válido',
        'empty_mobil' => 'El móvil no puede estar vacío',  // ✅ CAMBIADO
        'invalid_mobil' => 'El móvil debe tener 9 dígitos', 
        'exists_id' => 'Ya existe un propietario con ese ID',
        'not_exists_id' => 'No existe un propietario con ese ID',
        'not_found' => 'No se encontraron resultados'
    );
    
    const INF_FORM = array(
        'insert' => 'Propietario insertado correctamente',
        'update' => 'Propietario actualizado correctamente',
        'delete' => 'Propietario eliminado correctamente',
        'found' => 'Datos encontrados'
    );
    
    const ERR_DAO = array(
        'insert' => 'Error al insertar el propietario en la base de datos',
        'update' => 'Error al actualizar el propietario en la base de datos',
        'delete' => 'Error al eliminar el propietario de la base de datos',
        'select' => 'Error al consultar la base de datos',
        'connection' => 'Error de conexión con la base de datos'
    );
    
    const INF_DAO = array(
        'insert' => 'Propietario insertado correctamente en la base de datos',
        'update' => 'Propietario actualizado correctamente en la base de datos',
        'delete' => 'Propietario eliminado correctamente de la base de datos'
    );
}