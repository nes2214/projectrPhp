<?php
class ProductMessage {

    const INF_FORM = array(
        'insert' => 'Product inserted successfully',
        'update' => 'Product updated successfully',
        'delete' => 'Product deleted successfully',
        'found'  => 'Product found',
        '' => ''
    );

    const ERR_FORM = array(
        'empty_id'      => 'Id must be filled',
        'empty_name'    => 'Name must be filled',
        'empty_price'   => 'Price must be filled',
        'invalid_id'    => 'Id must be numeric',
        'invalid_name'  => 'Name must be alphanumeric',
        'invalid_price' => 'Price must be numeric and >= 0',
        'exists_id'     => 'Id already exists',
        'not_found'     => 'No data found',
        '' => ''
    );

    const ERR_DAO = array(
        'insert' => 'Error inserting product',
        'update' => 'Error updating product',
        'delete' => 'Error deleting product',
        '' => ''
    );

}
