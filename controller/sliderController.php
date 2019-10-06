<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/SliderDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion']; //RECIBO EL PARAMETRO ACCION

switch ($accion) {
    case 'obtenerTodos':
        $resultado = SliderDao::ObtenerTodos();
		echo json_encode($resultado);
        break; 
    
    case 'obtenerPorID':
        $id = isset($_POST['idSlider']) ? $_POST['idSlider'] : '';
        $resultado = SliderDao::ObtenerPorID($id);
		echo json_encode($resultado);
        break;   
  
    case 'nuevo':
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';	
        $fotito = isset($_POST['fotito']) ? $_POST['fotito'] : '';	

        $item = new Slider();
        $item->Nombre = $nombre;
        $item->Fotito = $fotito;		
        
		$resultado = SliderDao::nuevo($item);
		echo json_encode($resultado);
        break;
    case 'modificar':
        $idSlider = isset($_POST['idSlider']) ? $_POST['idSlider'] : '';	
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';	
        $fotito = isset($_POST['fotito']) ? $_POST['fotito'] : '';	

        $item = new Slider();
        $item->idSlider = $idSlider;
        $item->Nombre = $nombre;
        $item->Fotito = $fotito;		

        $resultado = SliderDao::modificar($item);
        echo json_encode($resultado);
        break; 
    case 'eliminar':
        $id = isset($_POST['idSlider']) ? $_POST['idSlider'] : '';
        
        $resultado = SliderDao::eliminar($id);
        echo json_encode($resultado);
        break; 
}

?>