<nav class="g--max-width-1440 mx-auto navbar navbar-expand-lg g--height-80 g--border-bottom-white g--font-size-24 pe-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?ctl=inicio"><img class="g--width-180" src="assets/img/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="z-3 collapse navbar-collapse g--margin-left-330" id="navbarSupportedContent"> 
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active g--color-ff74fc g--hover-black-text" aria-current="page" href="index.php?ctl=inicio"><?=$lang["menuInicio"]["inicio"]?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link g--color-ff74fc g--hover-black-text" href="index.php?ctl=posts"><?=$lang["menuInicio"]["publicaciones"]?></a>
        </li>
        <li class="nav-item">
          <a href="index.php?ctl=paginaPeople" class="nav-link g--color-ff74fc g--hover-black-text"><?=$lang["menuInicio"]["gente"]?></a>
        </li>
        <li class="nav-item">
          <a href="index.php?ctl=paginaAnimales" class="nav-link g--color-ff74fc g--hover-black-text"><?=$lang["menuInicio"]["animales"]?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle g--color-ff74fc g--hover-black-text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?=$lang["menuInicio"]["comunidad"]?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item g--font-size-20" href="index.php?ctl=communityPage"><?=$lang["menuInicio"]["comunidad"]?></a></li>
            <!-- <hr> -->
            <li><a class="dropdown-item g--font-size-20" href="index.php?ctl=paginaFaq">FAQs</a></li>
            <!-- <hr> -->
            <!-- <li><a class="dropdown-item g--font-size-20" href="#">Blog</a></li> -->
          </ul>
        </li>
      </ul>
      <div class="d-flex">
        <i data-bs-toggle="modal" data-bs-target="#exampleModals" class="fa-solid fa-robot me-2 g--font-size-30"></i>
        <div data-bs-toggle="modal" data-bs-target="#exampleModals" class="text-uppercase bg-white g--border-black px-4 g--hover-btn-pink"><?=$lang["menuInicio"]["iniciarSesion"]?></div>
        
        <a class="nav-link d-flex mt-1" 
          <?php $host= $_SERVER["HTTP_HOST"];
          $url= $_SERVER["REQUEST_URI"];
          ?>
          href="<?php echo "http://" . $host . $url; ?>&lang=<?php echo $sessionLang=="es" ? "en" : "es";?>">
          <img src="assets/img/<?php 
          
          echo $sessionLang=="es" ? "en" : "es";?>.svg" width="50" height="30">
        </a>
      </div>
    </div>
  </div>
</nav>








