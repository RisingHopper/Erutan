<?php ob_start();?>

<div class="container-fluid"> 

<?php	foreach ($params['vendors'] as $vendor) :?>

	<div class="row ">
		<div class="col-12">
			<div class="card card__restaurante mx-auto">
				<img src="pictures/bar_galan.jpg" class="card__restaurante__img" alt="...">
				<div class="card-body">º
					<h5 class="card-title">Restaurante <?php echo $vendor["RName"] ?></h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="index.php?ctl=paginaRestaurantesxD&RName=<?php echo $vendor['RName']?>" class="btn btn-primary">Visitar Web</a>
				</div>
			</div>	
		</div>
	</div>

	<?php endforeach; ?>

</div>
		

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>