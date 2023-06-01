<?php
ob_start();
$pageTittle="Community - The erutan";?>

<div class="container-fluid px-md-5 my-4">

    <!-- inicio -->


   
        <div class="g--bg-community mx-auto g--leter-spacing-2 g--word-spacing g--font-family-monoton d-flex justify-content-center align-items-center" style="width:100%; height:55vh;">
            <h2 class="d-none d-md-block g--font-size-50 fw-semibold g--color-ff74fc">Join to the Nature's community</h2>
            <h2 class="d-block d-md-none g--font-size-30 text-center fw-semibold g--color-ff74fc">Join to the Nature's community</h2>
        </div>

        <div class="storeForum">
            <div class="joinUs col-12"><a href="index.php?ctl=registro">Join Us</a></div>
            <div class="store col-12"><a href="#">Store</a></div>
            <div class="forum col-12"><a href="#">Forum</a></div>
        </div>

      


 




    <!-- fin -->

</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>