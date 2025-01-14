<?php
class Usuario
{
    private $nombre;
    private $apellidos;
    private $dni;
    private $telefono;
    private $email;
    private $fechaNacimiento;
    function __construct(String $nombre, String $apellidos, String $dni, Int $telefono, String $email, String $fechaNacimiento)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __toString()
    {
        $info = $this->nombre .' ' . $this->apellidos. ' '. $this->dni . ' ' . $this->telefono . ' ' . $this->email . ' ' . $this->fechaNacimiento;
        return $info;
    }
}
