<?php ob_start()?>
	
<div class="container-fluid ">

    <!-- inicio -->



    <table class="col-10 g--font-size-24 mx-auto">
      <tr class="g--border-bottom-grey">
        <th><h2><b>List of Posts</b></h2></th>		
      </tr>
	
	    <?php foreach ($params['posts'] as $posts) :?>
      <tr class="g--bg-lightskyblue d-flex justify-content-between align-items-center px-3 g--border-bottom-grey g--height-50">
        <td>
          <?php echo $posts['imagen']; ?>
          &nbsp&nbsp&nbsp
          <?php echo $posts['titulo']; ?>
          &nbsp&nbsp&nbsp
          <?php echo $posts['categoria']; ?></td>
          <td class="d-flex g--font-size-18">
          <a href="index.php?ctl=verNewsletter&idTitulo=<?php echo $posts['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-eye"></i>
            View
          </a>
          <a href="index.php?ctl=paginaNewsletter" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-pen-to-square"></i>
            Edit
          </a>
          <a href="index.php?ctl=enviarNewsletter&idTitulo=<?php echo $posts['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-paper-plane"></i>
            Send
          </a>
          <a href="index.php?ctl=borrarNewsletter&idTitulo=<?php echo $posts['titulo']?>" class="nav-link link-dark g--hover-white-text">
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
<?php include 'layout.php' ?>