<?php
//print '<pre>';//necesario para postrar ordenada mente
//print_r($_POST);//mostrar en pantalla navegador info
//print_r($_FILES);//mostrar en pantalla navegador foto
require '../vendor/autoload.php';

$ropa = new Macar\Ropa;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if($_POST['accion'] ==='Registrar'){

        if(empty($_POST['nombre']))
            exit('completar titulo');

        if(empty($_POST['descripcion']))
            exit('completar descripcion');

        if(empty($_POST['categoria_id']))
            exit('seleccionar la categoria');         

        if(!is_numeric($_POST['categoria_id']))
            exit('seleccionar la categoria valida');

        $params = array(
            'nombre'=>$_POST['nombre'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d')
        );//fin array

        $rpt = $ropa->registrar($params);

        var_dump($rpt);

        if ($rpt)
            header('Location: productos/index.php');
        else
            print'error al registrar el producto';
        }//fin registrar


if ($_POST['accion']==='Actualizar'){

    
    if(empty($_POST['nombre']))
    exit('Completar nombre');

    if(empty($_POST['descripcion']))
        exit('Completar descripcion');

    if(empty($_POST['categoria_id']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoria_id']))
        exit('Seleccionar una Categoria válida');
            


$_params = array(
        'nombre'=>$_POST['nombre'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoria_id'=>$_POST['categoria_id'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
        );

        if(!empty($_POST['foto_temp']))
            $_params['foto'] = $_POST['foto_temp'];

        if(!empty($_FILES['foto']['name']))
            $_params['foto'] = subirFoto();    

        $rpt = $ropa->actualizar($_params);
        if ($rpt)
            header('Location: productos/index.php');
        else
            print'error al actualizar el producto';
      
    }
}//Fin if server 

if($_SERVER['REQUEST_METHOD'] ==='GET'){
   
    $id = $_GET['id'];

    $rpt = $ropa->eliminar($id);

       // var_dump($rpt);

        if ($rpt)
            header('Location: productos/index.php');
        //else
          //  print'error al eliminar el producto';
}



function subirFoto() {

    $carpeta = __DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];


}//fin funcion subirfoto