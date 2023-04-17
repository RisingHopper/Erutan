<?php ob_start() ?>

<div class="row" style="background-color:white;">
	<div class=col-12><h1>Create Newsletter</h1></div>
	<div class="col-4"></div>
	<div class="col-6">
		<form style="width:550px" action="index.php?ctl=crearNoticia" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="tituloN" class="form-label" >Newsletter Tittle</label>
				<input type="text" class="form-control" id="tituloN" name="titulo" placeholder="Write Newsletter's tittle">
			</div>
			<div class="mb-3">
				<label for="asuntoN" class="form-label">Subject</label>
				<input type="text" class="form-control" id="asuntoN" name="asunto" placeholder="Write Newsletter's subject">
			</div>
			<div class="mb-3">
				<label for="mensajeN" class="form-label">Message</label>
				<textarea class="form-control" id="mensajeN" name="mensaje" rows="9" placeholder="EWrite Newsletter's message"></textarea>
			</div>
			<div class="mb-3">
				<label for="multimediaN" class="form-label">Multimedia</label>
				<input class="form-control" type="file" id="multimediaN" name="multimedia">
			</div>
			<div class="mb-3">
				<label for="fechaN" class="form-label">Date</label>
				<input type="date" class="form-control" id="fechaN" name="fecha">
			</div>
			<button type="submit" class="btn btn-primary" name="bSubir">Submit Newsletter</button>
		
		</form>
	</div>
</div>



<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>