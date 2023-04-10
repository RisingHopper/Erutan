<?php ob_start() ?>
	
<div class="container-fluid">
	<div class="row mb-2 justify-content-md-center justify-content-lg-start" id="secondaryIndex" >
		<div class="col-lg-1 col-md-1 col-2">
			<h4><a href="index.php?ctl=inicio">Home</a></h4>
		</div>
		<div class="col-lg-2 col-md-3 col-2">
			<h4><a href="index.php?ctl=quienesSomos">About Sveiki</a></h4>
		</div>
	</div>
	</div>
	<div class="row pt-5 pb-0 imagenTexto">
		<div class="col-lg-12 col-md-12 col-12">
			<h1>What is Sveiki?</h1>
		</div>
	</div>
	<div class="row bg-light my-4 secondaryText">
		<div class="col-lg-6 col-12 col-md-7 st1 pt-5 px-5">
			<p>Sveiki is a website dedicated to help users to find his favourite dish. Several restaurants are registred in this site, you can visit them and leave a review to help others person to make their choice.<br><br>
			The concept is very simple, you have to choose your favourite category, then the site will display all the restaurants that have that category that has been choosen by you. After that, you will be able to sight the specific dishes that are on your category
			</p>
			<br>
			<p id="equipo"><u>Team Sveiki</u></p>
		</div>
		<div class="col-lg-6 col-12  col-md-5 st2">
		</div>
	</div>
	<div class="row secondaryTextEnd d-none d-sm-block">
		<p>Sveiki was founded on january, 2023. The site is integrated by more more than hundreds restaurante and thousan of user.
		The main goal of Sveiki is to become an international referent that helps people to find his favourite food.<br>
		Make food a great experience with us!
		</p>
	</div>
</div>
<script src="javascript/layout.js"></script>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>