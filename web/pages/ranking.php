<?php
ob_start();
$pageTittle="Ranking - The erutan";
include "components/marquee.php";
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
$jugadorId=1;



?>
	
<div class="container-fluid mb-3">

    <!-- inicio -->





        <div class="row justify-content-center">
        <div class="col-12 mx-auto text-center text-uppercase mt-4 mb-5 mb-3"><h2 class="fw-bold"><?=$lang["publicaciones"]["ranking"]?></h2></div>


        
        <?php foreach ($params['newsletter'] as $posts) :?>


            <?php
            $connect = new PDO('mysql:host=localhost;dbname=erutan', 'root', '');
            $idUser=$posts["idUsuario"];
            $consulta = "select * from usuarios where idUser=$idUser";
            $statement = $connect->prepare($consulta);
            $statement->execute();
            $resultado= $statement->fetchAll(PDO::FETCH_ASSOC);
            // print_r($resultado);

            ?>  
                <div class="row justify-content-center mb-4">
                <div class="card mx-auto" style="width: 500px;">
                    <div class="row no-gutters">
                        <div class="d-none d-md-block col-sm-5 px-0" style="height:150px;">
                            <img class="card-img p-2 w-100 h-100 g--cover" src="<?php echo $resultado[0]["fotoPerfil"] ?>">
                        </div>
                        <div class="d-block d-md-none col-sm-5 px-0" style="height:250px;">
                            <img class="card-img p-2 w-100 h-100 g--cover" src="<?php echo $resultado[0]["fotoPerfil"] ?>">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase fw-bold g--font-size-24"><?php echo $resultado[0]["nombreUsuario"] ?></h5>
                                <p class="card-text g--font-size-20"><?=$lang["publicaciones"]["total"]?> <?php echo $posts['SUM(respuestasAcertadas)'] ?> <?=$lang["publicaciones"]["points"]?></p>
                                <img style="width:80px; left:-40px; top:-40px; transform: rotate(30deg);" class="position-absolute" src="assets/img/<?php echo $jugadorId."place.webp" ?>">
                                <a href="#" class="btn btn-primary fw-bold"><?php echo $jugadorId .' '.$lang["publicaciones"]["posicion"]?></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <?php $jugadorId=$jugadorId+1; ?>
            
          



            <?php endforeach; ?>
            </div>
     
    </div>





    <!-- fin -->


        








</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>