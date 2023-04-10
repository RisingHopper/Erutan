<?php ob_start() ?>

<table style="background-color:white; width:80vh; margin:auto">
	<tr>
		<th><h4><b>List of Newsletters</b></h4><br></th>		
	</tr>
	
	<?php foreach ($params['noticias'] as $noticias) :?>
	<tr>
		<td><a href="index.php?ctl=verNewsletter&idTitulo=<?php echo $noticias['titulo']?>" class="tablaP">
		<?php echo $noticias['titulo'] ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>