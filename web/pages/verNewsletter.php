<?php
ob_start();
if (isset($params['mensaje'])) { 
	echo $params['mensaje'] ;
}
    ?>
<!--<b><span style="color: rgba(200, 119, 119, 1);"></span></b>

	<div class"container-fluid " style="background-color:white;">
	<div class="row">
	<div class="col-md-12">
		<h1 class="p-2">//echo $params['noticias']['titulo']</h1>-->

	<div class"container-fluid " style="background-color:white;">
			<div class="container">
				<div class="row">				
					<div class="col-md-3">
						<p></p>
					</div>
					<div class="col-md-6">
						<h1 class="p-2"><?php echo $params['noticias']['titulo']?></h1>
						<table border="1" cellpadding="10">
							<tr align="center">
								<th>Título</th>
								<td><?php echo $params['noticias']['asunto']; ?></td>
							</tr>
							<tr align="center">
								<th>Autor</th>
								<td><?php echo $params['noticias']['mensaje']; ?></td>
							</tr>
							<tr align="center">
								<th>Imagen</th>
								<td><?php echo $params['noticias']['imagen']; ?></td>
							</tr>
							<tr align="center">
								<th>Fecha de publicación</th>
								<td><?php echo $params['noticias']['fecha']; ?></td>
							</tr>
						</table>
						<form action="index.php?ctl=enviarNewsletter&idTitulo=<?php echo $params['noticias']['titulo']?>" method="Post">
							<input type="submit" value="Enviar NewsLetter" name="bSubir"/>
						</form>
				

					</div>

					<div class="col-md-3">	            
              		
										
				</div>
			</div>
	</div>-->


<?php $contenido = ob_get_clean();
include 'layout.php' ?>