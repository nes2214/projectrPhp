<?php
require_once "controller/ControllerInterface.php";
require_once "view/MascotaView.class.php";
require_once "model/MascotaModel.class.php";
require_once "model/Mascota.class.php";
require_once "util/MascotaMessage.class.php";
require_once "util/MascotaFormValidation.class.php";

class MascotaController implements ControllerInterface {

    private $view;
    private $model;

    public function __construct() {
        $this->view = new MascotaView();
        $this->model = new MascotaModel();
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
        case "list_all":
            $this->listAll();
            break;
        case "form_search":
            $this->formCercarMascota();
            break;
        case "cercar_mascota":  
            $this->cercarMascota();
            break;
        case "form_buscar_mascotes":  
            $this->formBuscarMascotes();
            break;
        case "buscar_mascotes":  
            $this->listByPropietari();
            break;
        case "form_modify":
                $this->formModify();
                break;
        case "modify":
            $this->modify();
            break;
        default:
            $this->view->display();
    }
}

    /* =========================
       MÉTODOS CRUD
    ========================== */

    public function add() {
        $mascotaValid = MascotaFormValidation::checkData(
            MascotaFormValidation::ADD_FIELDS
        );

        if (empty($_SESSION['error'])) {

            $mascota = $this->model->searchById($mascotaValid->getId());

            if (is_null($mascota)) {
                $result = $this->model->add($mascotaValid);

                if ($result === TRUE) {
                    $_SESSION['info'][] = MascotaMessage::INF_FORM['insert'];
                    $mascotaValid = null;
                } else {
                    $_SESSION['error'][] = MascotaMessage::ERR_DAO['insert'];
                }
            } else {
                $_SESSION['error'][] = MascotaMessage::ERR_FORM['exists_id'];
            }
        }

        $this->view->display("view/form/MascotaFormAdd.php", $mascotaValid);
    }

    public function modify() {
        $mascotaValid = MascotaFormValidation::checkData(
            MascotaFormValidation::MODIFY_FIELDS
        );

        if (empty($_SESSION['error'])) {
            $mascota = $this->model->searchById($mascotaValid->getId());

            if (!is_null($mascota)) {
                $result = $this->model->modify($mascotaValid);

                if ($result === TRUE) {
                    $_SESSION['info'][] = MascotaMessage::INF_FORM['update'];
                } else {
                    $_SESSION['error'][] = MascotaMessage::ERR_DAO['update'];
                }
            } else {
                $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
            }
        }

        $this->view->display("view/form/editMascota.php", $mascotaValid);
    }

    public function delete() {
        $mascotaValid = MascotaFormValidation::checkData(
            MascotaFormValidation::DELETE_FIELDS
        );

        if (empty($_SESSION['error'])) {
            $mascota = $this->model->searchById($mascotaValid->getId());

            if (!is_null($mascota)) {
                $result = $this->model->delete($mascotaValid->getId());

                if ($result === TRUE) {
                    $_SESSION['info'][] = MascotaMessage::INF_FORM['delete'];
                } else {
                    $_SESSION['error'][] = MascotaMessage::ERR_DAO['delete'];
                }
            } else {
                $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
            }
        }

        $this->view->display("view/form/editMascota.php", $mascotaValid);
    }

    public function listAll() {
        $mascotas = $this->model->listAll();

        if (!empty($mascotas)) {
            $_SESSION['info'][] = MascotaMessage::INF_FORM['found'];
        } else {
            $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/MascotaList.php", $mascotas);
    }

    public function searchById() {
        $mascotaValid = MascotaFormValidation::checkData(
            MascotaFormValidation::SEARCH_FIELDS
        );

        if (empty($_SESSION['error'])) {
            $mascota = $this->model->searchById($mascotaValid->getId());

            if (!is_null($mascota)) {
                $_SESSION['info'][] = MascotaMessage::INF_FORM['found'];
                $mascotaValid = $mascota;
            } else {
                $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
            }
        }

        $this->view->display("view/form/editMascota.php", $mascotaValid);
    }

    /**
 * Mostrar formulario de búsqueda de mascotas por propietario
 */
public function formBuscarMascotes() {
    $this->view->display("view/form/buscarMascotaForm.php");
}

/**
 * Buscar y listar mascotas por propietario
 */
public function listByPropietari() {
    $propietariId = filter_has_var(INPUT_GET, 'propietari_id')
        ? filter_input(INPUT_GET, 'propietari_id', FILTER_VALIDATE_INT)
        : NULL;

    if ($propietariId === NULL || $propietariId === FALSE) {
        $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
        $this->view->display("view/form/buscarMascotaForm.php");
        return;
    }

    $mascotes = $this->model->listByPropietariId($propietariId);

    if (!empty($mascotes)) {
        $_SESSION['info'][] = MascotaMessage::INF_FORM['found'];
    } else {
        $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
    }

    $this->view->display("view/form/buscarMascota.php", $mascotes);
}

/**
 * Mostrar formulario de búsqueda de mascota por ID
 */
public function formCercarMascota() {
    $this->view->display("view/form/cercarMascotaForm.php");
}

/**
 * Buscar mascota por ID
 */
public function cercarMascota() {
    $mascotaId = filter_has_var(INPUT_GET, 'mascota_id')
        ? filter_input(INPUT_GET, 'mascota_id', FILTER_VALIDATE_INT)
        : NULL;

    if ($mascotaId === NULL || $mascotaId === FALSE) {
        $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
        $this->view->display("view/form/cercarMascotaForm.php");
        return;
    }

    $mascota = $this->model->searchById($mascotaId);

    if (!is_null($mascota)) {
        $_SESSION['info'][] = MascotaMessage::INF_FORM['found'];
        // Convertir a array para mantener consistencia con otras vistas
        $mascotes = [$mascota];
    } else {
        $_SESSION['error'][] = MascotaMessage::ERR_FORM['not_found'];
        $mascotes = [];
    }

    $this->view->display("view/form/buscarMascota.php", $mascotes);
}
    /* =========================
       FORMULARIOS
    ========================== */

    public function formAdd() {
        $this->view->display("view/form/MascotaFormAdd.php");
    }

    public function formSModDel() {
        $this->view->display("view/form/editMascota.php");
    }

    public function formModify() {
    // Ahora sí usamos INPUT_POST
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id) {
        $mascota = $this->model->searchById($id);
        
        if ($mascota) {
            // Pasamos el objeto a la vista del formulario
            $this->view->display("view/form/editMascota.php", $mascota);
        } else {
            $_SESSION['error'][] = "No s'ha trobat la mascota.";
            $this->listAll();
        }
    } else {
        $_SESSION['error'][] = "Error: No s'ha rebut un ID vàlid per POST.";
        $this->listAll();
    }
}
}