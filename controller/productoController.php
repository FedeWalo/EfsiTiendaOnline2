<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/ProductoDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion']; //RECIBO EL PARAMETRO ACCION

switch ($accion) {
    case 'obtenerTodos':
        $resultado = ProductoDao::ObtenerTodos();
		echo json_encode($resultado);
        break; 
    
    case 'obtenerPorID':
        $id = isset($_POST['idProducto']) ? $_POST['idProducto'] : '';
        $resultado = ProductoDao::ObtenerPorID($id);
		echo json_encode($resultado);
        break;  
  
    case 'nuevo':
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $descuento = isset($_POST['descuento']) ? $_POST['descuento'] : '';
        $stockminimo = isset($_POST['stockminimo']) ? $_POST['stockminimo'] : '';
        $stockactual = isset($_POST['stock']) ? $_POST['stock'] : '';
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
        $foto = isset($_POST['imagen']) ? $_POST['imagen'] : '';
        $video = isset($_POST['video']) ? $_POST['video'] : '';
        $descripcioncorta = isset($_POST['descripcioncorta']) ? $_POST['descripcioncorta'] : '';
        $descripcionlarga = isset($_POST['descripcionlarga']) ? $_POST['descripcionlarga'] : '';	
        $destacado = isset($_POST['destacado']) ? $_POST['destacado'] : '';	
        $onsale = isset($_POST['onsale']) ? $_POST['onsale'] : '';	
        $mostrarhome = isset($_POST['mostrarhome']) ? $_POST['mostrarhome'] : '';	
        
        $item = new Producto();
        $item->Nombre = $nombre;	
        $item->Codigo = $codigo;
        $item->Precio = $precio;
        $item->Descuento = $descuento;
        $item->StockMinimo = $stockminimo;
        $item->StockActual = $stockactual;
        $item->Categoria = $categoria;
        $item->Foto = $foto;
        $item->Video = $video;
        $item->DescripcionCorta = $descripcioncorta;
        $item->DescripcionLarga = $descripcionlarga;
        $item->Destacado = $destacado;
        $item->OnSale = $onsale;
        $item->MostrarHome = $mostrarhome;

        
		$resultado = ProductoDao::nuevo($item);
		echo json_encode($resultado);
        break;
    case 'modificar':
        $idProducto = isset($_POST['idProducto']) ? $_POST['idProducto'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $descuento = isset($_POST['descuento']) ? $_POST['descuento'] : '';
        $stockminimo = isset($_POST['stockminimo']) ? $_POST['stockminimo'] : '';
        $stockactual = isset($_POST['stockinicial']) ? $_POST['stockinicial'] : '';
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
        $foto = isset($_POST['imagen']) ? $_POST['imagen'] : '';
        $video = isset($_POST['video']) ? $_POST['video'] : '';
        $descripcioncorta = isset($_POST['descripcioncorta']) ? $_POST['descripcioncorta'] : '';
        $descripcionlarga = isset($_POST['descripcionlarga']) ? $_POST['descripcionlarga'] : '';	
        $destacado = isset($_POST['destacado']) ? $_POST['destacado'] : '';	
        $onsale = isset($_POST['onsale']) ? $_POST['onsale'] : '';	
        $mostrarhome = isset($_POST['mostrarhome']) ? $_POST['mostrarhome'] : '';	
        
        $item = new Producto();
        $item->idProducto = $idProducto;
        $item->Nombre = $nombre;	
        $item->Codigo = $codigo;
        $item->Precio = $precio;
        $item->Descuento = $descuento;
        $item->StockMinimo = $stockminimo;
        $item->StockActual = $stockactual;
        $item->Categoria = $categoria;
        $item->Foto = $foto;
        $item->Video = $video;
        $item->DescripcionCorta = $descripcioncorta;
        $item->DescripcionLarga = $descripcionlarga;
        $item->Destacado = $destacado;
        $item->OnSale = $onsale;
        $item->MostrarHome = $mostrarhome;
        
		$resultado = ProductoDao::modificar($item);
		echo json_encode($resultado);
        break;
    case 'eliminar':
        $idProducto = isset($_POST['idProducto']) ? $_POST['idProducto'] : '';
        
        $resultado = ProductoDao::eliminar($idProducto);
        echo json_encode($resultado);
        break; 
}

?>