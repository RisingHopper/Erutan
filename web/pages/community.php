<?php
ob_start();
$pageTittle="Community - The erutan";
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
?>

<div class="container-fluid px-md-5 my-4">

    <!-- inicio -->


   
        <div class="g--bg-community mx-auto g--leter-spacing-2 g--word-spacing g--font-family-monoton d-flex justify-content-center align-items-center" style="width:100%; height:55vh;">
            <h2 class="d-none d-md-block g--font-size-50 fw-semibold g--color-ff74fc"><?=$lang["comunidad"]["titulo"]?></h2>
            <h2 class="d-block d-md-none g--font-size-30 text-center fw-semibold g--color-ff74fc"><?=$lang["comunidad"]["titulo"]?></h2>
        </div>

        <div class="row justify-content-between mt-4 text-center">
            <div class="col-11 mx-auto joinus col-md-4 mb-3"><a href="index.php?ctl=paginaRegistro"><?=$lang["comunidad"]["joinUs"]?></a></div>
            <div class="col-11 mx-auto forum col-md-4 mb-3"><a href="index.php?ctl=paginaForo"><?=$lang["comunidad"]["forum"]?></a></div>
            <div class="col-11 mx-auto store col-md-3 mb-3"><a href="#"><?=$lang["comunidad"]["store"]?></a></div>
        </div>

      


 




    <!-- fin -->

</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>