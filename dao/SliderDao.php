<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/model/Slider.php');

class SliderDao {
    
    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo persona
        $sli = new Slider();
        $params = array(
            ":id"=>$id
        );

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM sliders WHERE idSlider  = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $sli->idSlider = $row['idSlider'];        
                $sli->Nombre = $row['Nombre'];
                $sli->Fotito = $row['Fotito'];
            }
        }
        return $sli;
    }// get

    public static function ObtenerTodos() {
        
        //devuelve un array de objetos de tipo persona
        $arraySliders = array();
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM sliders';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
       //cambiar a los demas las lineas de abajo
        $STH->execute();
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $sli = new Slider();
                $sli->idSlider = $row['idSlider'];        
                $sli->Nombre = $row['Nombre'];
                $sli->Fotito = $row['Fotito'];
                $arraySliders[] = $sli;
            }
        }
        return $arraySliders;
    }

    public static function nuevo($Slider) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo persona
        $sli = new Slider();
        $arrayProductos = array();
        $params = array(
            ":nombre"=>$Slider->Nombre,
            ":fotito"=>$Slider->Fotito
        );
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'INSERT INTO sliders(Nombre, Fotito) VALUES (:nombre, :fotito)';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            $sli->idSlider=$STH->fetch()['idSlider'];        
            $sli->Nombre=$STH->fetch()['Nombre'];
            $sli->Fotito=$STH->fetch()['Fotito'];
        } 
        return $DBH->lastInsertid();  
    }// nuevo    

    public static function modificar($Slider) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo persona
        $arrayProductos = array();
        $params = array(
            ":id" => $Slider->idSlider,
            ":Nombre"=>$Slider->Nombre,
            ":Fotito"=>$Slider->Fotito
        );
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'UPDATE sliders SET sliders.Nombre=:Nombre, sliders.Fotito=:Fotito WHERE idSlider=:id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root","");

        $query = 'DELETE FROM sliders WHERE idSlider=:idslider';

        $Resultado = $DBH->prepare($query);
        $Resultado->setFetchMode(PDO::FETCH_ASSOC);

        $params = array(                                
            ":idslider" => $id        
        );
    
        $Resultado->execute($params);
    }// eliminar

}

?>