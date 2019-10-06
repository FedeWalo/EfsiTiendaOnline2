<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/CategoriaDao.php'); ?>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/ProductoDao.php'); ?>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
<head>
	<script src="jquery-3.4.1.js" type="text/javascript"></script>
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
</head>
<body>
	<?php include_once 'C:\wamp64\www\tp7\includes/Header.php'; ?>
	<?php
		$id = isset($_GET['idProducto']) ? $_GET['idProducto'] : 0;
		$accion = 'nuevo';
		if($id>0){
		//llamo al DAO y busco el objeto
		$Producto = ProductoDao::ObtenerPorId($id);
		$accion = 'modificar';
		}
		else{
			$Producto = new Producto();
		}
	?>
	<div class="card-header">
		<strong class="card-title">Producto</strong>
	</div>
	<div class="card-body">
		<div id="pay-invoice">
			<div class="card-body">
				<div class="card-title">
					<h3 class="text-center">Agregar Producto</h3>
				</div>
				<form id="formulario" method="post">
					<div class="form-group">

						<input type="hidden" name="accion" id="accion" value="<?php echo $accion; ?>" />
						<input type="hidden" name="idProducto" id="idProducto" value="<?php echo $id; ?>" />

						<label class="control-label mb-1" for="cc-payment">Nombre del producto</label> 
						<input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $Producto->Nombre;?>">

                        <label class="control-label mb-1" for="cc-payment">Codigo</label> 
						<input class="form-control" id="codigo" name="codigo" type="text" value="<?php echo $Producto->Codigo;?>">

                        <label class="control-label mb-1" for="cc-payment">Precio</label> 
						<input class="form-control" id="precio" name="precio" type="number" value="<?php echo $Producto->Precio;?>">

                        <label class="control-label mb-1" for="cc-payment">Descuento</label> 
						<input class="form-control" id="descuento" name="descuento" type="number" value="<?php echo $Producto->Descuento;?>">

                        <label class="control-label mb-1" for="cc-payment">Stock Minimo</label> 
						<input class="form-control" id="stockminimo" name="stockminimo" type="number" value="<?php echo $Producto->StockMinimo;?>">

                        <label class="control-label mb-1" for="cc-payment">Stock</label> 
						<input class="form-control" id="stock" name="stock" type="number" value="<?php echo $Producto->StockActual;?>">

						<label class="control-label mb-1" for="cc-payment">Categoria</label>
					    <select name="categoria" id="categoria" class="form-control">
							<option value="0">Seleccione categoria</option>
							<?php foreach(CategoriaDao::ObtenerTodos() as $item){ ?>
								<option value="<?php echo $item->idCategoria;?>"> <?php echo $item->Nombre;?> </option>
							<?php } ?>
						</select>
						
                        <label class="control-label mb-1" for="cc-payment">Descripcion Corta</label> 
						<input class="form-control" id="descripcioncorta" name="descripcioncorta" type="text" value="<?php echo $Producto->DescripcionCorta;?>">
                        
						<label class="control-label mb-1" for="cc-payment">Descripcion Larga</label> 
						<input class="form-control" id="descripcionlarga" name="descripcionlarga" type="text" value="<?php echo $Producto->DescripcionLarga;?>">
                        
						<label class="control-label mb-1" for="cc-payment">Subir Imagen</label>
						<input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $Producto->Foto;?>">
						
						<label class="control-label mb-1" for="cc-payment">Subir video</label>
						<input type="text" class="form-control" id="video" name="video" value="<?php echo $Producto->Video;?>">

						<label class="control-label mb-1" for="cc-payment">Destacado</label>
						<input  class="form-control" id="destacado" name="destacado" type="number" value="<?php echo $Producto->Destacado;?>">
						
						<label class="control-label mb-1" for="cc-payment">OnSale</label>
						<input  class="form-control" id="onsale" name="onsale" type="number" value="<?php echo $Producto->OnSale;?>">
						
						<label class="control-label mb-1" for="cc-payment">MostrarHome</label>
						<input  class="form-control" id="mostrarhome" name="mostrarhome" type="number" value="<?php echo $Producto->MostrarHome;?>">
						
						<div class="text-center" >
							<input class="btn btn-outline-primary" type="button" style="width: 20%" value="Aceptar" onclick="Validar();"/> 
						</div>
					</div>
				</form>
				<script>
					function Validar(){
						var nombre = $('#nombre').val();
						var codigo = $('#codigo').val();
						var precio = $('#precio').val();
						var descuento = $('#descuento').val();
						var stockminimo = $('#stockminimo').val();
						var stock = $('#stock').val();
						var categoria = $('#categoria').val();
						var descripcioncorta = $('#descripcioncorta').val();
						var descripcionlarga = $('#descripcionlarga').val();
						var imagen = $('#imagen').val();
						var video = $('#video').val();
						var destacado = $('#destacado').val();
						var onsale = $('#onsale').val();
						var mostrarhome = $('#mostrarhome').val();

						if(nombre=='' || codigo=='' || precio < 0 || descuento < 0 || stockminimo < 0 ||
						stock < 0 || categoria == 0 || descripcioncorta == '' || descripcionlarga == ''
						|| imagen == '' || video == '' || destacado =='' || onsale =='' || mostrarhome == ''){
							alert('Faltan completar campos');
						}
						else{
							$.ajax({
								async:true,
								type: "POST",
								url: "controller/productoController.php",                    
								data:$('#formulario').serialize(),
								beforeSend:function(){
									alert('comienzo a procesar');
								},
								success:function(resultado) {
									alert(resultado);
									window.location="ABMProductos.php";
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