<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/model/Producto.php');

class ProductoDao {
    
    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo persona
        $pro = new Producto();
        $params = array(
            ":id"=>$id
        );

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM productos WHERE idProducto  = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $pro->idProducto=$row['idProducto'];        
                $pro->Nombre=$row['Nombre'];
                $pro->Codigo=$row['Codigo'];
                $pro->Precio=$row['Precio'];
                $pro->Descuento=$row['Descuento'];
                $pro->StockMinimo=$row['StockMinimo'];
                $pro->StockActual=$row['StockActual'];
                $pro->Categoria=$row['Categoria'];
                $pro->Foto=$row['Foto'];
                $pro->Video=$row['Video'];
                $pro->DescripcionCorta=$row['DescripcionCorta'];
                $pro->DescripcionLarga=$row['DescripcionLarga'];
                $pro->Destacado=$row['Destacado'];
                $pro->OnSale=$row['OnSale'];
                $pro->MostrarHome=$row['MostrarHome'];
            }
        }
        return $pro;
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo persona
        
        $arrayProductos = array();
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM productos';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        
        $STH->execute();
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $pro = new Producto();
                $pro->idProducto=$row['idProducto'];        
                $pro->Nombre=$row['Nombre'];
                $pro->Codigo=$row['Codigo'];
                $pro->Precio=$row['Precio'];
                $pro->Descuento=$row['Descuento'];
                $pro->StockMinimo=$row['StockMinimo'];
                $pro->StockActual=$row['StockActual'];
                $pro->Categoria=$row['Categoria'];
                $pro->Foto=$row['Foto'];
                $pro->Video=$row['Video'];
                $pro->DescripcionCorta=$row['DescripcionCorta'];
                $pro->DescripcionLarga=$row['DescripcionLarga'];
                $pro->Destacado=$row['Destacado'];
                $pro->OnSale=$row['OnSale'];
                $pro->MostrarHome=$row['MostrarHome'];
                $arrayProductos[] = $pro;
            }
        }
        return $arrayProductos;

    }

    public static function nuevo($Producto) {//$nombre, $codigo, $precio, $descuento, $stockminimo, $stockactual, $categoria, $foto, $video, $descripcioncorta, $descripcionlarga
        //aca va la logica para crear. Recibe por parametro un objeto de tipo persona
        $params = array(
            ":Nombre"=>$Producto->Nombre,
            ":Codigo"=>$Producto->Codigo,
            ":Precio"=>$Producto->Precio,
            ":Descuento"=>$Producto->Descuento,
            ":StockMinimo"=>$Producto->StockMinimo,
            ":StockActual"=>$Producto->StockActual,
            ":Categoria"=>$Producto->Categoria,
            ":Foto"=>$Producto->Foto,
            ":Video"=>$Producto->Video,
            ":DescripcionCorta"=>$Producto->DescripcionCorta,
            ":DescripcionLarga"=>$Producto->DescripcionLarga,
            ":Destacado"=>$Producto->Destacado,
            ":OnSale"=>$Producto->OnSale,
            ":MostrarHome"=>$Producto->MostrarHome
        );
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'INSERT INTO productos (Nombre, Codigo, Precio, Descuento, StockMinimo, StockActual, Categoria, Foto, Video, DescripcionCorta, DescripcionLarga,Destacado,OnSale,MostrarHome) VALUES (:Nombre, :Codigo, :Precio, :Descuento, :StockMinimo, :StockActual, :Categoria, :Foto, :Video, :DescripcionCorta, :DescripcionLarga,:Destacado,:OnSale,:MostrarHome)';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        
        return $DBH->lastInsertid();
    }// nuevo    

    public static function modificar($Producto) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo persona
        $arrayProductos = array();
        $params = array(
            ":id" => $Producto->id,
            ":nombre"=>$Producto->Nombre,
            ":codigo"=>$Producto->Codigo,
            ":precio"=>$Producto->Precio,
            ":descuento"=>$Producto->Descuento,
            ":stockminimo"=>$Producto->StockMinimo,
            ":stockactual"=>$Producto->StockActual,
            ":categoria"=>$Producto->Categoria,
            ":foto"=>$Producto->Foto,
            ":video"=>$Producto->Video,
            ":descripcioncorta"=>$Producto->DescripcionCorta,
            ":descripcionlarga"=>$Producto->DescripcionLarga,
            ":Destacado"=>$Producto->Destacado,
            ":OnSale"=>$Producto->OnSale,
            ":MostrarHome"=>$Producto->MostrarHome
        );
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'UPDATE productos SET productos.Nombre=:nombre, productos.Codigo=:codigo, productos.Precio=:precio, productos.Descuento=:descuento, productos.StockMinimo=:stockminimo,  productos.StockActual=:stockactual, productos.Categoria=:categoria, productos.Foto=:foto, productos.Video=:video, productos.DescripcionCorta=:descripcioncorta, productos.DescripcionLarga=:descripcionlarga,productos.Destacado=:Destacado,productos.OnSale=:OnSale,productos.MostrarHome=:MostrarHome  WHERE idProducto=:id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root","");

        $query = 'DELETE FROM productos WHERE productos.idProducto=:idproducto';

        $Resultado = $DBH->prepare($query);
        $Resultado->setFetchMode(PDO::FETCH_ASSOC);

        $params = array(                                
            ":idproducto" => $id        
        );
    
        $Resultado->execute($params);
    }// eliminar

}

?>