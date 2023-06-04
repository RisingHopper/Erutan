<?php
ob_start();
$pageTittle="Newsletter register"; 
?>
	
<div class="container-fluid ">

    <!-- inicio -->

    <div class="col-12 col-md-10  mx-auto">
      <div class="g--bg-newsletter-database d-flex align-items-center justify-content-center my-5" style="height:130px;"><h1 class="text-center text-white "><b>Newsletter Subscribers</b></h1></div>
      <div id="btnExportar"class="bg-danger d-inline-block mt-3 px-3 py-2 mb-4 g--border-black g--hover-bg-black"><a class="text-decoration-none text-white">Download the list</a></div>
    </div>



    <table id="tabla" class="col-12 col-md-10 g--font-size-24 mx-auto">
      <tr>
        <th><h2><b>Subscribers list</b></h2></th>		
      </tr>
      <tr class="g--border-bottom-grey g--height-50 bg-dark text-white">
        <th class="px-3">Name</th>
        <th class="px-3">Email</th>
        <th class="px-3">Phone Number</th>
      </tr>
	
	    <?php foreach ($params['newsletter'] as $newsletter) :?>
      <tr class="g--bg-lightskyblue align-items-center px-3 g--border-bottom-grey g--height-50 g--font-size-20">
        <td class="px-3">
          <?php echo $newsletter['nombre']; ?>
        </td>
        <td class="px-3">
          <?php echo $newsletter['email']; ?>
        </td>
        <td class="px-3">
          <?php echo $newsletter['phoneNumber']; ?>
        </td>
          
      </tr>

      <?php endforeach; ?>
    </table>

    <!-- fin -->

</div>


<script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
<script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>    
<script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>

<script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Newsletter Register List", //Nombre del archivo de Excel
            sheetname: "Newsletter Registered List", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script>
	
<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php' ?>