<?php ob_start() ?>






<div class="container-fluid">
    <!-- Introducción y cards -->
    <div class="row">
        <div class="col-12 col-md-4 pe-2 g--font-size-regular  g--text-justify px-0 mx-0">
            <div class="">
                <img src="assets/img/logo.png" class="g--width-250">
                <p class="mt-3">The Erutan is a site where you will find a lot of interestings facts that you probabily dindn't know until now.
                    I know that reading is very boring, so I have made sure that your experience on this site will be more enjoyable.</p>
                <p class="bg-white g--border-black d-inline-block px-4 py-1 mt-2">Become a contributor</p>
            </div>

        </div>
        <div class="col-md-8 px-0 ps-5">
            <?php include 'components/carrusel.php' ?>
        </div>
    </div>


    <!-- Pregunta y videos -->
    <div class="row mt-5">
        <div class="col-12 col-md-4">
            <?php include "components/question_card.php" ?>
        </div>
        <div class="offset-md-1 col-12 col-md-7 bg-black d-flex flex-wrap px-3 py-3">
            <div class="col-md-6 bg-dark g--border-white"><iframe class="col-12" src="https://www.youtube.com/embed/BZKgEDHHkjE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
            <div class="col-md-6 bg-success"><iframe class="col-12" src="https://www.youtube.com/embed/BZKgEDHHkjE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
            <div class="col-md-6"><iframe width="560" height="315" src="https://www.youtube.com/embed/BZKgEDHHkjE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
        </div>
    </div>



    <!-- newsletter -->
    <div class="col-8 mx-auto my-5">
    <?php include "components/newsletter.php" ?>
    </div>






</div>











      
      
      
    
    









</div>


<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>