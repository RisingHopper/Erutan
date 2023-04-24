<?php ob_start()?>
	
<div class="container-fluid ">

    <!-- inicio -->

	<div class="row">
	    <div class="col-7 mx-auto text-center mt-5 mb-4"><h1>Post Generator</h1></div>
          
        <div class="col-6 mx-auto">
            <form class="" style="width:550px" action="index.php?ctl=crearPost" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Tittle</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Write the tittle that will be used as a reference">
                    <p style="font-size:12px;" class="text-danger">*Remind that this tittle will be used only as reference for the article.</p>
                </div>
                <div class="mb-3">
                    <label for="tituloPost" class="form-label">Content Tittle</label>
                    <input type="text" class="form-control" id="tituloPost" name="tituloPost" placeholder="Write the tittle for the post">
                </div>
                <div class="mb-3">
                    <label for="contenidoCard" class="form-label" >Content for cards</label>
                    <input type="text" class="form-control" id="contenidoCard" name="contenidoCard" placeholder="Write the content for the card">
                    <p style="font-size:12px;" class="text-danger">*The text should be short</p>
                </div>
                <div class="mb-3">
                    <label for="contenidoPost" class="form-label">Content</label>
                    <textarea class="form-control" id="contenidoPost" name="contenidoPost" rows="5" placeholder="Write the whole content for the post"></textarea>
                </div>
                <div class="mb-3">
                    <label for="multimediaPost" class="form-label">Multimedia</label>
                    <input class="form-control" type="file" id="multimediaPost" name="multimediaPost">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div>
                <div class="mb-3"> Choose a category<br>
                    <input class="ms-1" type="radio" id="animalesPost" name="categoria" value="animales">
                    <label for="animalesPost">Animals</label><br>
                    <input class="ms-1" type="radio" id="peoplePost" name="categoria" value="people">
                    <label for="peoplePost">People
                </div>
                
                <button type="submit" class="btn btn-dark" name="bSubir">Submit Newsletter</button>
            </form>
        </div>
    </div>

    <!-- fin -->

</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>