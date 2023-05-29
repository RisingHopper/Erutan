<?php
ob_start();
$pageTittle="About";?>








<div class="container-fluid ">

    <!-- inicio -->


 
    <div class="row pt-2 pb-0 d-flex">
      <div class="d-none d-md-flex col-12 g--bg-about d-flex justify-content-center align-items-center mb-3 g--height-233 text-white">
        <h2 class="g--font-size-55 text-uppercase fw-semibold">About Erutan</h2>
      </div>
      <div class="d-block d-md-none col-12 g--bg-about d-flex justify-content-center align-items-center mb-3 g--height-150 text-white">
        <h2 class="d-block d-md-none g--font-size-30 text-uppercase fw-semibold">About Erutan</h2>
      </div>
      <div class="col-12 col-md-6 bg-light p-4 p-md-5 g--font-size-22 g--text-justify">
        <p>Erutan is a website created with the purpose of entertain the people with information about nature and animals.
        This website 
        users to find his favourite dish. Several restaurants are registred in this site, you can visit them and leave a review to help others person to make their choice.
        The concept is very simple, you have to choose your favourite category, then the site will display all the restaurants that have that category that has been choosen by you. After that, you will be able to sight the specific dishes that are on your category
        <br><br><u>Team Erutan</u></p>

      </div>
      <div class="col-12 col-md-6 bg-success g--bg-content">

      </div>
      <div class="col-12 mt-5 px-0">
        <?php include "components/newsletter.php" ?>
      </div>




      


    </div>












    








    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>