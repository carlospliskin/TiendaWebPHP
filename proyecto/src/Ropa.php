<?php
namespace Macar;

class Ropa{

    private $config;
    private $cn = null;

    public function __construct()
    {
     $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        //print '<pre>';//mostar en pantalla
        //print_r($this->config);//mostrar en pantalla web
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'],$this->config['clave'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }
public function registrar($_params){
    $sql = "INSERT INTO `ropa`(`nombre`, `descripcion`, `foto`, `precio`, `categoria_id`, `fecha`) 
    VALUES (:nombre, :descripcion, :foto, :precio, :categoria_id, :fecha)";

    $resultado = $this->cn->prepare($sql);

    $_array = array(
        ":nombre" => $_params['nombre'], 
        ":descripcion" => $_params['descripcion'], 
        ":foto" => $_params['foto'], 
        ":precio" => $_params['precio'], 
        ":categoria_id" => $_params['categoria_id'], 
        ":fecha"=> $_params['fecha']
    );
    if($resultado->execute($_array))
        return true;

    return false;
}// FinRegistrar

public function actualizar($_params){
    $sql = "UPDATE ropa SET nombre= :nombre, descripcion= :descripcion, foto = :foto, precio = :precio, categoria_id = :categoria_id, fecha = :fecha WHERE  id  = :id";
    $resultado = $this->cn->prepare($sql);

    $_array = array(
        ":nombre" => $_params['nombre'], 
        ":descripcion" => $_params['descripcion'], 
        ":foto" => $_params['foto'], 
        ":precio" => $_params['precio'], 
        ":categoria_id" => $_params['categoria_id'], 
        ":fecha"=> $_params['fecha'],
        ":id"=> $_params['id']
    );
    if($resultado->execute($_array))
        return true;

        return false;

}// Actualizar

public function eliminar($id){

    $sql = "DELETE FROM ropa WHERE id = :id ";
    $resultado = $this->cn->prepare($sql);

    $_array = array(
        ":id" => $id
    );
    if($resultado->execute($_array))
        return true;

        return false;
}// Eliminar

public function mostrar(){
    $sql = "SELECT ropa.id, nombre, descripcion, foto, nombre1, precio, fecha, estado FROM ropa

    INNER JOIN categorias
    ON ropa.categoria_id = categorias.id ORDER BY ropa.id DESC
    ";
    $resultado = $this->cn->prepare($sql);

    
    if($resultado->execute())
        return $resultado->fetchAll();

        return false;
}// Mostrar

public function mostrarPorId($id){
    $sql = "SELECT * FROM ropa WHERE id = :id ";
    $resultado = $this->cn->prepare($sql);
    $_array = array(
        ":id" => $id
    );

    if($resultado->execute($_array))
        return $resultado->fetch();

        return false; 
}// MostrarId

}