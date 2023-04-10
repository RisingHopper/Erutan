<?php ob_start() ?>



<form ACTION="index.php?ctl=iniciarSesion" METHOD="post">

	<div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
		</div>
	</div>

	<div class="container text-center py-2">
		<div class="col-md-12">
			<?php if (isset($params['mensaje'])) : ?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
			<?php endif; ?>
		</div>
	</div>

	<div class="row row-inicio">
		<div class="col-5 d-none d-sm-block d-sm-none d-md-block black d-md-none d-lg-block">
				<img src="pictures/cartel-open.png" class="imagen-inicio" alt="...">
		</div>
		<div class="col-7 container-inicio">
				<div class="container text-center p-4">
				<img src="../web/pictures/sveiki-inicio.png" alt="...">
					<form ACTION="index.php?ctl=iniciarSesion" METHOD="post" NAME="formIniciarSesion">
						<h5><b>Log In</b></h5>
						<p><input TYPE="text" NAME="username" PLACEHOLDER="Username"><br></p>
						<p><input TYPE="password" NAME="passwd" PLACEHOLDER="Password"><br></p>
						<input TYPE="submit" NAME="bIniciarSesion" VALUE="Login" class="btn-inicio"><br>
					</form>
					<br>
					<p>You do not have an account? </p><a href="index.php?ctl=registro" class="btn-inicio">Sign Up</a>
				</div>
		</div>
	</div>



</form>



</form>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>