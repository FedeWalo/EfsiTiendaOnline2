<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/CategoriaDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion']; //RECIBO EL PARAMETRO ACCION

switch ($accion) {
    case 'obtenerTodos':
        $resultado = CategoriaDao::ObtenerTodos();
		echo json_encode($resultado);
        break; 
    
    case 'obtenerPorID':
        $id = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : '';
        $resultado = CategoriaDao::ObtenerPorID($id);
		echo json_encode($resultado);
        break;   
  
    case 'nuevo':
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';	
        
        $item = new Categoria();
        $item->Nombre = $nombre;	
        
		$resultado = CategoriaDao::nuevo($item);
		echo json_encode($resultado);
        break;
        
    case 'modificar':
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : '';
        
        $item = new Categoria();
        $item->Nombre = $nombre;
        $item->idCategoria = $idCategoria;

        $resultado = CategoriaDao::modificar($item);
        echo json_encode($resultado);
        break; 
    case 'eliminar':
        $idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : '';
        
        $resultado = CategoriaDao::eliminar($idCategoria);
        echo json_encode($resultado);
        break; 
}

?>