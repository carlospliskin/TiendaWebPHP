<?php
namespace Macar;

class Pedido{

    private $config;
    private $cn = null;

    public function __construct(){
    {
     $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        //print '<pre>';//mostar en pantalla
        //print_r($this->config);//mostrar en pantalla web
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'],$this->config['clave'],
        array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

}

    public function registrar($_params){
        $sql = "INSERT INTO `pedidos`(`cliente_id`, `total`, `fecha`) VALUES (:cliente_id,:total,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":cliente_id" => $_params['cliente_id'], 
            ":total" => $_params['total'], 
            ":fecha" => $_params['fecha'], 
        );
        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
        }// FinRegistrar

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `detalle_pedidos`(`pedidos_id`, `ropa_id`, `precio`, `cantidad`) 
        VALUES (:pedido_id,:ropa_id,:precio,:cantidad)";
    
        $resultado = $this->cn->prepare($sql);
    
        $_array = array(
            ":pedido_id" => $_params['pedido_id'], //cliente_id
            ":ropa_id" => $_params['ropa_id'], //total
            ":precio" => $_params['precio'],
            ":cantidad" => $_params['cantidad']  
        );
        if($resultado->execute($_array))
            return true;
    
        return false;
        }// FinRegistrar

        public function mostrar(){

            $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
            INNER JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC";

            $resultado = $this->cn->prepare($sql);

            if($resultado->execute())
            return $resultado->fetchAll();
    
        return false;
        }
        public function mostrarUltimos(){

            $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
            INNER JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC LIMIT 10";

            $resultado = $this->cn->prepare($sql);

            if($resultado->execute())
            return $resultado->fetchAll();
    
        return false;
        }
    public function mostrarPorId($id){

        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id WHERE p.id = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute($_array))
        return $resultado->fetch();

    return false;

    }
    public function mostrarDetallePorIdPedido($id){

        $sql = "SELECT
        dp.id, 
        ro.nombre, 
        dp.precio, 
        dp.cantidad, 
        ro.foto 
        FROM detalle_pedidos dp 
        INNER JOIN ropa ro ON ro.id = dp.ropa_id
        WHERE dp.pedidos_id = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute($_array))
        return $resultado->fetchAll();

    return false;
    }
}