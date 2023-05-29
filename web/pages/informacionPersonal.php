<?php
ob_start();
$pageTittle="My page"; 
?>


<style>


.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
	
<div class="container-fluid px-0">

    <!-- inicio -->







    <div class="container rounded mt-5 mb-5">
    <div class="row">
        
        <form class="" action="index.php?ctl=actualizarUsuario" method="POST" enctype="multipart/form-data">
        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black border-bottom-0">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img style="object-fit:cover;"class="rounded-circle mt-5" width="150px" height="150px" src="<?php echo $params['user']['fotoPerfil']?>"><span class="fw-semibold g--font-size-30"><?php echo $params['user']['nombreUsuario']?></span><span class="text-black-50 g--font-size-22"><?php echo $params['user']['email']?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black border-top-0">
            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right fw-bold text-uppercase">Profile Settings</h3>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels g--font-size-16">Full name</label>
                        <input name="nombreCompleto" type="text" class="form-control" value="<?php echo $params['user']['nombreCompleto']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="labels g--font-size-16">Mobile Number</label>
                        <input name="phone"type="text" class="form-control" value="<?php echo $params['user']['telefono']?>">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="labels g--font-size-16">Username</label>
                        <input name="username"type="text" class="form-control" value="<?php echo $params['user']['nombreUsuario']?>">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="labels g--font-size-16">Change email</label>
                        <input name="email" type="text" class="form-control" value="<?php echo $params['user']['email']?>">
                    </div>
                    
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels g--font-size-16">Country</label>
                        <input name="pais" type="text" class="form-control" value="<?php echo $params['user']['pais']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels g--font-size-16">City</label>
                        <input name="ciudad" type="text" class="form-control" value="<?php echo $params['user']['ciudad']?>">
                    </div>
                </div>
                <!-- <div class="row mt-3">
                    <label for="multimediaPost" class="form-label g--font-size-16">Multimedia</label>
                    <input class="form-control" type="file" id="multimediaPost" name="fotoPerfil">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div> -->
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="bSubir">Save Profile</button>
                </div>
            </div>
        </div>
        </form>


        <form class="mt-4" action="index.php?ctl=actualizarPasswordUsuario" method="POST" enctype="multipart/form-data">

        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black">
            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right fw-bold text-uppercase">Change password</h3>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="labels g--font-size-16">Change Password</label>
                    <input name="newPassword" type="password" class="form-control" value="password">
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="bSubir">Save Password</button>
                </div>
            </div>
        </div>
        </form>


        <form class="mt-4" action="index.php?ctl=actualizarImgUsuario" method="POST" enctype="multipart/form-data">

        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black">
            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right fw-bold text-uppercase">Change my Profile Picture</h3>
                </div>
                <div class="row mt-3">
                    <label for="multimediaPost" class="form-label g--font-size-16">Profile Picture</label>
                    <input class="form-control" type="file" id="multimediaPost" name="fotoPerfil">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="bSubir">Save Profile Picture</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>



    <!-- <div class="row">
	    <div class="col-7 mx-auto text-center mt-5 mb-4"><h1>My personal information</h1></div>
          
        <div class="col-6 mx-auto">
            <form class="" style="width:550px" action="index.php?ctl=crearPost" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Tittle</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Write the tittle that will be used as a reference">
                    <p style="font-size:12px;" class="text-danger">*Remind that this tittle will be used only as reference for the article.</p>
                </div>
                <div class="mb-3">
                    <label for="tituloPost" class="form-label">Content Tittle</label>
                    <input type="text" class="form-control" id="tituloPost" name="tituloPost" value="<?php echo $params['user']['nombreUsuario']?>">
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
    </div> -->

    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
