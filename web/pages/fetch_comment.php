<?php

//fetch_comment.php

session_start(); // Se inicia la sesion
//Este logueado o no el usuario, siempre tendra un nivel_usuario



$connect = new PDO('mysql:host=localhost;dbname=erutan', 'root', '');

$query = "
SELECT * FROM comentarios_foro
WHERE idComentarioPadre = '0' 
ORDER BY idComentario DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{

    $idUser=$row["idUsuario"];
    $consulta = "select * from usuarios where idUser=$idUser";
    // $statement->bindParam(':idUser', $row['idUsuario']);
    $statement = $connect->prepare($consulta);
    $statement->execute();
    $resultado= $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r ($resultado[0]['nombreUsuario']);

 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading g--font-size-18">
  <img src='.$resultado[0]["fotoPerfil"].' width="40" height="40" class="g--border-black g--cover">
  By  <span class="fw-semibold text-primary">@'.$resultado[0]["nombreUsuario"].'</span> on <i>'.$row["datesend"].'</i></div>
  <div class="panel-body bg-light p-3 mt-2 ms-2 g--font-size-18">'.$row["comentario"].'</div>
  <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply text-primary" id="'.$row["idComentario"].'">Reply</button></div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["idComentario"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM comentarios_foro WHERE idComentarioPadre = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
    $idUser=$row["idUsuario"];
    $consulta = "select * from usuarios where idUser=$idUser";
    // $statement->bindParam(':idUser', $row['idUsuario']);
    $statement = $connect->prepare($consulta);
    $statement->execute();
    $resultado= $statement->fetchAll(PDO::FETCH_ASSOC);


   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">
    <img src='.$resultado[0]["fotoPerfil"].' alt="" width="33" height="33" class="g--border-black g--cover">
    By <span class="fw-semibold text-primary">@'.$resultado[0]["nombreUsuario"].'</span> on <i>'.$row["datesend"].'</i></div>
    <div class="panel-body bg-light p-3 mt-2 ms-2">'.$row["comentario"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply text-primary" id="'.$row["idComentario"].'">Reply</button></div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["idComentario"], $marginleft);
  }
 }
 return $output;
}

?>