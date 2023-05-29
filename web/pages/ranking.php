<?php
ob_start();
$pageTittle="Posts";
include "components/marquee.php";
?>
	
<div class="container-fluid ">

    <!-- inicio -->





        <div class="col-12 col-md-10 d-flex flex-wrap justify-content-between">
        <?php foreach ($params['newsletter'] as $posts) :?>
            <p><?php echo $posts['idUsuario']; ?></p>
        <?php endforeach; ?>
      </div>
    </div>





    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>