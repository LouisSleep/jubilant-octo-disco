<?php

session_start();
require("../partials/header.php");

//Déclaration du chemin du repertoire utilisateur
$username_session = $_SESSION['username'];

if(!isset($_SESSION["username"])){


  header("Location: ./home.php");
  exit();
}
else{
echo 'salut cest cool !!!';




//$username_session = "louis";
$user_repertory = "/home/".$username_session;


//Execution de la commande permettant de connaitre l'espace disque utilisé de l'utilisateur
exec("sudo du -shc ". escapeshellarg($user_repertory), $disk_size_consumed_output);
$disk_size_consumed = end($disk_size_consumed_output);
//Utilisation d'une expression regulière pour afficher correctement la donnée souhaitée
$disk_size_used = preg_replace('/\btotal\b/', '', $disk_size_consumed);

//Déclaration de l'espace disque total
$disk_size = disk_total_space('/home/louis')/1000000000;

//Affichage des données renvoyées lors de l'execution des commandes
echo "vous avez consumé :  " .$disk_size_used . "/" .$disk_size . "G";
}
?>

<?php include "../partials/header.php";?>
<body>

	<a href="../includes/logout.inc.php">
	logout
<a/>

</body>

<?php include "../partials/footer.php"?>


