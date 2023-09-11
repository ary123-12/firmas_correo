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
	<title>Datos de empleados</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
	<style>
		.content {
			margin-top: 80px;
		}
        .tarjeta {
            width: fit-content;
            height: fit-content;
            /*width: 480px; /* Ancho de la tarjeta */
            background-color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            display: grid;
            grid-template-columns: 150px auto; /* Dos columnas: imagen y contenido */
            gap: -60px; /* Espacio entre columnas */
            align-items: center; /* Centra verticalmente */
        }
        .tarjeta2 {
            width: fit-content;
            height: fit-content;
            /*width: 480px; /* Ancho de la tarjeta */
            background-color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            display: grid;
            grid-template-columns: 150px auto; /* Dos columnas: imagen y contenido */
            gap: -60px; /* Espacio entre columnas */
            align-items: center; /* Centra verticalmente */
        }

        .imagen {
            width: 120px; /* Ancho de la imagen */
            height: 100px; /* Altura de la imagen */
        }

        .nombre {
            width: auto;
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .titulo {
            font-size: 16px;
        }

        .contacto {
            font-size: 14px;
        }
        .apellidos{
            font-family: Century Gothic;
            font-size: 20px;
            color: #2c64a4;
            font-weight: bold;
            margin-top: -15px;
            margin-bottom: -100px;
            

        }
        .nombres{
            font-family: Century Gothic;
            font-size: 20px;
            color: #2c64a4;
            font-weight: bold;
            margin-top: -15px;
            margin-bottom: -100px;
            
            
        }
        .cargo{
            font-family: Century Gothic;
            font-size: 16px;
            color: #2c64a4;
            margin-top: 6px; 
            margin-bottom: 2px;   /* Elimina el margen superior */
            
           
        }
        .tel{
            font-family: Century Gothic;
            font-size: 16px;
            color: #2c64a4;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 0;
        }
        .numero{
            font-family: Century Gothic;
            font-size: 16px;
            color: #000000;
            margin-top: 0;
            margin-bottom: 0;
        }
        .ext{
            font-family: Century Gothic;
            font-size: 16px;
            color: #2c64a4;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 0;
        }
        .next{
            font-family: Century Gothic;
            font-size: 16px;
            color: #000000;
            margin-top: 0;
            margin-bottom: 0;
        }
        .web{
            font-family: Century Gothic;
            font-size: 16px;
            color: #2c64a4;
            font-weight: bold;
            margin-top: -5px;
            margin-bottom: 0;
            
        }
        .a{
            font-family: Century Gothic;
            font-size: 16px;
            color: #000000;
            margin-top: 0;
            margin-bottom: 0;
        }
        .email{
            font-family: Century Gothic;
            font-size: 16px;
            color: #2c64a4;
            font-weight: bold;
            margin-top: -15px;
            margin-bottom: -100px;
        }
        .email1{
            font-family: Century Gothic;
            font-size: 16px;
            color: #000000;
            margin-top: -15px;
            margin-bottom: -100px;
        }
        
        
	</style>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos del empleados &raquo; Perfil</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			
			$sql = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($con, "DELETE FROM empleados WHERE codigo='$nik'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">Código</th>
					<td><?php echo $row['codigo']; ?></td>
				</tr>
				<tr>
					<th >Nombre</th>
					<td><?php echo $row['nombres']; ?></td>
				</tr>
                <tr>
					<th>Apellido</th>
					<td><?php echo $row['apellidos']; ?></td>
				</tr>
                <tr>
					<th>Cargo</th>
					<td><?php echo $row['cargo']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Tel. Personal</th>
					<td><?php echo $row['tel_personal']; ?></td>
				</tr>
				<tr>
					<th>Puesto</th>
					<td><?php echo $row['puesto']; ?></td>
				</tr>
				<tr>
					<th>Estado</th>
					<td>
						<?php 
							if ($row['estado']==1) {
								echo "Fijo";
							} else if ($row['estado']==2){
								echo "Contratado";
							} else if ($row['estado']==3){
								echo "Outsourcing";
							}
						?>
					</td>
				</tr>
				
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Regresar</a>
			<a href="edit.php?nik=<?php echo $row['codigo']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar datos</a>
			<a href="profile.php?aksi=delete&nik=<?php echo $row['codigo']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de borrar los datos <?php echo $row['nombres']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
		</div>
	</div>

    <div id="tuDiv" class="tarjeta">
        <img src="img/cropped-BACROCORP_T.png" alt="Tu Imagen" class="imagen">
        <div>
            <table>
                <tr>
                    <td>
                        <p class="apellidos">
                        <?php echo $row['apellidos'];?>
                    </p>
                    </td>
                    <td>
                        <p class ="nombres">
                        &nbsp;
                        <?php echo $row['nombres'];?>
                    </p>
                    </td>
                </tr>
            </table>
            <tr>
                    <td>
                        <p class ="cargo">
                        <?php echo $row['cargo'];?>
                    </p>
                    </td>
                </tr>
                <table>
                <tr>
                    <td>
                        <p class = "tel">
                            Telefono: &nbsp; 
                        </p>
                    </td>
                    <td>
                        <p class = "numero">
                        8005500909
                        </p>
                    </td>
                    <td>
                        <p class = "ext">&nbsp;
                            Ext:  &nbsp;
                        </p>
                                           
                    </td>
                    <td>
                        <p class = "next">
                            <?php echo $row['ext'];?>
                        </p>
                    
                    </td>
                </tr>
                </table>
                
                <tr>
                    <td>
                        <p class = "web">WEB: <a href="http://www.bacrocorp.com">www.bacrocorp.com</a> </p>
                    </td>
                    <td>
                        <p>
                            
                        </p>
                    </td>                  
                </tr>
                <table class ="tabla">
                <tr class ="tr2">
                    <td class = "email5">
                        <p class = "email">
                        <?php echo "Email:";?>
                        
                        </p>
                    </td>
                    <td>
                        <p class="email1">
                        <?php echo $row['email'];?>
                    </p>
                    </td>
                </tr>
                </table>
                
            
        </div>
    </div>
    <a href="#" class="btn btn-sm btn-info" id="descargarBoton"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar</a>
    
</div>

<div id="div2" class="tarjeta2">
        <img src="img/cropped-BACROCORP_T.png" alt="Tu Imagen" class="imagen">
        <div>
            <table>
                <tr>
                    <td>
                        <p class="apellidos">
                        <?php echo $row['apellidos'];?>
                    </p>
                    </td>
                    <td>
                        <p class ="nombres">
                        &nbsp;
                        <?php echo $row['nombres'];?>
                    </p>
                    </td>
                </tr>
            </table>
            <tr>
                    <td>
                        <p class ="cargo">
                        <?php echo $row['cargo'];?>
                    </p>
                    </td>
                </tr>
                <table>
                <tr>
                    <td>
                        <p class = "tel">
                            Telefono: &nbsp; 
                        </p>
                    </td>
                    <td>
                        <p class = "numero">
                        8005500909
                        </p>
                    </td>
                    
                </tr>
                </table>
                
                <tr>
                    <td>
                        <p class = "web">WEB: <a href="http://www.bacrocorp.com">www.bacrocorp.com</a> </p>
                    </td>
                    <td>
                        <p>
                            
                        </p>
                    </td>                  
                </tr>
                <table class ="tabla">
                <tr class ="tr2">
                    <td class = "email5">
                        <p class = "email">
                        <?php echo "Email:";?>
                        
                        </p>
                    </td>
                    <td>
                        <p class="email1">
                        <?php echo $row['email'];?>
                    </p>
                    </td>
                </tr>
                </table>
                
            
        </div>
    </div>
    <a href="#" class="btn btn-sm btn-info" id="sinextencion"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar</a>
    
</div>

<script>
    // Obtén una referencia al div que deseas descargar
var divToDownload = document.getElementById('tuDiv'); // Reemplaza 'tuDiv' con el ID de tu div

// Agrega un evento de clic a un botón (o enlace) que desencadenará la descarga
document.getElementById('descargarBoton').addEventListener('click', function () {
    html2canvas(divToDownload).then(function (canvas) {
        // Convierte el contenido del div en una imagen
        var imgData = canvas.toDataURL('image/png');
        
        // Crea un enlace para descargar la imagen
        var a = document.createElement('a');
        a.href = imgData;
        a.download = 'firma_<?php echo $row['nombres'];?>_<?php echo $row['apellidos'];?>.png'; // Nombre del archivo de descarga
        a.click();
    });
});
</script>
<script>
    // Obtén una referencia al div que deseas descargar
var divToDownload1 = document.getElementById('div2'); // Reemplaza 'tuDiv' con el ID de tu div

// Agrega un evento de clic a un botón (o enlace) que desencadenará la descarga
document.getElementById('sinextencion').addEventListener('click', function () {
    html2canvas(divToDownload1).then(function (canvas) {
        // Convierte el contenido del div en una imagen
        var imgData1 = canvas.toDataURL('image/png');
        
        // Crea un enlace para descargar la imagen
        var a = document.createElement('a');
        a.href = imgData1;
        a.download = 'firma_<?php echo $row['nombres'];?>_<?php echo $row['apellidos'];?>.png'; // Nombre del archivo de descarga
        a.click();
    });
});
</script>
</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>