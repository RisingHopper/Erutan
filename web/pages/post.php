<?php
ob_start();
$pageTittle="Post";
?>
	
<div class="container-fluid ">

    <!-- inicio -->



    <!-- <div class="col-10 g--font-size-24 mx-auto">
      <div class="g--border-bottom-grey">
        <h2><b>Check all Posts</b></h2>	
      </div>
    </div> -->

    <div class="row mt-3">
      <div class="col-2 bg-success">ffft</div>
        <div class="col-10 d-flex flex-wrap justify-content-between">
          <div class="col-10 mx-auto">
            <img src="<?php echo $params['posts']['imagen']; ?>" alt="" class="w-100">
          </div>
          <div class="col-10 mt-4 mx-auto">
            <h2 class="fw-bold text-center"><?php echo $params['posts']['tituloPost']; ?></h2>
            <p class="g--font-size-22 mt-3 px-4"><?php echo $params['posts']['contenido']; ?></p>
          </div>
          

              
                
                
           
                  <!-- <h5 class="card-title"><b><?php echo $posts['contenido']; ?></b></h5> -->
   
     
      </div>
    </div>





    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>







