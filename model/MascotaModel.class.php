<?php

require_once "model/persist/MascotaDbDAO.class.php";

class MascotaModel {

    private $dataMascota;

    public function __construct() {
        // Database
        $this->dataMascota = MascotaDbDAO::getInstance();
    }

    /**
     * insert a mascota
     * @param $mascota Mascota object to insert
     * @return TRUE or FALSE
     */
    public function add($mascota): bool {
        $result = $this->dataMascota->add($mascota);

        if ($result == FALSE) {
            $_SESSION['error'] = "Error inserting mascota";
        }

        return $result;
    }

    /**
     * update a mascota
     * @param $mascota Mascota object to update
     * @return TRUE or FALSE
     */
    public function modify($mascota): bool {
        return $this->dataMascota->modify($mascota);
    }

    /**
     * delete a mascota
     * @param $id int Mascota Id to delete
     * @return TRUE or FALSE
     */
    public function delete($id): bool {
        return $this->dataMascota->delete($id);
    }

    /**
     * select all mascotas
     * @return array of Mascota objects or empty array
     */
    public function listAll(): array {
        return $this->dataMascota->listAll();
    }

    /**
     * select mascota by Id
     * @param $id int Mascota Id
     * @return Mascota object or NULL
     */
    public function searchById($id) {
        return $this->dataMascota->searchById($id);
    }

    /**
     * 🔑 select mascotas by propietari_id
     * @param $propietari_id int
     * @return array of Mascota objects
     */
    public function listByPropietariId($propietari_id): array {
        return $this->dataMascota->listByPropietariId($propietari_id);
    }
}