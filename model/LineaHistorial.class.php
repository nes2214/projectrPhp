<?php

class LineaHistorial {
    
    private $id;
    private $data;
    private $motiu_visita;
    private $mascota_id;

    public function __construct($id = null, $data = null, $motiu_visita = null, $mascota_id = null) {
        $this->id = $id;
        $this->data = $data;
        $this->motiu_visita = $motiu_visita;
        $this->mascota_id = $mascota_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getMotiu_visita() {
        return $this->motiu_visita;
    }

    public function getMascota_id() {
        return $this->mascota_id;
    }

    // Setters
    public function setId($id): void {
        $this->id = $id;
    }

    public function setData($data): void {
        $this->data = $data;
    }

    public function setMotiu_visita($motiu_visita): void {
        $this->motiu_visita = $motiu_visita;
    }

    public function setMascota_id($mascota_id): void {
        $this->mascota_id = $mascota_id;
    }

    // Método toString para debugging
    public function __toString(): string {
        return "LineaHistorial [id={$this->id}, data={$this->data}, motiu_visita={$this->motiu_visita}, mascota_id={$this->mascota_id}]";
    }
}