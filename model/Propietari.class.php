<?php
class Propietari {
    
    private $id;
    private $nom;
    private $email;
    private $mobil;

    public function __construct($id=NULL, $nom=NULL, $email=NULL, $mobil=NULL) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mobil = $mobil;
    }

        
    public function getId() { return $this->id; }
    public function setId($id) { $this->id=$id; }

    public function getNom() { return $this->nom; }
    public function setNom($nom) { $this->nom=$nom; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email=$email; }

    public function getMobil() { return $this->mobil; }
    public function setMobil($mobil) { $this->mobil=$mobil; }

    

    public function __toString() {
        return "{$this->id};{$this->nom};{$this->email};{$this->mobil}" . PHP_EOL;
    }
}