<div class="container vh-100 d-flex justify-content-center mt-5">
	
	<div class="col-lg-4">
		<div class="m-4 p-5 shadow-sm border rounded-5 border-primary">
			<h2 class="text-center mb-4">Connexion</h2>
			<form action="controleur/login/connexion.php" method="post">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Adresse mail</label>
					<input type="email" name="mail" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Mot de passe</label>
					<input type="password" name="password" class="form-control border border-primary" id="exampleInputPassword1">
				</div>
				<p class="small"><a class="text-primary" href="forget-password.html"></a></p>
				<div class="d-grid">
					<button class="j-btn" type="submit">Se connecter</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="m-4 p-5 shadow-sm border rounded-5 border-primary">
			<h2 class="text-center mb-4">Créer un compte</h2>
			<form action="controleur/login/inscription.php" method="post">
				<div class="row mb-3">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="votre_nom" id="votre_nom" class="form-control input-sm border-primary" placeholder="Votre Nom">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="votre_prenom" id="votre_prenom" class="form-control input-sm border-primary" placeholder="Votre prénom">
						</div>
					</div>
				</div>
				<div class="form-group mb-3">
					<input type="email" name="email" id="email" class="form-control input-sm border-primary" placeholder="Adresse mail">
				</div>
				<div class="row mb-3">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-sm border-primary" placeholder="Mot de passe">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm border-primary" placeholder="Confirmation mot de passe">
						</div>
					</div>
				</div>
				<div class="text-center">
					<button class="j-btn" type="submit">Créer</button>
				</div>
			</form>
		</div>
	</div>
</div>
