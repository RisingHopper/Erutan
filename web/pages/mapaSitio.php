<?php ob_start() ?>
	
<div class="container-fluid">
	<div class="row mb-2" id="secondaryIndex" >
		<div class="col-1">
			<h4><a href="index.php?ctl=inicio">Inicio</a></h4>
		</div>
		<div class="col-3">
			<h4><a href="index.php?ctl=mapaSitio">Mapa del sitio</a></h4>
		</div>
	</div>
	<div id="mapaSitio">
		<ul>
			<li><a class="nav-link " href="index.php?ctl=inicio">Inicio</a></li>
			<li><a class="nav-link " href="index.php?ctl=categoria">Categoria</a></li>
			<li><a class="nav-link " href="index.php?ctl=resturantes">Restaurantes</a></li>
			<li><a class="nav-link " href="#">Comunidad</a></li>
			<ul>
			<li><a class="nav-link " href="index.php?ctl=blog">Blog</a></li>
			<li><a class="nav-link " href="index.php?ctl=categoria">Categoria</a></li>
			<li><a class="nav-link " href="index.php?ctl=resturantes">Restaurantes</a></li>
			</ul>
		</ul>
	</div>
</div>
		
	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>