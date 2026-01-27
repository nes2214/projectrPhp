<?php

require_once "model/persist/LineaHistorialDbDAO.class.php";
require_once "controller/ControllerInterface.php";
require_once "view/LineaHistorialView.class.php";
require_once "model/LineaHistorialModel.class.php";
require_once "model/LineaHistorial.class.php";
require_once "util/LineaHistorialMessage.class.php";
require_once "util/LineaHistorialFormValidation.class.php";

class LineaHistorialController implements ControllerInterface {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new LineaHistorialView();
        $this->model = new LineaHistorialModel();
    }

    public function processRequest() {
        if (filter_has_var(INPUT_POST, 'action')) {
            $request = filter_input(INPUT_POST, 'action');
        } else {
            $request = filter_has_var(INPUT_GET, 'option') 
                ? filter_input(INPUT_GET, 'option') 
                : NULL;
        }

        switch ($request) {
            case "form_add":
                $this->formAdd();
                break;
            case "add":
                $this->add();
                break;
        }
    }

    public function formAdd(){
        $this->view->display("view/form/LineaHistorialFormAdd.php");
    }

    public function add() {
        $lineaHistorialValid = LineaHistorialFormValidation::checkData(
            LineaHistorialFormValidation::ADD_FIELDS
        );

        if (empty($_SESSION['error'])) {
            $result = $this->model->addLineaHistorial($lineaHistorialValid);
            if ($result) {
                $_SESSION['success'][] = LineaHistorialMessage::SUCCESS['add'];
            } else {
                $_SESSION['error'][] = LineaHistorialMessage::ERROR['add'];
            }
        }

        $this->view->display();
    }
    public function listAll() {
        $lineasHistorial = $this->model->listAll();
        $this->view->display("view/lineaHistorial/listLineaHistorial.php", $lineasHistorial);
    }
    
    public function delete() {
        $id = filter_input(INPUT_GET, 'id');
        $result = $this->model->deleteLineaHistorial($id);

        if ($result) {
            $_SESSION['success'][] = LineaHistorialMessage::SUCCESS['delete'];
        } else {
            $_SESSION['error'][] = LineaHistorialMessage::ERROR['delete'];
        }

        $this->listAll();
    }

    public function modify() {
        // Similar implementation for modify
    }
    public function searchById() {
    }  
    
}