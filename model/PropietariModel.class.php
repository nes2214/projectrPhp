<?php
//require_once "model/persist/ProductFileDAO.class.php";

require_once "model/persist/PropietariDbDAO.class.php";

class PropietariModel {

    private $dataPropietari;

    public function __construct() {
        // File
        //$this->dataPropietari=ProductFileDAO::getInstance();
        
        // Database
        $this->dataPropietari=PropietariDbDAO::getInstance();
    }

    /**
     * insert a Product
     * @param $propietari Product object to insert
     * @return TRUE or FALSE
     */
    public function add($propietari):bool {
        $result=$this->dataPropietari->add($propietari);
        
        if ($result==FALSE) {
            $_SESSION['error']=PropietariMessage::ERR_DAO['insert'];
        }
        
        return $result;
    }

    /**
     * update a Product
     * @param $propietari Product object to update
     * @return TRUE or FALSE
     */
    public function modify($propietari):bool {
        $propietari=$this->dataPropietari->modify($propietari);
        
        return $propietari;
    }

    /**
     * delete a Product
     * @param $id string Product Id to delete
     * @return TRUE or FALSE
     */    
    public function delete($id):bool {
        $propietari=$this->dataPropietari->delete($id);
        
        return $propietari;
    }

    /**
     * select all propietari
     * @param void
     * @return array of Product objects or array void
     */    
    public function listAll():array {
        $propietari=$this->dataPropietari->listAll();
        
        return $propietari;
    }

    /**
    * select a Product by Id
    * @param $id string Product Id
    * @return Product object or NULL
    */
    public function searchById($id) {
        $propietari = $this->dataPropietari->searchById($id);
        return $propietari;
    }
    


}