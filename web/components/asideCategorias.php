<div class="d-none d-md-block col-md-2 px-0 bg-dark" style="border-right:4px solid grey;">
        





    
        <ul class="nav nav-pills flex-column mb-auto px-2">

          <li class="mt-3 g--hover-bg-primary" id="li-paginaPosts">
            <a href="index.php?ctl=posts" class="g--font-size-26 nav-link text-white">
            <i class="fa-solid fa-reply-all g--font-size-22"></i>
              <?=$lang["menuInicio"]["allPosts"]?>
            </a>
          </li>
          <li class="g--hover-bg-primary" id="li-paginaAnimales">
            <a href="index.php?ctl=paginaAnimales" class="g--font-size-26 nav-link text-white">
            <i class="fa-solid fa-hippo g--font-size-22"></i>
              <?=$lang["menuInicio"]["animales"]?>
            </a>
          </li>
          <li id="li-paginaPeople" class="g--hover-bg-primary">
            <a href="index.php?ctl=paginaPeople" class="g--font-size-26 nav-link text-white">
            <i class="fa-solid fa-user-group g--font-size-20"></i>
              <?=$lang["menuInicio"]["gente"]?>
            </a>
          </li>
          <li id="li-paginaCiencia" class="g--hover-bg-primary">
            <a href="index.php?ctl=paginaCiencia" class=" g--font-size-26 nav-link text-white">
            <i class="fa-solid fa-flask g--font-size-22"></i>
              <?=$lang["menuInicio"]["ciencia"]?>
            </a>
          </li>
        </ul>






      </div>




<script>
  let ruta = window.location.toString();
  // alert(typeof ruta);
  if (ruta.includes("paginaAnimales")){
    document.getElementById("li-paginaAnimales").classList.add("bg-primary");
  }else if (ruta.includes("paginaPeople")){
    document.getElementById("li-paginaPeople").classList.add("bg-primary");
  }else if (ruta.includes("paginaCiencia")){
    document.getElementById("li-paginaCiencia").classList.add("bg-primary");
  }else if (ruta.includes("posts")){
    document.getElementById("li-paginaPosts").classList.add("bg-primary");
  }
</script>