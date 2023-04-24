<?php ob_start()?>
	
<div class="container-fluid text-center">

    <!-- inicio -->

	<div class="col-10  mx-auto">
      <div class="g--bg-dashboard d-flex align-items-center justify-content-center my-5" style="height:130px;"><h1 class="text-center text-white "><b>Dashboard</b></h1></div>
    </div>

    <div class="col-10 mx-auto">
        <div class="pt-4 col-12" id="chart"></div>
        <div class="pt-4 col-12" id="chart"></div>
    </div>



    <?php 
    // print_r( $datos[0]['dateSend']);echo "<br>";
    // print_r( $datos);
    // print_r($usersDashboard['COUNT(*)']);
    $fechas="";
    $visitas="";

    for ($i=0;$i<count($datos);$i++){
        $fechas .=($datos[$i]['dateSend']).",";
        $visitas .=($datos[$i]['SUM(contador)'].",");
    }

    //Cortar la última letra
    $fechas = substr($fechas, 0, -1);
    $visitas = substr($visitas, 0, -1);
    ?>
    <!-- Divs ocultos donde se imprime el texto de php, para luego usarlo en javascript con DOOM -->
    <div id="fechasArray" class="d-none"><?php echo $fechas; ?></div>
    <div id="visitasArray" class="d-none"><?php echo $visitas; ?></div>


    <script>

        let fechas=document.getElementById("fechasArray").innerText;
        let visitas=document.getElementById("visitasArray").innerText;
        let fechasArray=fechas.split(',');
        let visitasArray=visitas.split(',');
        // Apexchart
        var options = {
            series: [{
            data: visitasArray
        }],
            chart: {
            height: 500,
            type: 'line',
            zoom: {
            enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Number of visitors that the erutan website receives',
            align: 'left'
        },
        grid: {
            row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
            },
        },
        xaxis: {
            categories: fechasArray,
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
 
    </script>
    

    <!-- fin -->

</div>

<script src="assets/js/viewsGraphics.js"></script>
    

	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>