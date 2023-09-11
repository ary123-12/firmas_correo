<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : https://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan MySQLi</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos del empleados &raquo; Agregar datos</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$codigo		     = mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres 
				$nombres		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));//Escanpando caracteres 
				$apellidos	 = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));//Escanpando caracteres 
				$cargo	 = mysqli_real_escape_string($con,(strip_tags($_POST["cargo"],ENT_QUOTES)));//Escanpando caracteres 
				$email	     = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
				$tel_personal		 = mysqli_real_escape_string($con,(strip_tags($_POST["tel_personal"],ENT_QUOTES)));//Escanpando caracteres
                $ext =                 mysqli_real_escape_string($con,(strip_tags($_POST["ext"],ENT_QUOTES)));//Escanpando 
				$puesto		 = mysqli_real_escape_string($con,(strip_tags($_POST["puesto"],ENT_QUOTES)));//Escanpando caracteres 

				$estado			 = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
				
			

				$cek = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$codigo'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO empleados(codigo, nombres, apellidos, cargo, email, tel_personal, puesto, estado, ext)
															VALUES('$codigo','$nombres', '$apellidos', '$cargo', '$email', '$tel_personal', '$puesto', '$estado', '$ext')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Código</label>
					<div class="col-sm-2">
						<input type="text" name="codigo" class="form-control" placeholder="Código" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellidos</label>
					<div class="col-sm-4">
						<input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Cargo</label>
					<div class="col-sm-4">
						<input type="text" name="cargo" class="form-control" placeholder="Cargo" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<textarea name="email" class="form-control" placeholder="Email"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tel. Personal</label>
					<div class="col-sm-3">
						<input type="text" name="tel_personal" class="form-control" placeholder="Tel. Personal" required>
					</div>
                    
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ext</label>
					<div class="col-sm-3">
						<input type="text" name="ext" class="form-control" placeholder="Extencion" required>
					</div>
				
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Puesto</label>
					<div class="col-sm-3">
						<input type="text" name="puesto" class="form-control" placeholder="Puesto" required>
					</div>
                </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="estado" class="form-control">
							<option value=""> ----- </option>
                           <option value="1">Fijo</option>
							<option value="2">Contratado</option>
							
							 <option value="3">Outsourcing</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>