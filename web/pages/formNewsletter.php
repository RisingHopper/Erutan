<?php
ob_start();
$pageTittle="Create a newsletter";
?>
	
<div class="container-fluid ">

    <!-- inicio -->

	<div class="row">
	    <div class="col-7 mx-auto text-center mt-5 mb-4"><h1>Newsletter Generator</h1></div>
          
        <div class="col-6 mx-auto">
            <form class="" style="width:550px" action="index.php?ctl=crearNewsletter" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tituloN" class="form-label" >Newsletter Tittle</label>
                    <input type="text" class="form-control" id="tituloN" name="titulo" placeholder="Write the tittle for the Newsletter">
                    <p style="font-size:12px;" class="text-danger">*This tittle will not be send to the user. Use this tittle as reference for the newsletter that will be created.</p>
                </div>
                <div class="mb-3">
                    <label for="asuntoN" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="asuntoN" name="asunto" placeholder="Write the subject for the Newsletter">
                </div>
                <div class="mb-3">
                    <label for="mensajeN" class="form-label">Message</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="9" placeholder="Write the message"></textarea>
                </div>
                <div class="mb-3">
                    <label for="multimediaN" class="form-label">Multimedia</label>
                    <input class="form-control" type="file" id="multimediaN" name="multimedia">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div>
                <button type="submit" class="btn btn-dark" name="bSubir">Submit Newsletter</button>
            </form>
        </div>
    </div>

    <!-- fin -->

</div>


<script>
    ClassicEditor
        .create( document.querySelector( '#mensaje' ) )
        .catch( error => {
        console.error( error );
        } );
</script>
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>