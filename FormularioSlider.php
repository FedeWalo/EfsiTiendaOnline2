<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/SliderDao.php'); ?>
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
	<?php include_once 'C:\wamp64\www\tp7\includes/Header.php'; ?>
	<?php
		$id = isset($_GET['idSlider']) ? $_GET['idSlider'] : 0;
		$accion = 'nuevo';
		if($id>0){
			//llamo al DAO y busco el objeto
			$Slider = SliderDao::ObtenerPorId($id);
			$accion = 'modificar';
		}
		else{
			$Slider = new Slider();
		}
	?>
	<div class="card-header">
		<strong class="card-title">Slider</strong>
	</div>
	<div class="card-body">
		<div id="pay-invoice">
			<div class="card-body">
				<div class="card-title">
					<h3 class="text-center">Agregar Slider</h3>
				</div>
				<form id="formulario" method="post">
					<div class="form-group">
					<input type="hidden" name="accion" id="accion" value="<?php echo $accion; ?>" />
						<input type="hidden" name="idSlider" id="idSlider" value="<?php echo $id; ?>" />
						
						<label class="control-label mb-1" for="cc-payment">Nombre del slider</label> 
						<input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $Slider->Nombre;?>">
                        
						<label class="control-label mb-1" for="cc-payment">Imagen </label>
						<input type="text" class="form-control-file" id="fotito" name="fotito" value="<?php echo $Slider->Fotito;?>">
						<div class="text-center">
							<input type="button" class="btn btn-outline-primary" style="width: 20%" value="Aceptar" onclick="Validar();"/> 
						</div>
					</div>
				</form>
				<script>
					function Validar(){
						var nombre = $('#nombre').val();
						var fotito = $('#fotito').val();
						if(nombre=='' || fotito==''){
							alert('Debe completar el nombre');
						}
						else{
							$.ajax({
								async:true,
								type: "POST",
								url: "controller/sliderController.php",                    
								data:$('#formulario').serialize(),
								beforeSend:function(){
								},
								success:function(resultado) {
									window.location="ABMSlider.php";
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