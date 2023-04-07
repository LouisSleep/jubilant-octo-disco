<?php
//INSCRIPTION

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["inscription"]) ) {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];
    $domain = $_POST['domain'];

    // Vérification si l'utilisateur existe déjà
    $getUserUsername = $pdo->query("SELECT username FROM user_accounts WHERE username = '$username'");
    if ($getUserUsername->rowCount() > 0) {
    	echo "L'utilisateur avec l'email $username existe déjà.";
    } else {
        //  Insertion des données de l'utilisateur dans la base de données
        $insertUser = 'INSERT INTO user_accounts (username, password, domain_name) VALUES (:username, :password, :domain_name)';
        $stmt = $pdo->prepare($insertUser);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':domain_name', $domain);
        $stmt->execute();

        echo "L'utilisateur $username a été inscrit avec succès";
	
	// Création d'un utilisateur avec un répertoire
        $cmd = "sudo useradd -m -p $(openssl passwd -1 $password) $username";
        $output = shell_exec($cmd);
	$_SESSION['username'] = $username;
	header('Location: ./profile.php');
   }
}
?>
