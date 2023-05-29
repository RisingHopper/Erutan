<?php
ob_start();
$pageTittle="Edit Post";
?>
	
<div class="container-fluid ">

    <!-- inicio -->



    <div class="row">
	    <div class="col-7 mx-auto text-center mt-5 mb-4"><h1>Post Generator</h1></div>
          
        <div class="col-6 mx-auto">
            <form class="" style="width:550px" action="index.php?ctl=actualizarPost" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Tittle</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $params['post']['titulo']?>">
                    <p style="font-size:12px;" class="text-danger">*Remind that this tittle will be used only as reference for the article.</p>
                </div>
                <div class="mb-3">
                    <label for="tituloPost" class="form-label">Content Tittle</label>
                    <input type="text" class="form-control" id="tituloPost" name="tituloPost" value="<?php echo $params['post']['tituloPost']?>">
                </div>
                <div class="mb-3">
                    <label for="tituloPost" class="form-label">Text for the carrousel</label>
                    <input type="text" maxlength="69"  class="form-control" name="contenidoCarrusel" value="<?php echo $params['post']['contenidoCarrusel']?>">
                    <p style="font-size:12px;" class="text-danger">*Only 69 characters</p>
                </div>
                <div class="mb-3">
                    <label for="contenidoCard" class="form-label" >Content for cards</label>
                    <input type="text" class="form-control" id="contenidoCard" name="contenidoCard" value="<?php echo $params['post']['textoCard']?>">
                    <p style="font-size:12px;" class="text-danger">*The text should be short</p>
                </div>
                <div class="mb-3">
                    <label for="contenidoPost" class="form-label">Content</label>
                    <textarea class="form-control" id="contenidoPost" name="contenidoPost" rows="5"><?php echo $params['post']['contenido']?></textarea>
                </div>
                <div class="mb-3"> Choose a category<br>
                    <input class="ms-1" type="radio" id="animalesPost" name="categoria" value="animales" <?php if ($params['post']['categoria'] =='animales'){echo 'checked';}?>>
                    <label for="animalesPost">Animals</label><br>
                    <input class="ms-1" type="radio" id="peoplePost" name="categoria" value="people" <?php if ($params['post']['categoria'] =='people'){echo 'checked';}?>>
                    <label for="peoplePost">People
                </div>
                
                <button type="submit" class="btn btn-dark" name="bSubir">Submit Newsletter</button>
            </form>


            <form class="my-5" style="width:550px" action="index.php?ctl=actualizarImgPost" method="POST" enctype="multipart/form-data">
                <div class="mb-3 d-none">
                    <label for="titulo" class="form-label">Tittle</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $params['post']['titulo']?>">
                    <!-- <p style="font-size:12px;" class="text-danger">*Remind that this tittle will be used only as reference for the article.</p> -->
                </div>
                <div class="mb-3">
                    <h3>Do you want to change the picture?</h3>
                    <label for="multimediaPost" class="form-label">Multimedia</label>
                    <input class="form-control" type="file" id="multimediaPost" name="multimediaPost">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div>
                <button type="submit" class="btn btn-dark" name="bSubir">Update Image</button>
            <form>
        </div>
    </div>
    




    <!-- fin -->

</div>


<script>
    ClassicEditor
        .create( document.querySelector( '#contenidoPost' ) )
        .catch( error => {
        console.error( error );
        } );
</script>
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>