<?php session_start();?>
<header>
<nav class="navbar navbar-expand-md fixed-top bg-white" id="top-nav">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="./assets/images/logo/1.png" class="w-100">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse navbar-light" id="navbarCollapse">
				<ul class="navbar-nav me-auto mb-md-0">
					<li class="nav-item">
						<a class="nav-link nav-scroll" href="#presentation" data-target="#presentation">Présentation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-scroll" href="#formations_detail" data-target="#formations_detail">Formations</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-scroll" href="#formations" data-target="#formations">Actualités</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-scroll" href="#formateurs" data-target="#formateurs">Formateurs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-scroll" href="#contact" data-target="#contact">Contact</a>
					</li>
				</ul>
				<?php
					if(!isset($_SESSION['login']) || $_SESSION['login']===false){
				?>
						<button type="button" class="j-btn" id="espace-btn">Mon espace</button>
				<?php
					}
					if(isset($_SESSION['login']) && $_SESSION['login']===true){
				?>
					<a href="controleur/login/deconnexion.php"><button type="button" class="j-btn" id="déconnexion">Déconnexion</button></a>
				<?php
					}
				?>
				<!--<form action="" method="post" class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Recherchez" aria-label="Recherchez">
					<button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
				</form>-->
			</div>
		</div>
	</nav>
</header>
