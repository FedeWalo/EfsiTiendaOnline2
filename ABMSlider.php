<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp7/dao/SliderDao.php'); ?>
<!DOCTYPE html>
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
					<h3 class="card-title">Slider</h3>
				</div>
				<div class="card-header text-center">
                    <button type="button" class="btn btn-secondary BotonAgregarAbm" onclick="location.href='FormularioSlider.php'">Insertar Slider</button>
				</div>
				<div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped">
						
					</table>
				</div>
			</div>
		</div>
        <script src="vendors/jquery/dist/jquery.min.js"></script> 
	    <script src="vendors/popper.js/dist/umd/popper.min.js"></script> 
	    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> 
	    <script src="assets/js/main.js"></script>
	</div>
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
            url: "controller/sliderController.php",                    
            data:"accion=obtenerTodos",
            beforeSend:function(){
            },
            success:function(resultado) {
                var o = JSON.parse(resultado);//A la variable le asigno el json decodificado                
                
                $('#bootstrap-data-table-export').DataTable( {
                    data : o,
                    columns: [
                        {data : "idSlider", title : "idSlider"},
                        {data : "Nombre", title: "Nombre"},
						{data : "Fotito", title: "Imagen"},
                        {
                            data: null,
                            title: 'Acciones',
                            className: "text-center",                            
                            render: function (data){
                                return '<a href="javascript:editar('+ data.idSlider +');"><span class="fas fa-pen"></span></a><a href="javascript:eliminar('+ data.idSlider +');"><span class="fas fa-times"></span></a>';
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
        window.location="FormularioSlider.php?idSlider="+id;
	}
	function eliminar(id){
		$.ajax({
            async:true,
            type: "POST",
            url: "controller/sliderController.php",        
			data:"idSlider="+id+"&accion=eliminar",
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
    </script>
</html>