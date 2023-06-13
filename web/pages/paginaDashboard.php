<?php
ob_start();
$pageTittle="Dashboard"; ?>
	
<div class="container-fluid text-center">

    <!-- inicio -->

	<div class="col-10  mx-auto">
      <div class="g--bg-dashboard d-flex align-items-center justify-content-center mt-5 mb-4" style="height:130px;"><h1 class="text-center text-white "><b>Dashboard</b></h1></div>
    </div>


    <div class="col-10 mx-auto d-flex justify-content-between">
        <div class="col-4 pe-2">
            <div class="card text-white mb-3 g--border-bottom-darkgray">
            <div class="card-header g--font-size-40 py-0 bg-dark"><?php echo($visitasDashboard[0]['COUNT(*)']); ?></div>
            <div class="card-body">
                <h5 class="card-title g--font-size-26 text-black fw-semibold pt-2">Visits on the website</h5>
            </div>
            </div>
        </div>
        <div class="col-4 px-2">
            <div class="card text-white mb-3 g--border-bottom-darkgray">
            <div class="card-header g--font-size-40 py-0 bg-dark"><?php echo($usersDashboard[0]['COUNT(*)'])-1; ?></div>
            <div class="card-body">
                <h5 class="card-title g--font-size-26 text-black fw-semibold pt-2">Users accounts</h5>
            </div>
            </div>
        </div>
        
        <div class="col-4 ps-2">
        <div class="card text-white mb-3 g--border-bottom-darkgray">
            <div class="card-header g--font-size-40 py-0 bg-dark"><?php echo($postsDashboard[0]['COUNT(*)']); ?></div>
            <div class="card-body">
                <h5 class="card-title g--font-size-26 text-black fw-semibold pt-2">Posts created</h5>
            </div>
            </div>
        </div>
    </div>
    <div class="col-10 mx-auto mt-4">
        <h3 class="fw-semibold"><u>Number of visitors that the erutan website receives</u></h3>
        <div class="pt-4 col-12" id="chart"></div>
    </div>
    <div class="col-10 mx-auto mt-5 d-flex justify-content-between">
        <div class="col-8">
            <h3 class="fw-semibold"><u>Number of registered users on the website</u></h3>
            <div class="pt-4 col-12" id="chartt"></div>
        </div>
        <div class="col-3 px-1">
        <div class="card text-white mb-3 g--border-bottom-darkgray">
            <div class="card-header g--font-size-40 py-0 bg-dark"><?php echo($newsletterDashboard[0]['COUNT(*)']); ?></div>
            <div class="card-body">
                <h5 class="card-title g--font-size-26 text-black fw-semibold pt-2">Newsletters created</h5>
            </div>
            </div>
        </div>
        
    </div>



    <?php 
    // print_r( $datos[0]['dateSend']);echo "<br>";
    // print_r( $datos);
    $fechas="";
    $visitas="";

    for ($i=0;$i<count($datos);$i++){
        $fechas .=($datos[$i]['dateSend']).",";
        $visitas .=($datos[$i]['COUNT(id)'].",");
    }

    //Cortar la última letra
    $fechas = substr($fechas, 0, -1);
    $visitas = substr($visitas, 0, -1);
    ?>
    <!-- Divs ocultos donde se imprime el texto de php, para luego usarlo en javascript con DOOM -->
    <div id="fechasArray" class="d-none"><?php echo $fechas; ?></div>
    <div id="visitasArray" class="d-none"><?php echo $visitas; ?></div>





































    <?php
    $fechasR="";
    $visitasR="";

    for ($i=0;$i<count($registros);$i++){
        $fechasR .=($registros[$i]['dateSend']).",";
        $visitasR .=($registros[$i]['COUNT(idUser)'].",");
    }

    //Cortar la última letra
    $fechasR = substr($fechasR, 0, -1);
    $visitasR = substr($visitasR, 0, -1);
    ?>
    <!-- Divs ocultos donde se imprime el texto de php, para luego usarlo en javascript con DOOM -->
    <div id="fechasArrayR" class="d-none"><?php echo $fechasR; ?></div>
    <div id="visitasArrayR" class="d-none"><?php echo $visitasR; ?></div>


























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
            height: 400,
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
            text: "Erutan's visits",
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




<script>
    let fechasR=document.getElementById("fechasArrayR").innerText;
    let visitasR=document.getElementById("visitasArrayR").innerText;
    let fechasArrayR=fechasR.split(',');
    let visitasArrayR=visitasR.split(',');
    // Apexchart
    var options = {
          series: [{
          name: 'Inflation',
          data: visitasArrayR
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val;
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: fechasArrayR,
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
        title: {
          text: 'Registered Users',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chartt"), options);
        chart.render();

</script>
    

    <!-- fin -->

</div>

<script src="assets/js/viewsGraphics.js"></script>
    

	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>