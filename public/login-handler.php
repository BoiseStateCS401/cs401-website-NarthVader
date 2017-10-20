<?php
session_start();
$username       = $_POST['username'];
$password       = $_POST['password'];
$valid          = true;
$errors = array();

function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (!valid_length($username, 1, 50)) {
    $error['username'] = "username is required, and should be less than 50 characters";
    $valid         = false;
}
?>

<?php 
if(!valid_length($password, 10, 128)) {
	$error['password'] = "enter password of at least 10 less than 128";
	$valid = false;
}
?>

<?php
if (empty($error)) {
    header('Location: index.php');
} else {
	$_SESSION['error'] = $error;
    header('Location: seapg4.php');
}
?>

<p>Full Name: <?= htmlspecialchars($username) ?></p>
<p>Password: <?= htmlspecialchars($password) ?></p>