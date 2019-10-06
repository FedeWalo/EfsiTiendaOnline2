<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/PedidoDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : ''; //RECIBO EL PARAMETRO ACCION

switch ($accion) {
    case 'obtenerTodos':
        $resultado = PedidoDao::ObtenerTodos();
        echo json_encode($resultado);
        break; 
    case 'CambiarEstado':
        $idPedido = isset($_POST['idPedido']) ? $_POST['idPedido'] : '';
        $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : '';

        $resultado = PedidoDao::CambiarEstado($idPedido, $Estado);
        echo json_encode($resultado);
        break;
}

?>