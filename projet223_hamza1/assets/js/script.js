$(document).ready(function() {
	$('.nav-scroll').on('click', function() {
		var page = $(this).attr('data-target');
		var speed = 750;
		$('html, body').animate( { scrollTop: $(page).offset().top-100 }, speed ); // Go
		return false;
	});

	$("#espace-btn").click(function() {
		$.ajax({
			type:"get",
			url:"includes/login.php",
		})

		.done(function(data){
			$('#login-page').html(data);
		})
		$('html, body').animate( { scrollTop: $(body).offset().top-100 }, 100 );
	});




	  // Ajouter un écouteur d'événements pour chaque bouton de suppression de formation
		$('.delete-formation').on('click', function() {
		// Récupérer l'ID de la formation à supprimer
		const formationId = $(this).data('id');
		// Appeler la fonction pour supprimer la formation correspondante
		var lien = "./controleur/formation/supprimer_formation.php";
		var message_formation="supprimer";
		ordreFormation(formationId , lien , message_formation );
		});
		//modification
		// $('.modif-formation').on('click', function() {
		// 	const formationId = $(this).data('id');
		// 	var lien="./";
		// 	var message_formation="modifier";
		// 	ordreFormation(formationId , lien , message_formation);
		// 	});
		$('.modif-formation').on('click', function() {
			const formationId = $(this).data('id');
			const courseItem = $('#' + formationId);
			// Récupérer les valeurs actuelles
			const imgSrc = courseItem.find('img').attr('src');
			const ticket = courseItem.find('h4').text();
			const duree = courseItem.find('.price').text();
			const titre = courseItem.find('h5').text();
			const description = courseItem.find('p').text();
			// Remplacer le contenu HTML par des champs de formulaire
			const formHtml = `
			<div class="course-item" id="<?php echo $data['id_formation']; ?>">
			<form action="./controleur/formation/modifier_formation.php?id=${formationId}; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="titre">Titre :</label>
					<input type="text" class="form-control" id="titreInput" name="titre" value="${titre}">
				</div>
				<div class="form-group">
					<label for="ticket">Ticket :</label>
					<input type="text" class="form-control" id="titreInput" name="ticket" value="${ticket}">
				</div>
				<div class="form-group">
					<label for="duree">Durée :</label>
					<input type="text" class="form-control" id="dureeInput" name="duree" value="${duree}">
				</div>
				<div class="form-group">
					<label for="description">Description :</label>
					<textarea class="form-control" id="descriptionInput" name="description">${description}</textarea>
				</div>
				<div class="form-group">
					<label for="image">Image :</label>
					<input type="file" class="form-control-file" id="image" name="img" accept="image/*" required>
				</div>
				<button type="submit" class="btn btn-primary" name="modif_formation">Enregistrer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
			</form>
			</div>
			`;
			courseItem.html(formHtml);
			});

	function ordreFormation(idFormation , link , ordre) {
		if (confirm("Êtes-vous sûr de vouloir "+ ordre + " cette formation ?")) {
			// envoyer une requête HTTP pour supprimer la formation
			$.ajax({
				url: link + '?idformation=' + idFormation,
				method: 'GET',
				success: function() {
					// recharger la page pour afficher les changements
					location.reload();
				},
				error: function() {
					alert("La "+ ordre +" a échoué.");
				}
			});
		}
	}



	/** */
	tinymce.init({
		selector: '#myTextarea',
		height: 500,
		plugins: [
		  'advlist autolink lists link image charmap print preview anchor',
		  'searchreplace visualblocks code fullscreen',
		  'insertdatetime media table paste code help wordcount'
		],
		toolbar: 'undo redo | formatselect | ' +
		  'bold italic backcolor | alignleft aligncenter ' +
		  'alignright alignjustify | bullist numlist outdent indent | ' +
		  'removeformat | help',
		content_css: '//www.tiny.cloud/css/codepen.min.css'
	  });
});

