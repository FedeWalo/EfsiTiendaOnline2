<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/model/Usuario.php');

class UsuarioDao {
    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo persona
        $params = array(
            ":id"=>$id
        );
        $us = new Usuario();
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM usuarios WHERE idUsuario  = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            while ($row = $STH->fetch()){
                $us->idUsuario = $row['idUsuario']; 
                $us->Nombre = $row['Nombre'];       
                $us->Mail = $row['Mail'];
                $us->Contrasenia = $row['Contrasenia'];
                $us->Estado = $row['Estado'];
            }
        }
        return $us;
    }

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo persona

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM usuarios';
        
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute();

        if($STH->rowCount()>0){
            while ($row = $STH->fetch()){
                $us = new Usuario();
                $us->idUsuario = $row['idUsuario']; 
                $us->Nombre = $row['Nombre'];       
                $us->Mail = $row['Mail'];
                $us->Contrasenia = $row['Contrasenia'];
                $us->Estado = $row['Estado'];
                $arrayUsuarios[] = $us;
            }
        }
        return $arrayUsuarios;
    }

    public static function nuevo($Usuario) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo persona
        $params = array(
            ":nombre"=>$Usuario->Nombre,
            ":mail"=>$Usuario->Mail,
            ":contrasenia"=>$Usuario->Contrasenia
        );
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'INSERT INTO usuarios(Nombre, Mail, Contrasenia, Estado) VALUES (:nombre, :mail, :contrasenia, "Activo")';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        return $DBH->lastInsertid(); 
    }// nuevo    

    public static function modificar($Usuario) {//$id, $mail, $contrasenia
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo persona
        $params = array(
            ":id" => $Usuario->idUsuario,
            ":mail"=>$Usuario->Mail,
            ":nombre"=>$Usuario->Nombre,
            ":contrasenia"=>$Usuario->Contrasenia
        );
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'UPDATE usuarios SET usuarios.Nombre=:nombre, usuarios.Mail=:mail, usuarios.Contrasenia=:contrasenia WHERE idUsuario=:id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root","");

        $query = 'DELETE FROM usuarios WHERE usuarios.idUsuario=:idusuario';

        $Resultado = $DBH->prepare($query);
        $Resultado->setFetchMode(PDO::FETCH_ASSOC);

        $params = array(                                
            ":idusuario" => $id        
        );
    
        $Resultado->execute($params);
    }// eliminar

    public static function CambiarEstado($id, $Estado) {
        //devuelve un objeto de tipo persona
        $us = new Usuario();
        $params = array(
            ":id"=>$id,
            ":Estado"=>$Estado
        );

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'UPDATE usuarios SET Estado = :Estado WHERE idUsuario  = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $us->idUsuario = $row['idUsuario'];  
                $us->Nombre = $row['Nombre'];  
                $us->Mail = $row['Mail'];  
                $us->Contrasenia = $row['Contrasenia'];  
                $us->Estado = $row['Estado'];   
            }
        }  
        return $us;
    }// get
}

?>