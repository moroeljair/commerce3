<?php
    include_once 'Conexion.php';

    class Historial{
        //variable global
        var $objetos;
        public function __construct(){
            $db = new Conexion();
            $this->acceso = $db->pdo;
        }
        
        function llenar_historial($user){
            try{
                $sql="SELECT h.id as id, descripcion, fecha, th.nombre as tipo_historial, th.icono as th_icono, m.nombre as modulo, m.icono as m_icono
                FROM historial h 
                JOIN tipo_historial th ON h.id_tipo_historial=th.id 
                JOIN modulo m ON h.id_modulo=m.id
                WHERE id_usuario=:user
                ORDER BY fecha DESC;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':user'=>$user));
                $this->objetos = $query->fetchAll();
                return $this->objetos;
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        function llenar_historial_compras($user){
            try{
                $sql="SELECT compra.id, compra.total, compra.fecha_compra, detalle_compra.nombre, detalle_compra.cantidad, detalle_compra.precio FROM compra, detalle_compra
                WHERE compra.id=detalle_compra.id_compra 
                AND id_cliente=:user;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':user'=>$user));
                $this->objetos = $query->fetchAll();
                return $this->objetos;
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        function crear_historial($descripcion,$tipo_historial,$modulo,$id_usuario){
            try{
                $sql="INSERT INTO historial(descripcion,id_tipo_historial,id_modulo,id_usuario) 
                    VALUES(:descripcion,:id_tipo_historial,:id_modulo,:id_usuario)";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':descripcion'=>$descripcion,
                    ':id_tipo_historial'=>$tipo_historial,
                    ':id_modulo'=>$modulo,
                    ':id_usuario'=>$id_usuario
                );
                $query->execute($variables);
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        function historial_login($id_usuario){
            try{
                $sql="INSERT INTO registro_login(id_usuario) 
                    VALUES(:id_usuario)";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':id_usuario'=>$id_usuario
                );
                $query->execute($variables);

                //guardar en SESION el id_login
                $id_user = $_SESSION['id'];
                $sql="SELECT * FROM registro_login
                        WHERE id_usuario=:id_user
                        ORDER BY fecha DESC
                        LIMIT 1;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_user'=>$id_user));
                $this->objetos = $query->fetchAll();
                $_SESSION['id_login'] = $this->objetos[0]->id_login;    
                $_SESSION['numero_transacciones']=0;            
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }


        function crear_error_tabla($campo,$error,$tabla){
            try{
                $sql="INSERT INTO ".$tabla."(campo,error) VALUES(:campo,:error)";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':campo'=>$campo,
                    ':error'=>$error
                );
                $query->execute($variables);
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        function registro_error_sesion($campo,$error,$tabla){
            try{
                $sql="INSERT INTO registro_errores_sesion(tabla,campo,error,id_login) VALUES(:tabla,:campo,:error,:id_login)";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':tabla'=>$tabla,
                    ':campo'=>$campo,
                    ':error'=>$error,
                    'id_login'=>$_SESSION['id_login']
                );
                $query->execute($variables);
            }
            catch(Exception $e){
                echo $e->getMessage();
                return $e->getMessage();
            }
        }

        function registrar_pagina($pagina){
            try{
                if (!empty($_SESSION['id_login'])) {
                    // la variable de sesi??n existe y no est?? vac??a
                    $sql="INSERT INTO registro_paginas(id_login,fecha,pagina) 
                    VALUES(:id_login,current_timestamp(),:pagina);";
                    $query = $this->acceso->prepare($sql);
                    $variables = array(
                        ':pagina'=>$pagina,
                        ':id_login'=>$_SESSION['id_login']
                    );
                    $query->execute($variables);

                } else {
                    // la variable de sesi??n no existe o est?? vac??a
                }
                
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }
 

        function registrar_inicio_transaccion(){
            try{
                $id_login = $_SESSION['id_login'];
                $sql="INSERT INTO registro_transaccion(id_login) 
                    VALUES(:id_login)";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':id_login'=>$id_login
                );
                $query->execute($variables);
                $_SESSION['id_transaccion'] = $this->acceso->lastInsertId();

                //guardar en SESION el id_login
                /*
                $id_user = $_SESSION['id'];
                $sql="SELECT * FROM registro_transaccion
                        WHERE id_login=:id_login
                        ORDER BY fecha_inicio DESC
                        LIMIT 1;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_login'=>$id_login));
                $_SESSION['id_transaccion'] = $query->fetchAll()[0]->id;
                */                
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        function registrar_fin_transaccion(){
            try{
                $id_login = $_SESSION['id_login'];
                
                //actualizar la id transaccion
                $sql="UPDATE registro_transaccion
                      SET fecha_fin=current_timestamp(), transaccion=1
                      WHERE id=:id_transaccion;";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':id_transaccion'=>$_SESSION['id_transaccion']
                );
                $query->execute($variables);

                //actualizar el registro login
                $sql="UPDATE registro_login
                      SET numero_transacciones=:num
                      WHERE id_login=:id_login;";
                $query = $this->acceso->prepare($sql);
                $_SESSION['numero_transacciones']=$_SESSION['numero_transacciones']+1;
                $variables = array(
                    'id_login'=>$id_login,
                    ':num'=>$_SESSION['numero_transacciones']
                );
                $query->execute($variables);

                
              
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }


}
?>