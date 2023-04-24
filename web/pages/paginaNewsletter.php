<?php ob_start()?>
	
<div class="container-fluid ">

    <!-- inicio -->

    <div class="col-12 col-md-10  mx-auto">
      <div class="g--bg-newsletter d-flex align-items-center justify-content-center my-5" style="height:130px;"><h1 class="text-center text-white "><b>Newsletter</b></h1></div>
      <div class="bg-danger d-inline-block mt-3 px-3 py-2 mb-4 g--border-black g--hover-bg-black"><a class="text-decoration-none text-white"href="index.php?ctl=formNewsletter">Create Newsletter</a></div>
    </div>



    <table class="col-12 col-md-10 g--font-size-24 mx-auto">
      <tr class="g--border-bottom-grey">
        <th><h2><b>List of Newsletters</b></h2></th>		
      </tr>
	
	    <?php foreach ($params['noticias'] as $noticias) :?>
      <tr class="g--bg-lightskyblue d-flex justify-content-between align-items-center px-3 g--border-bottom-grey g--height-50">
        <td>
          <?php echo $noticias['dateSend']; ?>
          &nbsp&nbsp&nbsp
        <?php echo $noticias['titulo']; ?></td>
          <td class="d-flex g--font-size-18">
          <a href="index.php?ctl=verNewsletter&idTitulo=<?php echo $noticias['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-eye"></i>
            View
          </a>
          <a href="index.php?ctl=paginaNewsletter" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-pen-to-square"></i>
            Edit
          </a>
          <a href="index.php?ctl=enviarNewsletter&idTitulo=<?php echo $noticias['titulo']?>" class="nav-link link-dark me-3 g--hover-white-text">
          <i class="fa-solid fa-paper-plane"></i>
            Send
          </a>
          <a href="index.php?ctl=borrarNewsletter&idTitulo=<?php echo $noticias['titulo']?>" class="nav-link link-dark g--hover-white-text">
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