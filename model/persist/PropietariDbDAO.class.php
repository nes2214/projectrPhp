<?php

require_once "model/ModelInterface.class.php";
require_once "model/persist/ConnectDb.class.php";

class PropietariDbDAO implements ModelInterface {

    private static $instance = NULL;
    private $connect;

    public function __construct() {
        $this->connect = (new ConnectDb())->getConnection();
    }

    public static function getInstance(): PropietariDbDAO {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function add($propietari): bool {  // ✅ CORREGIDO: $propietari (con 'e')
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = <<<SQL
                INSERT INTO propietari (id, nom, email, mobil) 
                VALUES (:id, :nom, :email, :mobil);
SQL;
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $propietari->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nom", $propietari->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $propietari->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":mobil", $propietari->getMobil(), PDO::PARAM_STR);

            $stmt->execute(); 

            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error al insertar: " . $e->getMessage();
            return FALSE;
        }
    }

    public function modify($propietari): bool {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = <<<SQL
                UPDATE propietari 
                SET nom=:nom, email=:email, mobil=:mobil 
                WHERE id=:id;
SQL;
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $propietari->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nom", $propietari->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $propietari->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":mobil", $propietari->getMobil(), PDO::PARAM_STR);

            $stmt->execute();

            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error al modificar: " . $e->getMessage();
            return FALSE;
        }
    }

    public function delete($id): bool {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = <<<SQL
                DELETE FROM propietari WHERE id=:id;
SQL;
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute(); 

            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error al eliminar: " . $e->getMessage();
            return FALSE;
        }
    }

    public function listAll(): array {
        $result = array();

        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return $result;
        }

        try {
            $sql = <<<SQL
                SELECT id, nom, email, mobil FROM propietari;
SQL;

            $stmt = $this->connect->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Propietari');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error al listar: " . $e->getMessage();
            return $result;
        }
    }

    public function searchById($id) {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return NULL;
        }

        try {
            $sql = <<<SQL
                SELECT id, nom, email, mobil FROM propietari WHERE id=:id;
SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Propietari');
                return $stmt->fetch();
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error al buscar: " . $e->getMessage();
            return NULL;
        }
    }
}