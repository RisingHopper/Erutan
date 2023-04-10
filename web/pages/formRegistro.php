<?php ob_start() ?>
<script src="javascript/registro.js"></script>
<form ACTION="index.php?ctl=registro" METHOD="post" >
    <div class="containerRegister">
      <h1>Sign Up</h1>


    <div class="row">
      <div class="col" id ="divname">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Introduce your name" name="name">
      </div>

      <div class="col"  id="Nempresa" style="display: none">
        <label for="name" class="form-label">Company name:</label>
        <input type="text" class="form-control" id="nameempresa" placeholder="Introduce your company" name="nameE">
      </div>
      <div class="col" id ="divsurname">
        <label for="surname" class="form-label">Surname:</label>
        <input type="text" class="form-control" id="surname" placeholder="Introduce your surname" name="surname">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="nameuser" class="form-label">Username:</label>
        <input type="text" class="form-control" id="nameuser" placeholder="Introduce your username" name="username" required>
        <div class="valid-feedback">
          ¡Campo correcto!
    </div>
      </div>
      <div class="col">
        <label for="direction" class="form-label">Address:</label>
        <input type="text" class="form-control" id="direction" placeholder="Introduce your address" name="address">
        <div class="invalid-feedback">
        Pon un correo valido
      </div>
      </div>
      <div class="row">
      <div class="col">
        <label for="nameuser" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Introduce your email" name="email" required>
      </div>
      <div class="col">
        <label for="details" class="form-label">Location:</label>
        <input type="text" class="form-control" id="localidad" placeholder="Introduce your location" name="location">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password1" placeholder="Introduce your password" name="password" required>
        <div class="invalid-feedback">
        No cumple con los requisitos.
    </div>
      </div>
      <div class="col">
        <label for="cp" class="form-label">Postal Code:</label>
        <input type="text" maxlength="5"  class="form-control" id="cp" placeholder="Introduce postal code" name="PCode">
      </div>
    </div>
    
    <div class="row">
      <div class="col">
        <label for="password" class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" id="password2" placeholder="Repeat your password" name="password2">
        <div class="invalid-feedback">
        No coincide con la contraseña.
    </div>

        <label for="empresa">Are you a company?</label>
        Yes, I am <input type="checkbox"  id="empresa" name="empresa">
      </div>
      <div class="col">
        <label for="number" class="form-label">Phone number:</label>
        <input type="text" class="form-control" id="number" placeholder="Introduce your phone" name="PNumber">
      <div id="divdate">
        <label for="date" class="form-label">Date of birth:</label>
        <input type="date" class="form-control" id="date" name="DBirth">
      </div>
        <button type="submit" name="bRegistro" onclick="confirmar();" class="btn btn-primary">Sign up</button>
      
      </div>
    </div>
    </div>
  </form>
  <?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>