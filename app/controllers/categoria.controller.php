<?php
require_once './app/models/categoria.model.php';
require_once './app/views/api.view.php';

class EquipoApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new EquipoModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getEquipos($params = null) {
        // Verifica existen las variables sort y order
        if (isset($_GET['order']) && isset($_GET['sort'])) {
            // Si la variable es id ordena byId
            if ($_GET['sort'] == "id" || $_GET['sort'] == "ID") {
                // Verifica si es ASC
                if ($_GET['order'] == "asc" || $_GET['order'] == "ASC") {
                    $equipos = $this->model->getEquiposAscById();
                    $this->view->response($equipos);
            }
            // Sino ordena DESC
            else if ($_GET['order'] == "desc" || $_GET['order'] == "DESC") {
                    $equipos = $this->model->getEquiposDescById();
                    $this->view->response($equipos);
                }
            }

            if ($_GET['sort'] == "nombre" || $_GET['sort'] == "equipo") {
                // Verifica si es ASC
                if ($_GET['order'] == "asc" || $_GET['order'] == "ASC") {
                    $equipos = $this->model->getEquiposAscByNombre();
                    $this->view->response($equipos);
            }
            // Sino ordena DESC
            else if ($_GET['order'] == "desc" || $_GET['order'] == "DESC") {
                    $equipos = $this->model->getEquiposDescByNombre();
                    $this->view->response($equipos, 200);
                }
            }
            else{
                $this->view->response("Valor de variables incorrecto", 400);
            }
        }
        // Sino tiene sort u order muestra normal
        if (!isset($_GET['order']) && !isset($_GET['sort'])) {
            $equipos = $this->model->getAll();
            $this->view->response($equipos);
        }
        else if (!isset($_GET['order']) || !isset($_GET['sort'])) {
            $this->view->response("Error en la consulta", 400);
        }
    }
    

    public function getEquipo($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $equipo = $this->model->get($id);

        // si no existe devuelvo 404
        if ($equipo)
            $this->view->response($equipo);
        else 
            $this->view->response("El equipo con el id=$id no existe", 404);
    }

    public function deleteEquipo($params = null) {
        $id = $params[':ID'];
        $equipo = $this->model->get($id);
        if ($equipo) {
            $this->model->delete($id);
            $this->view->response($equipo);
        } else 
            $this->view->response("El equipo con el id= $id no existe", 404);
    }

    public function insertEquipo($params = null) {
        $equipo = $this->getData();

        if (empty($equipo->nombre) || empty($equipo->estadio) || empty($equipo->imagen) || empty($equipo->id_categoria)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insert($equipo->nombre, $equipo->estadio, $equipo->imagen, $equipo->id_categoria);
            $equipo = $this->model->get($id);
            $this->view->response($equipo, 201);
        }
    }


    // public function updateEquipo($params = null) {
    //     $id = $params[':ID'];
    //     $equipo = $this->getData();
        
    //     $equipo = $this->model->getById($id);
    //     if ($equipo) {
    //         $this->model->update($id, $equipo->nombre, $equipo->estadio, $equipo->categoria);
    //         $this->view->response("El equipo fue modificado correctamente.", 200);
    //     }else{
    //     $this->view->response("El equipo con el id= $id no existe", 404);
    //     }
    // }


    public function updateEquipo($params = null) {
        $id = $params[':ID'];
        $data = $this->getData();
        
        $equipo = $this->model->get($id);
        if ($equipo) {
            $this->model->update($id, $equipo->nombre, $equipo->estadio);
            $this->view->response("El equipo fue modificado correctamente.", 200);
        } else
            $this->view->response("El equipo con el id= $id no existe", 404);
    }






}