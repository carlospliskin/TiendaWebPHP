<?php

session_start();

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    require 'funciones.php';
    $cliente = new Kawschool\Cliente;

    $_params = array(
        'nombre' => $_POST['nombre'],
        'apellidos' => $_POST['apellidos'],
        'email' => $_POST['email'],
        'telefono' => $_POST['telefono'],
        'comentario' => $_POST['comentario']
    );

    $cliente_id = $cliente->registrar($_params);

    $pedido = new Kawschool\Pedido;


}