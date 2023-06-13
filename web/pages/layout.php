<?php
include 'components/header.php'
?>

<body class="">	
  <header class="g--bg-img-nature">
    <?php
    
	  if (!isset($menu)){
	    $menu = 'components/menuInvitado.php';
    }
    include $menu;
    
    
    //var_dump($menu);
    ?>
  </header>


  <!-- /***** -->


<!-- Modal -->
<?php include 'components/modal.php' ?>
<!-- ***** -->
  
<main id="main" class="g--max-width-1440 mx-auto">
  <!-- <div class="container-fluid my-4 px-md-5 px-2"> -->
  <div class="container-fluid my-0 px-0">
    <div id="contenido">
      <?php echo $contenido ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </div>
  </div>
</main>











<footer class="bg-black">
  <?php
  include 'components/footer.php'
  ?>
</footer>






 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<!-- <a href="#" class="btn-flotante"><i class="fa-sharp fa-solid fa-hand-point-up"></i></a> -->
</body>
</html>