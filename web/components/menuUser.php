<nav class="navbar navbar-expand-lg g--bg-img-nature g--height-80 g--border-bottom-white g--font-size-24 pe-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?ctl=inicio"><img class="g--width-180" src="assets/img/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse g--margin-left-330" id="navbarSupportedContent"> 
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active g--color-ff74fc g--hover-black-text" aria-current="page" href="index.php?ctl=inicio">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link g--color-ff74fc g--hover-black-text" href="index.php?ctl=posts">Posts</a>
        </li>
        <li class="nav-item">
          <a href="index.php?ctl=people" class="nav-link g--color-ff74fc g--hover-black-text">People</a>
        </li>
        <li class="nav-item">
          <a class="nav-link g--color-ff74fc g--hover-black-text">Animals</a>
        </li>
        <li class="nav-item">
          <a href="index.php?ctl=paginaForo" class="nav-link g--color-ff74fc g--hover-black-text">Foro</a>
        </li>
        <li class="nav-item">
          <a href="index.php?ctl=paginaRanking" class="nav-link g--color-ff74fc g--hover-black-text">Ranking</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle g--color-ff74fc g--hover-black-text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Community
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Vlog</a></li>
            <li><a class="dropdown-item" href="index.php?ctl=paginaFaq">FAQs</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex">
        <!-- <i class="fa-solid fa-user-secret me-2 g--font-size-30"></i> -->
        <img src="<?php echo $_SESSION['fotoPerfil']; ?>" alt="" style="width:38px; height:38px; object-fit: cover;" class="me-2 g--border-black">
        <li class="nav-item dropdown" style="list-style:none;">
          <a class="nav-link dropdown-toggle text-uppercase bg-white g--border-black px-4 g--hover-btn-pink" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My profile
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-uppercase bg-white px-4 g--hover-btn-pink" href="index.php?ctl=datosPersonales&idUser=<?php echo $_SESSION['idUser'];  ?>">My profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-uppercase bg-white px-4 g--hover-btn-pink" href="index.php?ctl=salir">Log out</a></li>
            
          </ul>
        </li>
        <!-- 
        <div data-bs-toggle="modal" data-bs-target="#exampleModals" class="text-uppercase bg-white g--border-black px-4 g--hover-btn-pink">My profile</div> -->
      </div>
    </div>
  </div>
</nav>

<!-- data-bs-toggle="modal" data-bs-target="#exampleModals" -->




<!-- 
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid position-fixed g--bg-img-nature g--height-80 mb-5 g--max-width-1440 mx-auto">
    <div class="">
        <div class="" >
            <a href="index.html"><img class="g--width-180"src="img/logo.png" id= "logo"></a>
        </div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
        <div class="nav__box">
                <div class="inicioSesion">
                    <i class="fa-solid fa-robot"></i>
                    <a href="form.html" class="inicioSesion">SIGN IN</a>
                </div>
        </div>
    </div>
  </div>
</nav> -->



<!-- <div class="container-fluid d-flex justify-content-between align-items-baseline position-fixed mb-5 g--navbar-img g--height-80">
            <div class="nav__box nav__box__logo">
                <div class="" >
                    <a href="index.html"><img class="g--width-180"src="img/logo.png" id= "logo"></a>
                </div>
            </div>
            <nav class="nav__box">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="people.html">People</a></li>
                    <li><a href="animal.html">Animals</a></li>
                    <li><a href="community.html">Community</a></li>
                </ul>
            </nav>
            <div class="nav__box">
                <div class="inicioSesion">
                    <i class="fa-solid fa-robot"></i>
                    <a href="form.html" class="inicioSesion">SIGN IN</a>
                </div>
            </div>

        </div> -->