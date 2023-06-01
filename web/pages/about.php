<?php
ob_start();
$pageTittle="About - The erutan";
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
?>



<?php $miradoresKeys = array_keys($lang["home"]);
    for ($x = 0; $x<count($lang["home"]) -1 ;$x++){?>




<div class="container-fluid px-md-5 my-4 px-4">

    <!-- inicio -->


 
    <div class="row pt-2 pb-0 d-flex">
      <div class="d-none d-md-flex col-12 g--bg-about d-flex justify-content-center align-items-center mb-3 g--height-233 text-white">
        <h2 class="g--font-size-55 text-uppercase fw-semibold"><?=$lang["about"]['title']["titulo"]?></h2>
      </div>
      <div class="d-block d-md-none col-12 g--bg-about d-flex justify-content-center align-items-center mb-3 g--height-150 text-white">
        <h2 class="d-block d-md-none g--font-size-30 text-uppercase fw-semibold">About Erutan</h2>
      </div>
      <div class="col-12 col-md-6 bg-light p-4 p-md-5 g--font-size-22 g--text-justify">
        <p><?=$lang["about"]['texto']["parrafo"]?>
        <br><br><u><?=$lang["about"]['team']["equipo"]?></u></p>

      </div>
      <div class="col-12 col-md-6 bg-success g--bg-content">

      </div>
      <div class="col-12 mt-5 px-0">
        <?php include "components/newsletter.php" ?>
      </div>




      


    </div>












    








    <!-- fin -->

</div>


<?php } ?>

	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>