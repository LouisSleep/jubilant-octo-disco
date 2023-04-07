
<?php 

session_start();

// Check if user is already logged in
if(isset($_SESSION['id'])) {
  header("Location: ./pages/profile.php");
  exit();
}
else {
	header("Location: ./pages/home.php");
	exit();
}

?>
