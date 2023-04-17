<?php ob_start() ?>


<form method="POST" action="index.php">
  <div class="containerRegister my-5">
    <div class="row">
      <div class="col-12 text-center"><h1>Personal Information<h1></div>
      <div class="col-12">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" value="Mi nombre" name="name">
      </div>
      <div class="col-12">
        <label for="name2" class="form-label">Surname:</label>
        <input type="text" class="form-control" id="name2" value="Mi apellido" name="name2">
      </div>
      <div class="col-12">
        <label for="nameuser" class="form-label">Username:</label>
        <input type="text" class="form-control" id="nameuser" value="Mi usuario" name="username">
      </div>
      <div class="col-12">
        <label for="direction" class="form-label">Direction:</label>
        <input type="text" class="form-control" id="direction" value="Mi direccion" name="direction">
      <div class="invalid-feedback">
        Pon un correo valido
      </div>
      <div class="col-12">
        <label for="nameuser" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" value="Introduce tu correo electronico" name="email">
      </div>
      <div class="col-12">
        <label for="number" class="form-label" value="Mi telefono">Phone number:</label>
        <input type="text" class="form-control" id="number" placeholder="Introduce tu número de telefono" name="number">
      </div>
      <div class="mt-3 form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
        Remove my account
        </label>
      </div>
      <div class="col-12 mt-4">
        <input type="submit" value="Save changes" clas="btn btn-primary"name="cambiar">
      </div>
      </div>
    </div>
  </div>


  <form method="POST" action="index.php">
  <div class="containerRegister my-5">
  <div class="row">
  <div class="col-12 text-center"><h1>Personalizacion<h1></div>
      <div class="col-12">
        <label for="number" class="form-label" value="Mi telefono">Change Menu Color:</label>
        <input type="color" name="color">
      </div>
      
  
  
      <div class="col-12 mt-4">
        <input type="submit" value="Save changes" clas="btn btn-primary"name="cambiar">
      </div>
    </div>
  </div>
</form>




	

<!--<div class="container">
	<div class="row bg-primary">
		<div class="col-12 text-center"><h1>Mi perfil<h1></div>
		<div class="col-6">Mi nombre</div>
		<div class="col-6">Joel</div>
		<div class="col-6">Mi apellido</div>
		<div class="col-6">Joel</div>
		<div class="col-6">Mi nombre de Usuario</div>
		<div class="col-6">JoelYYY</div>
		<div class="col-6"></div>
		<p>Poner informacion personal<p>
		<form method="POST" action="index.php">
        <input type="color" name="color">
        <!--<select name="color">
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
        </select>--><!--
        <input type="submit" value="cambiar" name="cambiar">
    	</form>
	</div>
	
</div>-->
		
	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>