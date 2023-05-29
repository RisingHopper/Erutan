<?php 
ob_start();
$pageTittle="FAQs";
?>








<div class="container-fluid ">

    <!-- inicio -->


 
    <div class="row pt-2 pb-0">
      <div class="d-none d-md-flex align-items-center justify-content-center col-md-9 mx-auto col-12 text-white text-uppercase text-center fw-bold pb-3 mb-2 g--bg-dashboard g--height-150">
        <h1 class="d-none d-md-block">Frequently asked questions</h1>
      </div>
      <div class="d-flex d-md-none align-items-center justify-content-center col-md-9 mx-auto col-12 text-white text-uppercase text-center fw-bold pb-3 mb-2 g--bg-dashboard g--height-80">
        <h5 class="d-block d-md-none">Frequently asked questions</h5>
      </div>



      <div>
      <?php include 'components/accordion.php' ?>
      </div>



    </div>












    








    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>







