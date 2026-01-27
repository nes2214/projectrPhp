<?php

require_once "model/persist/LineaHistorialDbDAO.class.php";

class LineaHistorialModel {

    private $dataLineaHistorial;

    public function __construct() {
        // Database
        $this->dataLineaHistorial = LineaHistorialDbDAO::getInstance();
    }

    /**
     * insert a linea historial
     * @param $lineaHistorial LineaHistorial object to insert
     * @return TRUE or FALSE
     */
    public function add($lineaHistorial): bool {
        $result = $this->dataLineaHistorial->add($lineaHistorial);

        if ($result == FALSE) {
            $_SESSION['error'] = "Error inserting linea historial";
        }

        return $result;
    }

    /**
     * update a linea historial
     * @param $lineaHistorial LineaHistorial object to update
     * @return TRUE or FALSE
     */
    public function modify($lineaHistorial): bool {
        return $this->dataLineaHistorial->modify($lineaHistorial);
    }

    /**
     * delete a linea historial
     * @param $id int LineaHistorial Id to delete
     * @return TRUE or FALSE
     */
    public function delete($id): bool {
        return $this->dataLineaHistorial->delete($id);
    }

    /**
     * select all lineas historial
     * @return array of LineaHistorial objects or empty array
     */
    public function listAll(): array {
        return $this->dataLineaHistorial->listAll();
    }

    /**
     * select linea historial by Id
     * @param $id int LineaHistorial Id
     * @return LineaHistorial object or NULL
     */
    public function searchById($id) {
        return $this->dataLineaHistorial->searchById($id);
    }

    /**
     * 🔑 select lineas historial by mascota_id
     * @param $mascota_id int
     * @return array of LineaHistorial objects
     */
    public function listByMascotaId($mascota_id): array {
        return $this->dataLineaHistorial->listByMascotaId($mascota_id);
    }
}