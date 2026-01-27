<?php
class Mascota {

    private $id;
    private $nom;
    private $propietari_id;

    public function __construct($id = NULL, $nom = NULL, $propietari_id = NULL) {
        $this->id = $id;
        $this->nom = $nom;
        $this->propietari_id = $propietari_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPropietari_id() {
        return $this->propietari_id;
    }

    public function setPropietari_id($propietari_id) {
        $this->propietari_id = $propietari_id;
    }

    public function __toString() {
        return sprintf(
            "%s;%s;%s\n",
            $this->id,
            $this->nom,
            $this->propietari_id
        );
    }
}