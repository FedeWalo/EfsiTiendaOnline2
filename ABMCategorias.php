<!DOCTYPE html>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/CategoriaDao.php'); ?>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>categorias</title>
	<meta content="Sufee Admin - HTML5 Admin Template" name="description">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="favicon.ico" rel="shortcut icon">
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	    
    <script src="https://kit.fontawesome.com/20e6b407f6.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script src="jquery-3.4.1.js" type="text/javascript"></script>
</head>
<body>
	<?php include_once 'C:\wamp64\www\tp7\includes/Header.php'; ?>
	<div class="breadcrumbs">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center">
					<h3 class="card-title">Categorias</h3>
				</div>
				<div class="card-header text-center">
					<button type="button" class="btn btn-secondary BotonAgregarAbm" onclick="location.href='FormularioCategoria.php'">Agregar</button>
				</div>
				<div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped">	
						<thead>
						</thead>
					</table>
				</div>
			</div>
		</div>
        <script src="vendors/jquery/dist/jquery.min.js"></script> 
	    <script src="vendors/popper.js/dist/umd/popper.min.js"></script> 
	    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> 
	    <script src="assets/js/main.js"></script>
	</div><script src="vendors/jquery/dist/jquery.min.js"></script> 
	<script src="vendors/popper.js/dist/umd/popper.min.js"></script> 
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<script src="vendors/datatables.net/js/jquery.dataTables.min"></script>  
	<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min"></script>  
	<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min"></script>  
	
	<script src="assets/js/main.js"></script>
	
</body>
<script>
    (function ($) {                
        $.ajax({
            async:true,
            type: "POST",
            url: "controller/categoriaController.php",                    
            data:"accion=obtenerTodos",
            beforeSend:function(){
            },
            success:function(resultado) {
                var o = JSON.parse(resultado);//A la variable le asigno el json decodificado                
                
                $('#bootstrap-data-table-export').DataTable( {
                    data : o,
                    columns: [
                        {data : "idCategoria", title : "idCategoria"},
                        {data : "Nombre", title: "Nombre"},
						{
							data : null, 
							title: "Acciones",
							className: "text-center",  
							render: function (data){
                                return '<a href="javascript:editar('+ data.idCategoria +');"><span class="fas fa-pen"></span></a><a href="javascript:eliminar('+ data.idCategoria +');"><span class="fas fa-times"></span></a>';
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
		window.location = "FormularioCategoria?idCategoria="+id;
	}
	function eliminar(id){
		$.ajax({
            async:true,
            type: "POST",
            url: "controller/categoriaController.php",        
			data:"idCategoria="+id+"&accion=eliminar",
            beforeSend:function(){
                alert('comienzo a procesar');
            },
			success:function(resultado) {
            	alert(resultado);
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
    </script>
</html>