<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/ProductoDao.php'); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<script src="jquery-3.4.1.js" type="text/javascript"></script>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>Sufee Admin - HTML5 Admin Template</title>
	<meta content="Sufee Admin - HTML5 Admin Template" name="description">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="apple-icon.png" rel="apple-touch-icon">
	<link href="favicon.ico" rel="shortcut icon">
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/20e6b407f6.js"></script>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include_once 'C:\wamp64\www\tp7\includes/Header.php'; ?>
	<div class="breadcrumbs">
		<div class="col-md-12">
        
			<div class="card">
            <div class="card-header text-center">
				<h3 class="card-title">Productos</h3>
			</div>
            <div class="card-header text-center">
				<button type="button" class="btn btn-secondary BotonAgregarAbm" onclick="location.href='FormularioProducto.php'">Insertar Productos</button>
            </div>
				<div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Nombre</th>
								<th scope="col">Codigo</th>
								<th scope="col">Precio</th>
								<th scope="col">Descuento</th>
								<th scope="col">Stock Minimo</th>
								<th scope="col">Stock Actual</th>
								<th scope="col">Categoria</th>
								<th scope="col">Foto</th>
								<th scope="col">Video</th>
								<th scope="col">Descripcion corta</th>
								<th scope="col">Descripcion larga</th>
								<th scope="col">Destacado</th>
								<th scope="col">OnSale</th>
								<th scope="col">Mostrar</th>
                                <th scope="col">Acciones</th>
							</tr>
						</thead>
						
					</table>
				</div>
			</div>
		</div>
		<script src="vendors/jquery/dist/jquery.min.js"></script> 
		<script src="vendors/popper.js/dist/umd/popper.min.js"></script> 
		<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> 
		<script src="assets/js/main.js"></script>
	</div><!-- .content -->
	<!-- /#right-panel -->
	<!-- Right Panel -->
	<script src="vendors/jquery/dist/jquery.min.js"></script> 
	<script src="vendors/popper.js/dist/umd/popper.min.js"></script> 
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> 
	<script src="assets/js/main.js"></script>

	<script src="vendors/datatables.net/js/jquery.dataTables.min"></script>  
	<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min"></script>  
	<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min"></script>  
</body>
<script>
    (function ($) {                
        $.ajax({
            async:true,
            type: "POST",
            url: "controller/productoController.php",                    
            data:"accion=obtenerTodos",
            beforeSend:function(){
            },
            success:function(resultado) {
                var o = JSON.parse(resultado);//A la variable le asigno el json decodificado                
                
                $('#bootstrap-data-table-export').DataTable( {
                    data : o,
                    columns: [
                        {data : "idProducto", title : "idProducto"},
                        {data : "Nombre", title: "Nombre"},
						{data : "Codigo", title: "Codigo"},
						{data : "Precio", title: "Precio"},
						{data : "Descuento", title: "Descuento"},
						{data : "StockMinimo", title: "StockMinimo"},
						{data : "StockActual", title: "StockActual"},
						{data : "Categoria", title: "Categoria"},
						{data : "Foto", title: "Foto"},
						{data : "Video", title: "Video"},
						{data : "DescripcionCorta", title: "DescripcionCorta"},
						{data : "DescripcionLarga", title: "DescripcionLarga"},
						{data : "Destacado", title: "Destacado"},
						{data : "OnSale", title: "OnSale"},
						{data : "MostrarHome", title: "MostrarHome"},
                        {
                            data: null,
                            title: 'Acciones',
                            className: "text-center",                            
                            render: function (data){
                                return '<a href="javascript:editar('+ data.idProducto +');"><span class="fas fa-pen"></span></a><a href="javascript:eliminar('+ data.idProducto +');"><span class="fas fa-times"></span></a>';
                            }
                        }                        
                    ],
                });
                return true;
            },
            timeout:8000,
            error:function(){
                alert('mensaje de error');
                return false;
            }
        });        
        
        
    })(jQuery);
	function editar(id){
		window.location = "FormularioProducto?idProducto="+id;
	}
	function eliminar(id){
		$.ajax({
            async:true,
            type: "POST",
            url: "controller/productoController.php",        
			data:"idProducto="+id+"&accion=eliminar",
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
    </script>
</html>