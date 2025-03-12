<?php
require_once(__DIR__ . "/../services/valoracionesService.php");

class Receta
{
    private $id;
    private $titulo;
    private $descripcion;
    private $pasos;
    private $imagen;
    private $categoria;
    private $usuario;
    private $fechaCreacion;

    public function __construct($id, $titulo, $descripcion, $pasos, $imagen, $categoria, $usuario, $fechaCreacion)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->pasos = $pasos;
        $this->imagen = $imagen;
        $this->categoria = $categoria;
        $this->usuario = $usuario;
        $this->fechaCreacion = $fechaCreacion;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getPasos()
    {
        return $this->pasos;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    //Derivados
    public function getPuntuacionMedia()
    {
        return puntuacionMedia($this);
    }
    // Setters
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setPasos($pasos)
    {
        $this->pasos = $pasos;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    // Método para mostrar la receta como string
    public function __toString()
    {
        return "Receta: $this->titulo (Categoría: $this->categoria)\nDescripción: $this->descripcion\nPasos: $this->pasos\nUsuario: $this->usuario\nFecha de Creación: $this->fechaCreacion";
    }
}
