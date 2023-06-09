<?php
ob_start();
$pageTittle="Animals - The erutan";
include "components/marquee.php";
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
?>
	
<div class="container-fluid">

    <!-- inicio -->


    <div class="row">

      <?php include "components/asideCategorias.php"?>

      <div class="col-12 col-md-10 d-flex flex-wrap justify-content-center mt-4">
        <div class="col-11  mx-auto mb-4 mt-3">
          <div class="g--border-bottom-grey">
            <h2><b><?=$lang["publicaciones"]["animals"]?></b></h2>	
          </div>
        </div>

        <?php if (($_SESSION['lang'])=='es'){?>

        <?php foreach ($params['es'] as $posts) :?>
            <div class="col-12 col-md-4 mb-5 px-3 g--hover-transform g--transition">
              <div class="card">
                <img src="<?php echo $posts['imagen']; ?>" class="card-img-top mx-auto mt-4 object-fit-cover" alt="..." style="width:85%; height:270px;">
                <div class="card-body text-center">
                  <h5 class="g--font-family-workSans fw-bold g--color-ff74fc text-center g--font-size-20"><b><?php echo $posts['tituloPost']; ?></b></h5>
                  <p class="card-text"><?php echo $posts['textoCard']; ?></p>
                  <a href="index.php?ctl=paginaPost&idPost=<?php echo $posts['titulo']; ?>" class="g--btn-red2 g--hover-btn-pink g--font-size-16">Leer más</a>
                </div>
              </div>
            </div>
        <?php endforeach; 
      }else{
        ?>
        <?php foreach ($params['en'] as $posts) :?>
            <div class="col-12 col-md-4 mb-5 px-3 g--hover-transform g--transition">
              <div class="card">
                <img src="<?php echo $posts['imagen']; ?>" class="card-img-top mx-auto mt-4 object-fit-cover" alt="..." style="width:85%; height:270px;">
                <div class="card-body text-center">
                  <h5 class="g--font-family-workSans fw-bold g--color-ff74fc text-center g--font-size-20"><b><?php echo $posts['tituloPost']; ?></b></h5>
                  <p class="card-text"><?php echo $posts['textoCard']; ?></p>
                  <a href="index.php?ctl=paginaPost&idPost=<?php echo $posts['titulo']; ?>" class="g--btn-red2 g--hover-btn-pink g--font-size-16">Read more</a>
                </div>
              </div>
            </div>
        <?php endforeach; } ?>


      </div>

    </div>


    <!-- fin -->

</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>







