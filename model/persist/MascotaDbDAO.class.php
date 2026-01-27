<?php

require_once "model/ModelInterface.class.php";
require_once "model/persist/ConnectDb.class.php";

class MascotaDbDAO implements ModelInterface {

    private static $instance = NULL;
    private $connect;

    public function __construct() {
        $this->connect = (new ConnectDb())->getConnection();
    }

    public static function getInstance(): MascotaDbDAO {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function add($mascota): bool {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = <<<SQL
                INSERT INTO mascota (id, nom, propietari_id)
                VALUES (:id, :nom, :propietari_id);
SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $mascota->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nom", $mascota->getnom(), PDO::PARAM_STR);
            $stmt->bindValue(":propietari_id", $mascota->getPropietari_id(), PDO::PARAM_INT);

            $stmt->execute();
            return ($stmt->rowCount() > 0);

        } catch (PDOException $e) {
            return FALSE;
        }
    }

    public function modify($mascota): bool {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = <<<SQL
                UPDATE mascota
                SET nom = :nom,
                    propietari_id = :propietari_id
                WHERE id = :id;
SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $mascota->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nom", $mascota->getnom(), PDO::PARAM_STR);
            $stmt->bindValue(":propietari_id", $mascota->getPropietari_id(), PDO::PARAM_INT);

            $stmt->execute();
            return ($stmt->rowCount() > 0);

        } catch (PDOException $e) {
            return FALSE;
        }
    }

    public function delete($id): bool {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = "DELETE FROM mascota WHERE id = :id;";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return ($stmt->rowCount() > 0);

        } catch (PDOException $e) {
            return FALSE;
        }
    }

    public function listAll(): array {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return [];
        }

        try {
            $sql = "SELECT id, nom, propietari_id FROM mascota;";
            $stmt = $this->connect->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Mascota');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            return [];
        }
    }

    public function searchById($id) {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return NULL;
        }

        try {
            $sql = <<<SQL
                SELECT id, nom, propietari_id
                FROM mascota
                WHERE id = :id;
SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Mascota');
                return $stmt->fetch();
            }

            return NULL;

        } catch (PDOException $e) {
            return NULL;
        }
    }


    public function listByPropietariId($propietari_id): array {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return [];
        }

        try {
            $sql = <<<SQL
                SELECT id, nom, propietari_id
                FROM mascota
                WHERE propietari_id = :propietari_id;
SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":propietari_id", $propietari_id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Mascota');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            return [];
        }
    }
}