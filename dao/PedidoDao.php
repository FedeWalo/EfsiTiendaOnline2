<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/model/Pedido.php');

class PedidoDao {
    public static function ObtenerTodos() {
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        
        $query = 'SELECT * FROM pedidos';
        
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute();
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $pedido = new Pedido();
                $pedido->idPedido = $row['idPedido'];  
                $pedido->Producto = $row['Producto'];  
                $pedido->Usuario = $row['Usuario'];  
                $pedido->FechaPedido = $row['FechaPedido'];  
                $pedido->FechaEnvio = $row['FechaEnvio'];  
                $pedido->Cantidad = $row['Cantidad'];  
                $pedido->Precio = $row['Precio'];  
                $pedido->Estado = $row['Estado'];       
                $arrayPedidos[] = $pedido;
            }
        }  
        return $arrayPedidos;

    }
    public static function CambiarEstado($id, $Estado) {
        //devuelve un objeto de tipo persona
        $pedido = new Pedido();
        $params = array(
            ":id"=>$id,
            ":Estado"=>$Estado
        );

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'UPDATE pedidos SET Estado = :Estado WHERE idPedido  = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $STH->execute($params);
        if($STH->rowCount()>0){
            while($row = $STH->fetch()){
                $pedido->idPedido = $row['idPedido'];  
                $pedido->Producto = $row['Producto'];  
                $pedido->Usuario = $row['Usuario'];  
                $pedido->FechaPedido = $row['FechaPedido'];  
                $pedido->FechaEnvio = $row['FechaEnvio'];  
                $pedido->Cantidad = $row['Cantidad'];  
                $pedido->Precio = $row['Precio'];  
                $pedido->Estado = $row['Estado'];       
            }
        }  
        return $pedido;
    }// get
    
}
?>