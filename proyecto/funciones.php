<?php

function agregarProductos($resultado, $id, $cantidad = 1){

    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'nombre' => $resultado['nombre'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
    );
}
function actualizarProductos($id,$cantidad = false){

    if($cantidad)
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    else
        $_SESSION['carrito'][$id]['cantidad'] +=1;
}
function calcularTotal(){

    $total = 0;//ACUMULADOR DEL TOTAL
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }
    return $total;
}

function cantidadProductos(){

    $cantidad = 0;//ACUMULADOR DEL TOTAL
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $cantidad++;
        }
    }
    return $cantidad;

}