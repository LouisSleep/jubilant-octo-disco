
<?php 
include "../includes/connect.php";
include "./login.php";
include "./register.php";
include "../router.php";

include "../partials/header.php";

?>



<body>
    <h2>Inscription</h2>
    <form method="POST" action="">
        <label>Nom d'utilisateur</label>
        <input type="text" name="username" required><br><br>
        <label>DNS</label>
        <input type="text" name="domain" required><br><br>
        <label>Mot de passe</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="inscription" value="S'inscrire">
    </form>

 <h2>Connexion</h2>
    <form method="POST" action="">
        <label>Nom d'utilisateur</label>
        <input type="text" name="username" required><br><br>
        <label>Mot de passe</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="connexion" value="Connexion">
    </form>

</body>

<?php


include "../partials/footer.php"
 
?>
