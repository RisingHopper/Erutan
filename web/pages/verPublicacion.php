<?php
ob_start();
$pageTittle= "Post - " .$params['post']['titulo'];
?>
	
<div class="container-fluid g--font-size-20">

    <!-- inicio -->

	<div class="col-10 mx-auto mt-5">
		<h1 class="p-2 text-center mb-4"><b>Post - <?php echo $params['post']['titulo']?></b></h1>
		<div class="row mx-0 g--border-black p-2">
			<div class="col-3 px-0 pe-2">
				<img style="width: 100%;" src="<?php echo $params['post']['imagen']; ?>">
				<?php $imgName=$params['post']['imagen'];
					  $imgName=substr($imgName,26);
				?>
				<p class="text-center fw-bold mt-1"><?php echo $imgName; ?></p>
				<!-- <form class="w-100"action="index.php?ctl=enviarpost&idTitulo=<?php echo $params['post']['titulo']?>" method="Post">
					<input type="submit" value="Edit" name="bSubir"/>
				</form>
				<form action="index.php?ctl=enviarpost&idTitulo=<?php echo $params['post']['titulo']?>" method="Post">
					<input type="submit" value="Send" name="bSubir"/>
				</form>
				<form action="index.php?ctl=borrarpost&idTitulo=<?php echo $params['post']['titulo']?>" method="Post">
					<input type="submit" value="Delete" name="bSubir"/>
				</form> -->
				<div class="bg-danger g--border-black ps-2 g--hover-bg-black"><a class="text-decoration-none text-white"href="index.php?ctl=editarPublicacion&idTitulo=<?php echo $params['post']['titulo']?>">Edit</a></div>
				<!-- <div class="bg-danger g--border-black ps-2 mt-1 g--hover-bg-black"><a class="text-decoration-none text-white" href="index.php?ctl=editarPublicacion&idTitulo=<?php echo $params['post']['titulo']?>">Send</a></div> -->
				<div class="bg-danger g--border-black ps-2 mt-1 g--hover-bg-black"><a class="text-decoration-none text-white" href="index.php?ctl=borrarPublicacion&idTitulo=<?php echo $params['post']['titulo']?>">Delete</a></div>
			</div>
			<div class="col-9 px-0">
				<div class="d-flex g--height-50 g--bg-feffdf">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Tittle</div>
					<div class="py-2 ps-3"><?php echo $params['post']['tituloPost']; ?></div>
				</div>
				<div class="d-flex g--height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Date</div>
					<div class="py-2 ps-3"><?php echo $params['post']['dateSend']; ?></div>
				</div>
				<div class="d-flex g--min-height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Category</div>
					<div class="py-2 ps-3"><?php echo $params['post']['categoria']; ?></div>
				</div>
				<div class="d-flex g--min-height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Carrousel Text</div>
					<div class="py-2 ps-3"><?php echo $params['post']['contenidoCarrusel']; ?></div>
				</div>
				<div class="d-flex g--height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Card Text</div>
					<div class="py-2 ps-3"><?php echo $params['post']['textoCard']; ?></div>
				</div>
				<div class="d-flex g--min-height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Contenido</div>
					<div class="py-2 ps-3"><?php echo $params['post']['contenido']; ?></div>
				</div>
			</div>
		</div>





	</div>


    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>
















	