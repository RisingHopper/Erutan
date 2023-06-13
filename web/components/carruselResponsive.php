<div class="swiper mySwiper g--height-550 mt-3">
    <div class="swiper-wrapper">


        <?php if (($_SESSION['lang'])=='es'){?>
        

        <?php foreach ($params['es'] as $posts) :?>
        <div class="col-12 bg-success me-4 bg-light pt-5 g--border-black ">
            <div  class=""><img class="g--width-290 d-block mx-auto g--shadow-img" src="<?php echo $posts['imagen']; ?>" alt="logo"></div>
            <div class="px-4 mt-4 g--font-size-20">
                <h4 class="g--font-family-workSans fw-bold g--color-ff74fc text-center g--font-size-26"><?php echo $posts['tituloPost']; ?></h4>
                <p><?php echo $posts['contenidoCarrusel']; ?></p>
                <a href="index.php?ctl=paginaPost&idPost=<?php echo $posts['titulo']; ?>" class="g--btn-red2 g--hover-btn-pink g--font-size-18"><?=$lang["readMore"]?></a>
            </div>
        </div>
        <?php endforeach; 
        
        }else{

        ?>


        <?php foreach ($params['en'] as $posts) :?>
            <div class="col-12 bg-success me-4 bg-light pt-5 g--border-black ">
                <div  class=""><img class="g--width-290 d-block mx-auto g--shadow-img" src="<?php echo $posts['imagen']; ?>" alt="logo"></div>
                <div class="px-4 mt-4 g--font-size-20">
                    <h4 class="g--font-family-workSans fw-bold g--color-ff74fc text-center g--font-size-26"><?php echo $posts['tituloPost']; ?></h4>
                    <p><?php echo $posts['contenidoCarrusel']; ?></p>
                    <a href="index.php?ctl=paginaPost&idPost=<?php echo $posts['titulo']; ?>" class="g--btn-red2 g--hover-btn-pink g--font-size-18">Read more</a>
                </div>
            </div>
        <?php endforeach; } ?>



        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
               
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>