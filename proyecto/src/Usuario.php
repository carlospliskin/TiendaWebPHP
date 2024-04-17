<?php
namespace Macar;

class Usuario{

    private $config;
    private $cn = null;

    public function __construct()
    {
     $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        //print '<pre>';//mostar en pantalla
        //print_r($this->config);//mostrar en pantalla web
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'],$this->config['clave'],array
        (\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    public function login($nombre,$clave){

        $sql = "SELECT nombre_usuario FROM `usuario` WHERE nombre_usuario= :nombre && clave = :clave";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':nombre' => $nombre,
            ':clave' => $clave
        );

        if($resultado->execute($_array))
        return $resultado->fetch();

    return false;

    }
}