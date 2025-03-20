<?php
require_once("usuarioService.php");

$data=["nombre"=>"Anton","clave"=>"12345","correo"=>"antonbgi98@gmail.com"];

usuarioController::insertUsuario($data);