<?php


function agregarPelicula($resultado, $id, $cantidad = 1){
    
    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'titulo' => $resultado['titulo'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );


}


function calcularTotal(){

}

function cantidadPeliculas(){
    
}