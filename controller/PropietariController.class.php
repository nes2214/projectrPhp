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
        $this->view = new PropietariView();
        $this->model = new PropietariModel();
    }

    public function processRequest() {
        $request = NULL;
        // NOTA: No inicialices aquí, ya se hace en index.php
        // $_SESSION['info'] = array();
        // $_SESSION['error'] = array();
        
        if (filter_has_var(INPUT_POST, 'action')) {
            $request = filter_input(INPUT_POST, 'action');
        } else {
            $request = filter_has_var(INPUT_GET, 'option') ? filter_input(INPUT_GET, 'option') : NULL;
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

    public function formAdd() {
        $this->view->display("view/form/PropietariFormAdd.php");
    }

    public function FormSModDel() {
        $this->view->display("view/form/PropietariFormSModDel.php");
    }

    public function add() {
        $propietariValid = PropietariFormValidation::checkData(PropietariFormValidation::ADD_FIELDS);        
        
        if (empty($_SESSION['error'])) {
            $propietari = $this->model->searchById($propietariValid->getId());

            if (is_null($propietari)) {
                $result = $this->model->add($propietariValid);

                if ($result == TRUE) {
                    $_SESSION['info'][] = PropietariMessage::INF_FORM['insert']; // ✅ CORREGIDO
                    $propietariValid = NULL;
                }
            } else {
                $_SESSION['error'][] = PropietariMessage::ERR_FORM['exists_id']; // ✅ CORREGIDO
            }
        }

        $this->view->display("view/form/PropietariFormAdd.php", $propietariValid);
    }

    public function formModify() {
        $this->view->display("view/form/PropietariFormModify.php");
    }    

    public function modify() {
        $propietariValid = PropietariFormValidation::checkData(PropietariFormValidation::MODIFY_FIELDS);        
        
        if (empty($_SESSION['error'])) {
            $propietari = $this->model->searchById($propietariValid->getId());

            if (!is_null($propietari)) {            
                $result = $this->model->modify($propietariValid);

                if ($result == TRUE) {
                    $_SESSION['info'][] = PropietariMessage::INF_FORM['update']; // ✅ CORREGIDO
                }
            } else {
                $_SESSION['error'][] = PropietariMessage::ERR_FORM['not_exists_id']; // ✅ CORREGIDO
            }
        }

        $this->view->display("view/form/PropietariFormSModDel.php", $propietariValid);        
    }

    public function delete() {
        $propietariValid = PropietariFormValidation::checkData(PropietariForm::DELETE_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $propietari = $this->model->searchById($propietariValid->getId());

            if (!is_null($propietari)) {            
                $result = $this->model->delete($propietariValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info'][] = PropietariMessage::INF_FORM['delete']; // ✅ CORREGIDO
                    $propietariValid = NULL;
                }
            } else {
                $_SESSION['error'][] = PropietariMessage::ERR_FORM['not_exists_id']; // ✅ CORREGIDO
            }
        }

        $this->view->display("view/form/PropietariFormSModDel.php", $propietariValid);
    }

    public function listAll() {
        $propietari = $this->model->listAll();
        
        if (!empty($propietari)) {
            $_SESSION['info'][] = PropietariMessage::INF_FORM['found']; // ✅ CORREGIDO
        } else {
            $_SESSION['error'][] = PropietariMessage::ERR_FORM['not_found']; // ✅ CORREGIDO
        }
        
        $this->view->display("view/form/PropietariList.php", $propietari);
    }

    public function searchById() {
        $propietariValid = PropietariFormValidation::checkData(PropietariFormValidation::SEARCH_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $propietari = $this->model->searchById($propietariValid->getId());

            if (!is_null($propietari)) {
                $_SESSION['info'][] = PropietariMessage::INF_FORM['found']; // ✅ CORREGIDO
                $propietariValid = $propietari;
            } else {
                $_SESSION['error'][] = PropietariMessage::ERR_FORM['not_found']; // ✅ CORREGIDO
            }
        }
            
        $this->view->display("view/form/PropietariFormSModDel.php", $propietariValid);
    }    

    public function formListProducts() {
        $this->view->display("view/form/PropietariFormSearchProduct.php");
    }    
    
    public function listProducts() {
        $name = trim(filter_input(INPUT_POST, 'name'));

        $result = NULL;
        if (!empty($name)) {
            $result = $this->model->listProducts($name);            

            if (!empty($result)) {
                $_SESSION['info'][] = "Data found"; // ✅ CORREGIDO
            } else {
                $_SESSION['error'][] = PropietariMessage::ERR_FORM['not_found']; // ✅ CORREGIDO
            }

            $this->view->display("view/form/PropietariListProduct.php", $result);
        } else {
            $_SESSION['error'][] = PropietariMessage::ERR_FORM['invalid_name']; // ✅ CORREGIDO (asumiendo que existe)
            
            $this->view->display("view/form/PropietariFormSearchProduct.php", $result);
        }
    }
}