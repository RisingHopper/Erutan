<?php 
ob_start();
$pageTittle="Inicio";
?>



<div class="container-fluid">
    <!-- Introducción y cards -->
    <div class="row">
        <div class="col-12 col-md-4 pe-2 g--font-size-20  g--text-justify px-0 mx-0">
            <div class="">
                <img src="assets/img/logo.png" class="g--width-250">
                <p class="mt-3">The Erutan is a site where you will find a lot of interestings facts that you probabily dindn't know until now.
                    I know that reading is very boring, so I have made sure that your experience on this site will be more enjoyable.</p>
                <p class="bg-white g--border-black d-inline-block px-4 py-1 mt-2 g-hover-btn-white:hover">Become a contributor</p>
            </div>

        </div>
        <div class="d-none d-xl-block col-md-8 px-0 ps-5">
            <?php include 'components/carrusel.php' ?>
        </div>
        <div class="d-block d-md-none col-12 px-0">
            <?php include 'components/carruselResponsive.php' ?>
        </div>
    </div>


    <!-- Pregunta y videos -->
    <div class="row mt-5">
        <div class="col-12 col-md-4">
            <?php include "components/question_card.php" ?>
        </div>
        <div class="offset-md-1 col-12 col-md-7 px-0 mt-5 mt-md-0">
            <div class="d-flex flex-row justify-content-between px-5 mb-3">
                <div><h2 class="g--font-size-2con8 g--fw-600 g--hover-black-pink">Articles</h2><hr class="g--hr-custom g--bg-yellow"></div>
                <div><h2 class="g--font-size-2con8 g--fw-600 g--hover-black-pink">Videos</h2><hr class="g--hr-custom g--bg-blue"></div>
                <div><h2 class="g--font-size-2con8 g--fw-600 g--hover-black-pink">Games<h2><hr class="g--hr-custom g--bg-red"></div>
            </div>
            <div class="bg-black d-flex flex-wrap px-3 py-3">
            <div class="col-12 col-md-6 pe-0 pe-md-2 mb-3">
                <div class="ratio ratio-16x9 g--border-white">
                    <iframe src="https://www.youtube.com/embed/g4NFAwppIM0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 ps-0 ps-md-2 mb-3">
                <div class="ratio ratio-16x9 g--border-white">
                    <iframe src="https://www.youtube.com/embed/K-9oPhkII2U" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 pe-0 pe-md-2 mb-3">
                <div class="ratio ratio-16x9 g--border-white">
                    <iframe src="https://www.youtube.com/embed/2W4B-VbrxdQ" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 ps-0 ps-md-2 mb-3">
                <div class="ratio ratio-16x9 g--border-white">
                    <iframe src="https://www.youtube.com/embed/wYLdYB4npxQ" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 pe-0 pe-md-2 mb-3 mb-md-0">
                <div class="ratio ratio-16x9 g--border-white">
                    <iframe src="https://www.youtube.com/embed/Vm3oDK86bF0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 ps-0 ps-md-2">
                <div class="ratio ratio-16x9 g--border-white">
                    <iframe src="https://www.youtube.com/embed/yY7erkJ7qsQ" allowfullscreen></iframe>
                </div>
            </div>
            </div>
        </div>
    </div>



    <!-- newsletter -->
    <div class="col-12 mx-auto my-5 px-0 mx-0">
    <?php include "components/newsletter.php" ?>
    </div>






</div>







</div>


<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>