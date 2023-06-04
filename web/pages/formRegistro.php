<?php 
ob_start();
$pageTittle="Register - The erutan";
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
?>
<script src="javascript/registro.js"></script>
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LeaS5YlAAAAABxl-4FbV0ts7F_sj8wK4DxcOEGX"></script> -->

  <div class="container-fluid g--bg-img-form g-width-55x px-md-5 my-4">
    <form action="index.php?ctl=registro" method="post" id="formRegistro">
      <fieldset>
      <legend class="text-center g--font-size-55 mb-2 mb-md-4">Sign up in <strong>The erutan</strong></legend>
      <div class="container">


          <div class="row d-flex justify-content-center mb-0 mb-md-1">
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="nombreCompleto" class="fw-bold g--font-size-20">Nombre completo</label>
                <input type="text" name="nombreCompleto" id="nombreCompleto" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="usuario" class="fw-bold g--font-size-20">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
          </div>
          <div class="row d-flex justify-content-center mb-0 mb-md-1">
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="email" class="fw-bold g--font-size-20">Email</label>
                <input type="email" name="email" id="email" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="telefono" class="fw-bold g--font-size-20">Telefono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
          </div>
          <div class="row d-flex justify-content-center mb-0 mb-md-1">
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="pais" class="fw-bold g--font-size-20">Pais</label>
                <input type="text" name="pais" id="pais" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="ciudad" class="fw-bold g--font-size-20">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
          </div>
          <div class="row d-flex justify-content-center mb-0 mb-md-1">
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="contrasenya" class="fw-bold g--font-size-20">Contraseña</label>
                <input type="password" name="contrasenya" id="contrasenya" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
              <div class="col-12 col-md-6 d-flex flex-column mb-3">
                <label for="contrasenyaConfirmar" class="fw-bold g--font-size-20">Confirma contraseña</label>
                <input type="password" name="contrasenyaConfirmar" id="contrasenyaConfirmar" placeholder="Name" required class="g--height-5vh g--font-size-18">
              </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12 mx-auto d-flex flex-column my-2 my-md-4">
              <input type="submit" name="bRegistro" id="bRegistro" value="Registrarme" class="g--height-5vh">
            </div>
            <!-- <button type="submit" class="g-recaptcha col-12 col-md-12 mx-auto d-flex flex-column my-2 my-md-4"

                data-sitekey="6LeaS5YlAAAAABxl-4FbV0ts7F_sj8wK4DxcOEGX"
                name="bRegistro"
                data-action='submit'>Submit
            </button> -->
          </div>
        
      </div>
      </fieldset>
    </form>
  </div>

  <!-- <script>
    grecaptcha.ready( function (){
        document.getElementById('formRegistro').addEventListener("submit", function(event){
            event.preventDefault();
            grecaptcha.execute(
                "6LeaS5YlAAAAABxl-4FbV0ts7F_sj8wK4DxcOEGX",
                { action: "FormRegistro" }
            ).then( function ( tokenRegistroResponse ){
                validateContactForm(tokenRegistroResponse);
            });
        }, false);
    });
  </script>


<script src="<?php __DIR__ ?>'/../web/assets/js/forms.js"></script> -->

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php'?>