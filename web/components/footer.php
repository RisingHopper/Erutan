<div class="pt-5 pb-1 container-fluid bg-black text-white">
  <footer class="px-3">
    <div class="row">
      <div class="col-12 col-md-4 mb-3 text-white g--font-size-20">

        <div class="mb-4">
            <a href="index.php?ctl=inicio"><img class="g--width-250" src="assets/img/logoWhite.png" alt="logo"></a>
        </div>
        <div class="">
          <p><?=$lang["footer"]["texto"]?></p>
        </div>

      </div>
      <div class="offset-md-2 col-6 col-md-2 mb-3">
        <h3><?=$lang["footer"]["about"]?></h3>
        <ul class="nav flex-column mt-3">
          <?php if($_SESSION['nivel_usuario']<1){
            echo '<li class="nav-item mb-2"><a data-bs-toggle="modal" data-bs-target="#exampleModals" class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#" class="nav-link p-0 text-body-secondary">Log In</a></li>';
          }
          ?>
          <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="index.php?ctl=aboutPage" class="nav-link p-0 text-body-secondary"><?=$lang["footer"]["about"]?></a></li>
          <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="index.php?ctl=paginaFaq" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <!-- <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#" class="nav-link p-0 text-body-secondary">Store</a></li> -->
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h3><?=$lang["footer"]["privacidad"]?></h3>
        <ul class="nav flex-column mt-3">
          <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="index.php?ctl=cookiesPage" class="nav-link p-0 text-body-secondary g--color-b5a7a7">Cookies</a></li>
          <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="index.php?ctl=privacidadPage" class="nav-link p-0 text-body-secondary g--color-b5a7a7"><?=$lang["footer"]["privacidad"]?></a></li>
          <!-- <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#" class="nav-link p-0 text-body-secondary g--color-b5a7a7">Pricing</a></li>
          <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#" class="nav-link p-0 text-body-secondary g--color-b5a7a7">FAQs</a></li> -->
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h3><?=$lang["footer"]["rss"]?></h3>
        <ul class="nav flex-column mt-3">
        <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#"><i class="fab fa-facebook-square "></i> Facebook</a></li>
        <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#"><i class="fab fa-twitter-square"></i> Twitter</a></li>
        <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#"><i class="fab fa-linkedin"></i> Linkedin</a></li>
        <li class="nav-item mb-2"><a class="text-decoration-none g--color-b5a7a7 g--font-size-20" href="#"><i class="fab fa-instagram-square"></i> Instagram</a></li>
        </ul>
      </div>

    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-center pt-4 border-top">
      <p>&copy; 2023 Company, Inc. All rights reserved.</p>
    </div>
  </footer>
  <!--LIBS-->
        <!--Bootstrap-->
        <script src="<?= SITE_ROOT ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--Validator-->
        <script src="<?= SITE_ROOT ?>libs/validator.min.js"></script>
        <!--SweetAlert-->
        <script src="<?= SITE_ROOT ?>libs/sweetAlert.js"></script>

        <script src="assets/js/viewsGraphics.js"></script>
</div>