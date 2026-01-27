<?php

require_once "model/ModelInterface.class.php";
require_once "model/persist/ConnectDb.class.php";   

class LineaHistorialDbDAO implements ModelInterface {

    private static $instance = NULL;
    private $connect;

    public function __construct() {
        $this->connect = (new ConnectDb())->getConnection();
    }

    public static function getInstance(): LineaHistorialDbDAO {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function add($lineaHistorial): bool {
        if ($this->connect == NULL) {
            $_SESSION['error'] = "Unable to connect to database";
            return FALSE;
        }

        try {
            $sql = <<<SQL
                INSERT INTO linea_historial (id, data, motiu_visita, mascota_id)
                VALUES (:id, :data, :motiu_visita, :mascota_id);
SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(":id", $lineaHistorial->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":data", $lineaHistorial->getData(), PDO::PARAM_STR);
            $stmt->bindValue(":motiu_visita", $lineaHistorial->getMotiu_visita(), PDO::PARAM_STR);
            $stmt->bindValue(":mascota_id", $lineaHistorial->getMascota_id(), PDO::PARAM_INT);

            $stmt->execute();
            return ($stmt->rowCount() > 0);

        } catch (PDOException $e) {
            return FALSE;
        }
    }   
    public function searchById($lineaHistorial){
        
    }
    
    
    public function listAll():array{
        return [];
        
    }
    public function modify($object):bool{
        return true;
    }

    public function delete($id):bool{
        return true;
    }
}                                                                                                                                                                                                                                                                                   