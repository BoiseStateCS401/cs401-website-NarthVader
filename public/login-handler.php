<?php
session_start();
$username       = $_POST['username'];
$password       = $_POST['user-password'];
$error = array();

function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (!valid_length($username, 1, 50)) {
    $error['username'] = "username is required, and should be less than 50 characters";
}
?>

<?php 
if(!valid_length($password, 10, 128)) {
	$error['password'] = "enter password of at least 10 less than 128";
}
?>

<?php
if (empty($error)) {
    header('Location: index.php');
} else {
	$_SESSION['error'] = $error;
    $_SESSION['presets'] = array('username' => htmlspecialchars($username));
    header('Location: seapg4.php');
}
?>

<p>Full Name: <?= htmlspecialchars($username) ?></p>
<p>Password: <?= htmlspecialchars($password) ?></p>