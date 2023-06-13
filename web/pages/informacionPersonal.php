<?php
ob_start();
$pageTittle="My page - The erutan";
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
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
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img style="object-fit:cover;"class="rounded-circle mt-5" width="150px" height="150px" src="<?php echo $params['user']['fotoPerfil']?>"><span class="fw-semibold g--font-size-30 text-uppercase"><?php echo $params['user']['nombreUsuario']?></span><span class="text-black-50 g--font-size-22"><?php echo $params['user']['email']?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black border-top-0">
            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right fw-bold text-uppercase"><?=$lang["profile"]["perfil"]?></h3>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels g--font-size-16"><?=$lang["profile"]["nombre"]?></label>
                        <input name="nombreCompleto" type="text" class="form-control" value="<?php echo $params['user']['nombreCompleto']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="labels g--font-size-16"><?=$lang["profile"]["telefono"]?></label>
                        <input name="phone"type="text" class="form-control" value="<?php echo $params['user']['telefono']?>">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="labels g--font-size-16"><?=$lang["profile"]["username"]?></label>
                        <input name="username"type="text" class="form-control" value="<?php echo $params['user']['nombreUsuario']?>">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="labels g--font-size-16"><?=$lang["profile"]["email"]?></label>
                        <input name="email" type="text" class="form-control" value="<?php echo $params['user']['email']?>">
                    </div>
                    
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels g--font-size-16"><?=$lang["profile"]["pais"]?></label>
                        <input name="pais" type="text" class="form-control" value="<?php echo $params['user']['pais']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels g--font-size-16"><?=$lang["profile"]["ciudad"]?></label>
                        <input name="ciudad" type="text" class="form-control" value="<?php echo $params['user']['ciudad']?>">
                    </div>
                </div>
                <!-- <div class="row mt-3">
                    <label for="multimediaPost" class="form-label g--font-size-16">Multimedia</label>
                    <input class="form-control" type="file" id="multimediaPost" name="fotoPerfil">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div> -->
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="bSubir"><?=$lang["profile"]["save"]?></button>
                </div>
            </div>
        </div>
        </form>


        <form class="mt-4" action="index.php?ctl=actualizarPasswordUsuario" method="POST" enctype="multipart/form-data">

        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black">
            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right fw-bold text-uppercase"><?=$lang["profile"]["changePassword"]?></h3>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="labels g--font-size-16"><?=$lang["profile"]["changePassword"]?></label>
                    <input name="newPassword" type="password" class="form-control" value="password">
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="bSubir"><?=$lang["profile"]["savePassword"]?></button>
                </div>
            </div>
        </div>
        </form>


        <form class="mt-4" action="index.php?ctl=actualizarImgUsuario" method="POST" enctype="multipart/form-data">

        <div class="col-md-5 border-right mx-auto bg-white px-0 px-md-5 g--border-black">
            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right fw-bold text-uppercase"><?=$lang["profile"]["picture"]?></h3>
                </div>
                <div class="row mt-3">
                    <label for="multimediaPost" class="form-label g--font-size-16"><?=$lang["profile"]["profilePicture"]?></label>
                    <input class="form-control" type="file" id="multimediaPost" name="fotoPerfil">
                    <p style="font-size:12px;" class="text-danger">*We reccomend to use webp files because has few data.</p>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="bSubir"><?=$lang["profile"]["savePicture"]?></button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>

</div>

	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
