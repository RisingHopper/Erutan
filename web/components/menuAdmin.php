<aside class=" col-3 g--font-size-22">

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 340px; height:100vh; top:0; ">
  <a class="navbar-brand mt-4" href="index.php?ctl=paginaDashboard"><img class="g--width-230" src="assets/img/logoWhite.png" alt="logo"></a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item" id="li-paginaDashboard">
        <a href="index.php?ctl=paginaDashboard" class="nav-link text-white g--hover-lightskyblue-text">
        <i class="fa-solid fa-chart-bar"></i>
          Dashboard
        </a>
      </li>
      <li id="li-paginaContenido">
        <a href="index.php?ctl=paginaContenido" class="nav-link text-white g--hover-lightskyblue-text">
        <i class="fa-solid fa-paintbrush"></i>
          Content
        </a>
      </li>
      <li id="li-paginaNewsletter">
        <a href="index.php?ctl=paginaNewsletter" class="nav-link text-white g--hover-lightskyblue-text">
        <i class="fa-regular fa-newspaper"></i>
          Newsletter
        </a>
      </li>
      <li id="li-paginaRegistradosNewsletter">
        <a href="index.php?ctl=paginaRegitradosNewsletter" class="nav-link text-white g--hover-lightskyblue-text">
        <i class="fa-solid fa-square-rss"></i>
          Newsletter subscribers
        </a>
      </li>
      <li id="li-paginaUsers">
        <a href="index.php?ctl=paginaUsers" class="nav-link text-white g--hover-lightskyblue-text">
        <i class="fa-solid fa-user"></i>
          Users management
        </a>
      </li>
    </ul>
    <hr>
    <div class="px-3">
      <a href="index.php?ctl=salir" class="nav-link text-white g--hover-lightskyblue-text">
      <i class="fa-solid fa-door-open"></i>
          Log out
        </a>
    </div>
  </div>

</aside>




<script>
  let ruta = window.location.toString();
  // alert(typeof ruta);
  if (ruta.includes("paginaDashboard")){
    // alert("yes");
    document.getElementById("li-paginaDashboard").classList.add("bg-primary");
    // document.getElementById("li-paginaDashboard").firsChild.classList.remove("g--hover-lightskyblue-text");
    // document.getElementById("li-paginaDashboard").classList.add("g--active");
  }
  else if (ruta.includes("paginaContenido")){
    document.getElementById("li-paginaContenido").classList.add("bg-primary");
  }else if (ruta.includes("paginaNewsletter")){
    document.getElementById("li-paginaNewsletter").classList.add("bg-primary");
  }else if (ruta.includes("paginaUsers")){
    document.getElementById("li-paginaUsers").classList.add("bg-primary");
  }else if (ruta.includes("paginaRegitradosNewsletter")){
    document.getElementById("li-paginaRegistradosNewsletter").classList.add("bg-primary");
  }
</script>