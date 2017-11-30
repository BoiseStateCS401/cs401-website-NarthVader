<?php
require_once('Dao.php');
session_start();
function accessGranted() 
{
	if(isset($_SESSION['access']) && ($_SESSION['access']===true)) {
		return true;
	} else {
		return false;
	}
}
if(!accessGranted()) {
	$errors['message'] = "Login first por favor!";
	header("Location: seapg4.php");
	die;
}
?>
<?php
$thisPage = "Welcome";
$logged = $_SESSION['logged'];
?>

<?php 
require_once ('header.php');
require_once ('navigation.php'); ?>
<section id="welcome">
<h1 id="banner">Welcome Back <?= $logged ?> </h1>
<button id="return">Back to the Clink!</button>
</section>
<?php require_once ('footer.php'); ?>