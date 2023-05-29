<div class="swiper mySwiper g--height-440">
    <div class="swiper-wrapper">
        


        <?php foreach ($params['posts'] as $posts) :?>
        <div class="col-4 bg-success me-4 bg-light pt-4 g--border-black ">
            <div  class=""><img class="g--cover g--width-240 g--height-240 d-block mx-auto g--shadow-img" src="<?php echo $posts['imagen']; ?>" alt="logo"></div>
            <div class="px-4 mt-3">
                <h4 class="g--font-family-workSans fw-bold g--color-ff74fc text-center g--font-size-regular"><?php echo $posts['tituloPost']; ?></h4>
                <p><?php echo $posts['contenidoCarrusel']; ?></p>
                <a href="index.php?ctl=paginaPost&idPost=<?php echo $posts['titulo']; ?>" class="g--btn-red2 g--hover-btn-pink">Read more</a>
            </div>
        </div>
        <?php endforeach; ?>
        

        
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
 
               
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>