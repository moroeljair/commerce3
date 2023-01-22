<?php
    include_once 'Conexion.php';

    class Departamento{
        //variable global
        var $objetos;
        var $provincias;
        var $ciudades;

        public function __construct(){
            $db = new Conexion();
            $this->acceso = $db->pdo;
        }
        
        function llenar_departamentos(){
            $sql="SELECT * FROM departamento";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function llenar_provincia(){
            $sql="SELECT * FROM provincia";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->provincias = $query->fetchAll();
            return $this->provincias;
        }

        function llenar_ciudad(){
            $sql="SELECT * FROM ciudad";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->ciudades = $query->fetchAll();
            return $this->ciudades;
        }

    }

?>