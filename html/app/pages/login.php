<?php
//CONNEXION

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["connexion"])) {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Valider les données du formulaire
    if (empty($username) || empty($password)) {
        echo "Veuillez remplir tous les champs.";
    } else {
	// vérification si l'utilisateur existe
	$getUserUsername = $pdo->query("SELECT username FROM user_accounts WHERE username = '$username'");
        if ($getUserUsername->rowCount() === 0) {
        	echo "Identifiants incorrectes (mdp ou nom d'utilisateur)";
        } else {
		// vérification du mot de passe
		$getPswd = $pdo->query("SELECT password FROM user_accounts WHERE username = '$username'");
		$getPswd = $getPswd->fetch(PDO::FETCH_ASSOC)['password'];

		if ($password  == $getPswd) {
			$getUserData = $pdo->query("SELECT id, username FROM user_accounts WHERE username = '$username'");
                    	$getUserData = $getUserData->fetch(PDO::FETCH_ASSOC);

			$_SESSION['id'] = $getUserData['id'];
                    	$_SESSION['username'] = $getUserData['username'];

			header("Location:./profile.php");
		} else {
			echo "Identifiants incorrectes (mdp ou nom d'utilisateur)";
		}
	}
    }
}
?>
