<?php
require_once "controller/ControllerInterface.php";
require_once "view/PropietariView.class.php";
require_once "model/PropietariModel.class.php";
require_once "model/Propietari.class.php";
require_once "util/PropietariMessage.class.php";
require_once "util/PropietariFormValidation.class.php";

class PropietariController implements ControllerInterface {

    private $view;
    private $model;

    public function __construct() {
        // carga la vista
        $this->view=new PropietariView();

        // carga el modelo de datos
        $this->model=new PropietariModel();
    }

    // carga la vista según la opción o ejecuta una acción específica
    public function processRequest() {
        
        $request=NULL;
        $_SESSION['info']=array();
        $_SESSION['error']=array();
        
        // recupera la acción de un formulario
        if (filter_has_var(INPUT_POST, 'action')) {
            $request=filter_has_var(INPUT_POST, 'action')?filter_input(INPUT_POST, 'action'):NULL;
        }
        // recupera la opción de un menú
        else {
            $request=filter_has_var(INPUT_GET, 'option')?filter_input(INPUT_GET, 'option'):NULL;
        }
        
        switch ($request) {
          
      
            case "list_all":
                $this->listAll();
                break;
            case "form_smoddel":
                $this->FormSModDel();
                break;
            case "search":
                $this->searchById();
                break;
           
            case "modify":
                $this->modify();
                break;
            default:
                $this->view->display();
            
        }
    }

    // carga el formulario de insertar categoría
    public function formAdd() {
        $this->view->display("view/form/PropietariFormAdd.php");
    }

    public function FormSModDel() {
        $this->view->display("view/form/PropietariFormSModDel.php");
    }

    // ejecuta la acción de insertar categoría
    public function add() {
        $propietariValid=PropietariFormValidation::checkData(PropietariFormValidation::ADD_FIELDS);        
        
        if (empty($_SESSION['error'])) {
            $propietari=$this->model->searchById($propietariValid->getId());

            if (is_null($propietari)) {
                $result=$this->model->add($propietariValid);

                if ($result == TRUE) {
                    $_SESSION['info']=PropietariMessage::INF_FORM['insert'];
                    $propietariValid=NULL;
                }
            }
            else {
                $_SESSION['error']=PropietariMessage::ERR_FORM['exists_id'];          
            }
        }

        $this->view->display("view/form/PropietariFormAdd.php", $propietariValid);
    }

    // carga el formulario de modificar categoria
    public function formModify() {
        $this->view->display("view/form/PropietariFormModify.php");
    }    

    // ejecuta la acción de modificar categoría    
    public function modify() {
        $propietariValid=PropietariFormValidation::checkData(PropietariFormValidation::MODIFY_FIELDS);        
        
        if (empty($_SESSION['error'])) {
            $propietari=$this->model->searchById($propietariValid->getId());

            if (!is_null($propietari)) {            
                $result=$this->model->modify($propietariValid);

                if ($result == TRUE) {
                    $_SESSION['info']=PropietariMessage::INF_FORM['update'];
                }
            }
            else {
                $_SESSION['error']=PropietariMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/PropietariFormSModDel.php", $propietariValid);        
    }

    // ejecuta la acción de eliminar categoría    
    public function delete() {
        $propietariValid=PropietariFormValidation::checkData(PropietariForm::DELETE_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $propietari=$this->model->searchById($propietariValid->getId());

            if (!is_null($propietari)) {            
                $result=$this->model->delete($propietariValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info']=PropietariMessage::INF_FORM['delete'];
                    $propietariValid=NULL;
                }
            }
            else {
                $_SESSION['error']=PropietariMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/PropietariFormSModDel.php", $propietariValid);
    }

    // ejecuta la acción de mostrar todas las categorías
    public function listAll() {
        $propietari=$this->model->listAll();
        
        if (!empty($propietari)) { // array void or array of Propietari objects?
            $_SESSION['info']=PropietariMessage::INF_FORM['found'];
        }
        else {
            $_SESSION['error']=PropietariMessage::ERR_FORM['not_found'];
        }
        
        $this->view->display("view/form/PropietariList.php", $propietari);
    }

    // ejecuta la acción de buscar categoría por id de categoría
    public function searchById() {
        $propietariValid=PropietariFormValidation::checkData(PropietariFormValidation::SEARCH_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $propietari=$this->model->searchById($propietariValid->getId());

            if (!is_null($propietari)) { // is NULL or Propietari object?
                $_SESSION['info']=PropietariMessage::INF_FORM['found'];
                $propietariValid=$propietari;
            }
            else {
                $_SESSION['error']=PropietariMessage::ERR_FORM['not_found'];
            }
        }
            
        $this->view->display("view/form/PropietariFormSModDel.php", $propietariValid);
    }    

    // carga el formulario de buscar productos por nombre de categoría
    public function formListProducts() {
        $this->view->display("view/form/PropietariFormSearchProduct.php");
    }    
    
    // ejecuta la acción de buscar productos por nombre de categoría
    public function listProducts() {
        $name=trim(filter_input(INPUT_POST, 'name'));

        $result=NULL;
        if (!empty($name)) { // Propietari Name is void?
            $result=$this->model->listProducts($name);            

            if (!empty($result)) { // array void or array of Product objects?
                $_SESSION['info']="Data found"; 
            }
            else {
                $_SESSION['error']=PropietariMessage::ERR_FORM['not_found'];
            }

            $this->view->display("view/form/PropietariListProduct.php", $result);
        }
        else {
            $_SESSION['error']=Prpoi::ERR_FORM['invalid_name'];
            
            $this->view->display("view/form/PropietariFormSearchProduct.php", $result);
        }
    }

    

    
}