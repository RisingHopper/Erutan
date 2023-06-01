<?php
ob_start();
$pageTittle="Ranking - The erutan";
include "components/marquee.php";
?>
	
<div class="container-fluid ">

    <!-- inicio -->





        <div class="row">
        <div class="col-10 mx-auto text-center"><h2>Ranking</h2></div>
        <div class="row d-flex justify-content-center bg-success">
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
            
            
                <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $resultado[0]["fotoPerfil"] ?>" class="" width="250px" height="250px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $resultado[0]["nombreUsuario"] ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                </div>
          



        <?php endforeach; ?>
        </div>
      </div>
    </div>





    <!-- fin -->

</div>



	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>