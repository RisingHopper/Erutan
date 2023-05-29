<?php
ob_start();
$pageTittle="Posts";
include "components/marquee.php";
?>
	
<div class="container-fluid ">

    <!-- inicio -->



    <div class="col-10 g--font-size-24 mx-auto">
      <div class="g--border-bottom-grey">
        <h2><b>Check all Posts</b></h2>	
      </div>
    </div>

    <div class="row mt-3">
      <!-- <div class="col-2 bg-success">ffff</div> -->
      <div class="d-none d-md-block col-md-2 px-0">
        <div class="container-fluid d-flex flex-column px-0">
          <div class="bg-light border border-black px-3 py-1 g--border-inset">
              <a href="#" class="text-decoration-none text-black"><h2>Animals</h2></a>
          </div>
          <div class="bg-light border border-black px-3 py-1 mt-1 g--border-inset">
              <a href="#" class="text-decoration-none text-black"><h2>People</h2></a>
          </div>
          <div class="bg-light border border-black px-3 py-1 mt-1 g--border-inset">
              <a href="" class="text-decoration-none text-black"><h2>Science</h2></a>
          </div>
        </div>
      </div>



      




















        <div class="col-12 col-md-10 d-flex flex-wrap justify-content-between">
        <?php foreach ($params['posts'] as $posts) :?>
            <div class="col-12 col-md-4 mb-5 px-3">
              <div class="card">
                <img src="<?php echo $posts['imagen']; ?>" class="card-img-top mx-auto mt-4 object-fit-cover" alt="..." style="width:85%; height:270px;">
                <div class="card-body text-center">
                  <h5 class="g--font-family-workSans fw-bold g--color-ff74fc text-center g--font-size-20"><b><?php echo $posts['titulo']; ?></b></h5>
                  <p class="card-text"><?php echo $posts['textoCard']; ?></p>
                  <a href="index.php?ctl=paginaPost&idPost=<?php echo $posts['titulo']; ?>" class="g--btn-red2 g--hover-btn-pink g--font-size-16">Read more</a>
                </div>
              </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>





    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>







