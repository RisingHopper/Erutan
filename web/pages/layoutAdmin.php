<?php
include 'components/header.php'
?>

<body class="g--max-width-1440 mx-auto" style="background:#f8f9fa;">

    <div class="d-flex">
        <div class="col-2 col-md-3 bg-dark" style="border-right:4px solid grey;">
            <div class="container" ><?php include $menu; ?></div>
        </div>
        <div class="col-10 col-md-9"><?php echo $contenido ?></div>
    </div>
    
</body>
</html>