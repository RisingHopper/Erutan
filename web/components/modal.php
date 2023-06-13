<!-- Modal -->
<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      
      <div class="modal-body text-center">
          <form action="index.php?ctl=iniciarSesion" method="post" class="form-signin">
          <img class="mb-4 mt-4 g--width-180" src="assets/img/logo.png" alt="logo" >
          <h1 class="h3 mb-3 font-weight-normal"><?=$lang["modal"]["please"]?></h1>
          <input type="text" name="usuario"id="usuario" class="form-control mb-3 mx-auto g--max-width-300" placeholder="<?=$lang["modal"]["usuario"]?>" required autofocus>
          <input type="password" name="contrasenya"id="contrasenya" class="form-control mx-auto g--max-width-300 mb-4" placeholder="<?=$lang["modal"]["password"]?>" required>
          <button class="g--btn-erutan mb-5" type="submit" name="bIniciarSesion"><?=$lang["modal"]["btn"]?></button>
          <p><?=$lang["modal"]["noCuenta"]?><a href="index.php?ctl=paginaRegistro"><?=$lang["modal"]["aqui"]?></a></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$lang["modal"]["close"]?></button>
      </div>
    </div>
  </div>
</div>