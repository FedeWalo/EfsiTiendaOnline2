<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/CategoriaDao.php'); ?>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>Administrador - ABM Productos</title>
	<meta content="Sufee Admin - HTML5 Admin Template" name="description">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="apple-icon.png" rel="apple-touch-icon">
	<link href="favicon.ico" rel="shortcut icon">
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="vendors/themify-icons/css/themify-icons.css" rel="stylesheet">
	<link href="vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
	<link href="vendors/selectFX/css/cs-skin-elastic.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script src="jquery-3.4.1.js" type="text/javascript"></script>
</head>
<body>
	<?php include_once 'C:\wamp64\www\tp7\includes/Header.php';
		$accion = 'nuevo';
		$id = isset($_GET['idCategoria']) ? $_GET['idCategoria'] : 0;
		if($id>0){
			$Categoria = CategoriaDao::ObtenerPorId($id);
			$accion = 'modificar';
		}
		else{
			$Categoria = new Categoria();
		}
	?>
	<div class="card-header">
		<strong class="card-title">Categoria</strong>
	</div>
	<div class="card-body">
		<div id="pay-invoice">
			<div class="card-body">
				<div class="card-title">
					<h3 class="text-center">Agregar categoria</h3>
				</div>
				<form id="formulario" method="post">
					<div class="form-group">
						<input type="hidden" name="accion" id="accion" value="<?php echo $accion?>" />
						<input type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $id?>" />

						<label class="control-label mb-1" for="cc-payment">Nombre de la categoria</label> 
						<input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $Categoria->Nombre;?>">

						<div class="card-footer text-center" >
							<input type="button" class="btn btn-outline-primary" style="width: 20%" value="Aceptar" onclick="Validar();"/>
						</div>
					</div>
				</form>
				<script>
					function Validar(){
						var nombre = $('#nombre').val();
						if(nombre==''){
							alert('Debe completar el nombre');
						}
						else{
							$.ajax({
								async:true,
								type: "POST",
								url: "controller/categoriaController.php",                    
								data:$('#formulario').serialize(),
								beforeSend:function(){
								},
								success:function(resultado) {
									window.location="ABMCategorias.php";
									return true;
								},
								timeout:8000,
								error:function(){
									alert('mensaje de error');
									return false;
								}
							});
						}
									
					}
				</script>
			</div>
		</div>
	</div>
	
</body>
</html>