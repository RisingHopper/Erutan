<?php
include_once ("functions/setSessionLang.php");
include_once ("functions/getSessionLang.php");
include_once ("locale/".$sessionLang."/".$sessionLang.".php");
?>
<marquee class="d-block g--border-black-topBottom bg-warning" scrollamount="5" data-uw-styling-context="true" direction="left" behavior="alternate">
            <h6 class="text-dark pt-2">
                <a href="index.php" class="text-dark text-decoration-none ">
                    <img class="mb-1" src="assets/img/logo.png" width="50" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/logoWhite.png" width="50" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto2"]?></span>
                    <img class="mb-1" src="assets/img/marquee3.png" width="40" height="20" />
                    <span class="p-3 fw-semibold"><?=$lang["marquee"]["texto3"]?></span>
                    <img class="mb-1" src="assets/img/logo.png" width="50" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/marquee2.png" width="40" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/logoWhite.png" width="50" height="20" />
                    <span class="p-3 fw-semibold"><?=$lang["marquee"]["texto3"]?></span>
                    <img class="mb-1" src="assets/img/logo.png" width="50" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/marquee2.png" width="40" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/marquee3.png" width="40" height="20" />
                    <span class="p-3 fw-semibold"><?=$lang["marquee"]["texto3"]?></span>
                    <img class="mb-1" src="assets/img/logo.png" width="50" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/marquee2.png" width="40" height="20" />
                    <span class="p-3"><?=$lang["marquee"]["texto1"]?></span>
                    <img class="mb-1" src="assets/img/marquee3.png" width="40" height="20" />
                    <span class="p-3 fw-semibold"><?=$lang["marquee"]["texto3"]?></span></a>
            </h6>
        </marquee>