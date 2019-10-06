<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/UsuarioDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion']; //RECIBO EL PARAMETRO ACCION

switch ($accion) {
    case 'obtenerTodos':
        $resultado = UsuarioDao::ObtenerTodos();
		echo json_encode($resultado);
        break; 
    
    case 'obtenerPorID':
        $id = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
        $resultado = UsuarioDao::ObtenerPorID($id);
		echo json_encode($resultado);
        break;   
  
    case 'nuevo':
        $mail = isset($_POST['mail']) ? $_POST['mail'] : '';	
        $contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : '';
        
        $item = new Usuario();
        $item->Mail = $mail;	
        $item->Contrasenia = $contrasenia;	
        
		$resultado = UsuarioDao::nuevo($item);
		echo json_encode($resultado);
        break;
    case 'modificar':
        $mail = isset($_POST['mail']) ? $_POST['mail'] : '';	
        $contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : '';
        
        $item = new Usuario();
        $item->Mail = $mail;	
        $item->Contrasenia = $contrasenia;

        $resultado = UsuarioDao::modificar($item);
        echo json_encode($resultado);
        break; 
    case 'eliminar':
        $id = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
        
        $resultado = UsuarioDao::eliminar($id);
        echo json_encode($resultado);
        break; 
    case 'CambiarEstado':
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : '';
        $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : '';

        $resultado = UsuarioDao::CambiarEstado($idUsuario, $Estado);
        echo json_encode($resultado);
        break;
}

?>