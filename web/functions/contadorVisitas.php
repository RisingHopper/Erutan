<?php
        public function insertaVisitas(){
        $consulta="INSERT INTO visitas (contador) VALUES (contador+1)";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result;
        }



    $consulta="UPDATE contador SET contador=contador+1";
    $result = $this->conexion->prepare($consulta);
    $result->execute();


    public function consultaVisitas(){
    $consulta="SELECT contador FROM visitas";
    $result = $this->conexion->prepare($consulta);
    $result->execute();
    $ttt= $result->fetchAll(PDO::FETCH_ASSOC);
    }


    echo $ttt[0]['contador'];


