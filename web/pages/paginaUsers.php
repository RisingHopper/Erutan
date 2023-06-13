<?php
ob_start();
$pageTittle="User registered";
?>
	
<div class="container-fluid ">

    <!-- inicio -->

    <div class="col-10  mx-auto">
      <div class="g--bg-users d-flex align-items-center justify-content-center my-5" style="height:130px;"><h1 class="text-center text-white "><b>Users manegement</b></h1></div>
    </div>






      <table id="tabla" class="col-12 col-md-10 g--font-size-24 mx-auto">
      <tr>
        <h2 style="margin-left:92px;"><b>List of users accounts</b></h2>		
      </tr>
      <tr class="g--border-bottom-grey g--height-50 bg-dark text-white">
        <th class="px-3">Picture</th>
        <th class="px-3">Username</th>
        <th class="px-3">Name</th>
        <th class="px-3">Delete User</th>
      </tr>
	
	    <?php foreach ($params['usuarios'] as $posts) :?>
      <tr class="g--bg-lightskyblue align-items-center px-3 g--border-bottom-grey g--height-100 g--font-size-20">
        <td class="px-3">
          <img src="<?php echo $posts['fotoPerfil']; ?>" alt="" style="width:80px; height:80px; object-fit:cover;">
          
        </td>
        <td class="px-3 text-uppercase">
          <?php echo $posts['nombreUsuario']; ?>
        </td>
        <td class="px-3 text-uppercase">
          <?php echo $posts['nombreCompleto']; ?>
        </td>
        <td class="px-3">
        <div class="bg-danger d-inline-block px-4 py-1 g--border-black g--hover-bg-black"><a class="text-decoration-none text-white"href="index.php?ctl=borrarUsuario&idUser=<?php echo $posts['idUser']; ?>">Delete</a></div>
        </td>
          
      </tr>

      <?php endforeach; ?>
    </table>



































    


    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>