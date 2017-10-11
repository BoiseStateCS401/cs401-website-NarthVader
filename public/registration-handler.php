<?php
session_start();
$fullName       = $_POST['fullName'];
$email          = $_POST['email'];
$password       = $_POST['password'];
$password_match = $_POST['password_match'];
$valid          = true;
$errors = array();
function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (strlen($fullName) < 1 || strlen($fullName) > 30) {
    $error['fullName'] = "Full Name is required, and should be less than 30 characters";
    $valid         = false;
}
?>
<p>Full Name: <?= $fullName ?></p>
<?php
if (isset($fullNameError))
?>{ 
        <span id="fullNameError" class="error"> <?= $fullNameError ?></span>
 }

<?php
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "This ($email) email address is considered valid.\n";
} else {
    $error['email']="This ($email) email address is considered invalid.\n";
    $valid = false;
}
?>
<?php 
if(!valid_length($password, 10, 128)) {
	$error['password'] = "enter password of at least 10 less than 128";
	$valid = false;
}
?>
<?php
if ($password === $password_match) {
    
} else {
    $error['password_match']="Your password DOES NOT match. Try, try again...";
    $valid = false;
}
?>
<?php
if (empty($error)) {
    header('Location: index.html');
} else {
	$_SESSION['error'] = $error;
    header('Location: registration.php');
}
?>

<p>Full Name: <?= htmlspecialchars($fullName) ?></p>
<p>Email: <?= htmlspecialchars($email) ?></p>
<p>Password: <?= htmlspecialchars($password) ?></p>
<p>Password_Match: <?= htmlspecialchars($password_match) ?></p>