<?php
	
	$database = "projet_223";
	$user     = "grp3_223";
	$password = "5Dgpj5TqW0y92kv1";
	
	try
	{	
		
		$bdd = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', $user, $password);

		/* La ligne ci-dessous permet d'activer les erreurs lors de la connexion � la BDD via PDO.
		Les messages d'erreur li� � des requ�tes SQL comportant des erreurs seront plus clairs. */
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		// On lance une fonction PHP qui permet de conna�tre l'erreur renvoy�e lors de la connection � la base (en r�cup�rant le message li� � l'exception)
		die('<strong>Erreur d�tect�e !!! </strong> : ' . $e->getMessage());
	}
?>