<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/EfsiTiendaOnline2/model/Categoria.php');

class CategoriaDao {
    
    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo persona
        $cat = new Categoria();
        $params = array(
            ":id"=>$id
        );

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM categorias WHERE idCategoria  = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $cat->idCategoria = $row['idCategoria'];        
                $cat->Nombre = $row['Nombre'];
            }
        }  
        return $cat;
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo persona
        
        
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        
        $query = 'SELECT * FROM categorias';
        
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute();
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $cat = new Categoria();
                $cat->idCategoria = $row['idCategoria'];        
                $cat->Nombre = $row['Nombre'];
                $arrayCategorias[] = $cat;
            }
        }  
        return $arrayCategorias;

    }
    
    public static function nuevo($Categoria) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo persona
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root","");
        
        $query = 'INSERT INTO categorias (Nombre, Estado) VALUES (:nombre, "Activo") ';

        $Resultado = $DBH->prepare($query);
        $Resultado->setFetchMode(PDO::FETCH_ASSOC);

        $params = array(                                
            ":nombre" => $Categoria->Nombre    
        );
        $Resultado->execute($params);
        
        return $DBH->lastInsertId();
    }  //Nuevo

    public static function modificar($Categoria) {//$idCategoria, $Nombre
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo persona
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root","");
        $params = array(                                
            ":idcategoria" => $Categoria->idCategoria,
            ":nombre" => $Categoria->Nombre           
        );

        $query = 'UPDATE categorias SET Nombre=:nombre WHERE idCategoria=:idcategoria';

        $Resultado = $DBH->prepare($query);
        $Resultado->setFetchMode(PDO::FETCH_ASSOC);

    
        $Resultado->execute($params);

    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root","");

        $params = array(                                
            ":idcategoria" => $id        
        );

        $query = 'DELETE FROM categorias WHERE categorias.idCategoria=:idcategoria';

        $Resultado = $DBH->prepare($query);
        $Resultado->setFetchMode(PDO::FETCH_ASSOC);
    
        $Resultado->execute($params);
            
        $DBH = null;
    }// eliminar
}

?>