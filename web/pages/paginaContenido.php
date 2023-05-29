<?php
ob_start();
$pageTittle="Content";
?>
	
<div class="container-fluid ">

    <!-- inicio -->

    <div class="col-10  mx-auto">
      <div class="g--bg-content d-flex align-items-center justify-content-center my-5" style="height:130px;"><h1 class="text-center text-white "><b>Content</b></h1></div>
      <div class="bg-danger d-inline-block mt-3 px-3 py-2 mb-4 g--border-black g--hover-bg-black"><a class="text-decoration-none text-white"href="index.php?ctl=formPost">Create a new post</a></div>
    </div>



    <table class="col-10 g--font-size-24 mx-auto">
      <tr class="g--border-bottom-grey">
        <th><h2><b>List of Posts</b></h2></th>		
      </tr>
	
	    <?php foreach ($params['posts'] as $posts) :?>
      <tr class="g--bg-lightskyblue d-flex justify-content-between align-items-center px-3 g--border-bottom-grey g--height-50">
        <td>
          <?php echo $posts['dateSend']; ?>
          &nbsp&nbsp&nbsp
          <?php echo $posts['titulo']; ?>
          &nbsp&nbsp&nbsp
          <?php echo $posts['categoria']; ?></td>
          <td class="d-flex g--font-size-18">
          <a href="index.php?ctl=verPublicacion&idTitulo=<?php echo $posts['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-eye"></i>
            View
          </a>
          <a href="index.php?ctl=editarPublicacion&idTitulo=<?php echo $posts['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-pen-to-square"></i>
            Edit
          </a>
          <!-- <a href="index.php?ctl=enviarNewsletter&idTitulo=<?php echo $posts['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-paper-plane"></i>
            Send
          </a> -->
          <a href="index.php?ctl=borrarPublicacion&idTitulo=<?php echo $posts['titulo']; ?>" class="nav-link link-dark g--hover-white-text">
          <i class="fa-solid fa-trash"></i>
            Delete
          </a>
          </td>
      </tr>

      <?php endforeach; ?>
    </table>


    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>