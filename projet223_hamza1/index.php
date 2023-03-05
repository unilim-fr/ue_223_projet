<?php
	require("./includes/head.php");
?>
<body id="body">
    
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$Route = $_GET['Route'] ?? "accueil";

require("./includes/header.php");

echo '<main>';
	require("./$Route.php");

	require("./includes/footer.php");
echo '</main>';
?>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./assets/js/script.js"></script>

</body>
</html>
