<?php
ob_start();
$pageTittle= "Post - " .$params['newsletter']['titulo'];
?>
	
<div class="container-fluid g--font-size-20">

    <!-- inicio -->

	<div class="col-10 mx-auto mt-5">
		<h1 class="p-2 text-center mb-4"><b>Newsletter - <?php echo $params['newsletter']['titulo']?></b></h1>
		<div class="row mx-0 g--border-black p-2">

			<div class="col-12 px-0">
				<img style="width: 100%; height:200px;" src="<?php echo $params['newsletter']['imagen']; ?>">
				<?php $imgName=$params['newsletter']['imagen'];
					  $imgName=substr($imgName,26);
				?>
				<p class="text-center fw-bold my-2 g--border-top-black-1 g--border-bottom-black-1"><?php echo $imgName; ?></p>
			</div>
			<div class="col-12 px-0">
				<div class="d-flex g--height-50 g--bg-feffdf">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Tittle</div>
					<div class="py-2 ps-3"><?php echo $params['newsletter']['titulo']; ?></div>
				</div>
				<div class="d-flex g--height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Date</div>
					<div class="py-2 ps-3"><?php echo $params['newsletter']['dateSend']; ?></div>
				</div>
				<div class="d-flex g--height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Subject</div>
					<div class="py-2 ps-3"><?php echo $params['newsletter']['asunto']; ?></div>
				</div>
				<div class="d-flex g--min-height-50 g--bg-feffdf mt-1">
					<div class="col-3 g--bg-5f6caf py-2 ps-3 fw-bold g--border-right-white-5">Message</div>
					<div class="py-2 ps-3"><?php echo $params['newsletter']['mensaje']; ?></div>
				</div>
			</div>
			<div class="col-12 px-0 mt-2 d-flex">
				<div class="bg-danger g--border-black px-5 py-1 g--hover-bg-black"><i class="fa-solid fa-pen-to-square text-white"></i>&nbsp<a class="text-decoration-none text-white"href="index.php?ctl=editarNewsletter&idTitulo=<?php echo $params['newsletter']['titulo']?>">Edit</a></div>
				<div class="bg-danger g--border-black px-5 py-1 mx-2 g--hover-bg-black"><i class="fa-solid fa-paper-plane text-white"></i>&nbsp<a class="text-decoration-none text-white" href="index.php?ctl=enviarNewsletter&idTitulo=<?php echo $params['newsletter']['titulo']?>">Send</a></div>
				<div class="bg-danger g--border-black px-5 py-1 g--hover-bg-black"><i class="fa-solid fa-trash text-white"></i>&nbsp<a class="text-decoration-none text-white" href="index.php?ctl=borrarNewsletter&idTitulo=<?php echo $params['newsletter']['titulo']?>">Delete</a></div>
			</div>
		</div>





	</div>


    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>
















	