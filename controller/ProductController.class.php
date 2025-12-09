<?php
require_once "controller/ControllerInterface.php";
require_once "view/ProductView.class.php";
require_once "model/ProductModel.class.php";
require_once "model/Product.class.php";


class ProductController implements ControllerInterface {

    private $view;
    private $model;

    public function __construct() {
        $this->view = new ProductView();
        $this->model = new ProductModel();
    }

    public function processRequest() {
        $request = filter_input(INPUT_GET, 'option') ?: null;

        switch ($request) {
            case "form_add":
                $this->formAdd();
                break;
            case "add":
                $this->add();
                break;
            case "modify":
                $this->modify();
                break;
            case "delete":
                $this->delete();
                break;
            case "list_all":
                $this->listAll();
                break;
            case "search":
                $this->searchById();
                break;
            default:
                $this->view->display();
        }
    }

    // Métodos obligatorios de ControllerInterface
    public function add() {
        // Lógica para agregar producto
    }

    public function modify() {
        // Lógica para modificar producto
    }

    public function delete() {
        // Lógica para eliminar producto
    }

    public function listAll() {
        // Lógica para listar todos los productos
    }

    public function searchById() {
        // Lógica para buscar producto por ID
    }

    // Métodos adicionales
    public function formAdd() {
        $this->view->display("view/form/ProductFormAdd.php");
    }

}

