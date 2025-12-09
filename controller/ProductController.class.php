<?php
require_once "controller/ControllerInterface.php";
require_once "view/ProductView.class.php";
require_once "model/ProductModel.class.php";
require_once "model/Product.class.php";
require_once "util/ProductMessage.class.php";
require_once "util/ProductFormValidation.class.php";

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
        $productValid = ProductFormValidation::checkData(ProductFormValidation::ADD_FIELDS);

        if (empty($_SESSION['error'])) {
            $product = $this->model->searchById($productValid->getId());

            if (is_null($product)) {
                $result = $this->model->add($productValid);

                if ($result === TRUE) {
                    $_SESSION['info'][] = ProductMessage::INF_FORM['insert'];
                    $productValid = null;
                } else {
                    $_SESSION['error'][] = ProductMessage::ERR_DAO['insert'];
                }
            } else {
                $_SESSION['error'][] = ProductMessage::ERR_FORM['exists_id'];
            }
        }

        // Volver a cargar el formulario con datos y categorías
        $categories = $this->model->listCategories();
        $this->view->display("view/form/ProductFormAdd.php", $productValid, $categories);
    }

    public function modify() {
        // Lógica para modificar producto
    }

    public function delete() {
        // Lógica para eliminar producto
    }

    public function listAll() {
    // Obtener todos los productos
    $products = $this->model->listAll();

    if (!empty($products)) { // si hay productos
        $_SESSION['info'][] = ProductMessage::INF_FORM['found'];
    } else {
        $_SESSION['error'][] = ProductMessage::ERR_FORM['not_found'];
    }

    // Mostrar la vista con los productos
    $this->view->display("view/form/ProductList.php", $products);
    }

    public function searchById() {
        // Lógica para buscar producto por ID
    }

    // Métodos adicionales
    public function formAdd() {
        $this->view->display("view/form/ProductFormAdd.php");
    }

}

