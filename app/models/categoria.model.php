<?php

class EquipoModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    //Muestra todo lo que hay en la tabla equipos
    public function getAll() {

        // Ejecuto la sentencia
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria;");       
        $query->execute();

        // Obtengo los resultados
        $equipos = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $equipos;
    }
    // Ordena de manera ASC segun ID
    public function getEquiposAscById() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY id_equipo ASC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    // Ordena de manera DESC segun ID
    public function getEquiposDescById() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY id_equipo DESC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }
    // Ordena de manera ASC segun Nombre
    public function getEquiposAscByNombre() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY nombre ASC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }
    // Ordena de manera DESC segun Nombre
    public function getEquiposDescByNombre() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY nombre DESC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function getEquiposAscByEstadio() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY estadio ASC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function getEquiposAscByCategoria() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY name_categoria ASC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function getEquiposDescByCategoria() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY name_categoria DESC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function getEquiposDescByEstadio() {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria ORDER BY estadio DESC;");       
        $query->execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    // Devuelve un equipo seleccionado por su id
    public function get($id) {
        $query = $this->db->prepare("SELECT a.id_equipo,nombre,estadio, b.name_categoria FROM equipos a INNER JOIN categorias b ON a.id_categoria = b.id_categoria WHERE a.id_equipo = ?;");
        $query->execute([$id]);
        $equipo = $query->fetch(PDO::FETCH_OBJ);
        
        return $equipo;
    }
    
    // Inserta un equipo en la base de datos
    public function insert($nombre, $estadio, $imagen, $categoria) {
        $query = $this->db->prepare('INSERT INTO equipos(nombre, estadio, imagen, id_categoria) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $estadio, $imagen, $categoria]);
        return $this->db->lastInsertId();
    }

    //  Elimina un equipo seleccionada por su id
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id_equipo = ?');
        $query->execute([$id]);
    }

    // Actualiza un equipo por su id
    // function update($id, $nombre, $estadio, $categoria) {
    //     $query = $this->db->prepare('UPDATE equipos SET nombre = ?, estadio = ?, id_categoria= ? WHERE id_equipo = ?');
    //     $query->execute([$id, $nombre, $estadio, $categoria]);
    // }

    function update($idEquipo, $nombre, $estadio) {
        $query = $this->db->prepare('UPDATE equipos SET nombre = ?, estadio = ? WHERE id_equipo = ?');
        $query->execute([$idEquipo, $nombre, $estadio]);
    }


}