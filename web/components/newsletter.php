<!-- <div class="col-md-12 bg-black d-flex flex-wrap text-white border border-dark">
  <div class="col-4 g--bg-img-newsletter"></div>
  <div class="col-8">
    <form class="">
      <h2 class="text-center mt-5 mb-3 fw-bold">Subscribe to our newsletter</h2>
      <p class="px-5 g--font-size-20">Join our subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p>
      <input id="newsletter1" type="text" class="form-control col-4" placeholder="Email address">
      <button class="btn btn-primary" type="button">Subscribe</button>
      </div>
    </form>
  </div>
</div> -->




<div class="col-md-12 bg-black d-flex flex-wrap text-white g--border-inset">
  <div class="d-none d-md-block col-4 g--bg-img-newsletter"></div>
  <div class="col-12 col-md-8">
    <h2 class="text-center mt-3 mb-3 fw-bold"><?=$lang["newsletter"]["title"]?></h2>
    <p class="px-2 px-md-5 g--font-size-20"><?=$lang["newsletter"]["texto"]?></p>

    <form class="px-2 px-md-5 mb-3" action="index.php?ctl=subscribir" method="POST">
      <div class="mb-3">
        <input type="text" class="g--height-40 me-2 mb-1 mb-md-0" name="nombre" placeholder=<?=$lang["newsletter"]["name"]?>>
        <input type="email" class="g--height-40 me-2 mb-1" name="email" placeholder=<?=$lang["newsletter"]["email"]?>>
        <input type="phone" class="g--height-40" name="phone" placeholder=<?=$lang["newsletter"]["tlf"]?>>
      </div>
      <button type="submit" class="g--height-40 px-5" name="bSubir"><?=$lang["newsletter"]["btn"]?></button>
    </form>

  </div>
</div>



