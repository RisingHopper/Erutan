<div class="container-fluid py-0 px-5 colorMenuHeader order-first">
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid px-0">
    <a href="index.php?ctl=inicio"><img src="pictures/logo-nuego-sveiki.jpg" id= "logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ms-5 letraMenu">
            <a class="nav-link active" aria-current="page" href="index.php?ctl=inicio">Home</a>
          </li>
          <li class="nav-item ms-5 letraMenu">
            <a class="nav-link " href="index.php?ctl=categoria">Categories</a>
          </li>
          <li class="nav-item ms-5 letraMenu">
            <a class="nav-link " href="index.php?ctl=restaurantes">Restaurants</a>
          </li>
          <li class="nav-item dropdown ms-5 letraMenu">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Community
            </a>
            <ul class="dropdown-menu order-first">
              <li><a class="dropdown-item" href="index.php?ctl=blog">Vlog</a></li>
              <li><a class="dropdown-item" href="index.php?ctl=preguntasFrecuentes">FAQs</a></li>
              <li><a class="dropdown-item" href="index.php?ctl=mapaSitio">Sitemap</a></li>
            </ul>
          </li>
          <li class="nav-item ms-5 mx-3 px-3 letraMenu" id="iniciarSesion__hover">
            <a class="nav-link " href="index.php?ctl=iniciarSesion">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>


<aside>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="administrador">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Administrator</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="index.php?ctl=listarNoticias" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          List of Newsletter
        </a>
      </li>
      <li>
        <a href="index.php?ctl=crearNoticiaForm" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Create Newsletter
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Maria</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="index.php?ctl=salir">Sign out</a></li>
      </ul>
    </div>
  </div>

</aside>

<!--<div class="sidenav">
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>-->
