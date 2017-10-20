<?php
session_start();
$comment       = $_POST['comment'];
$valid          = true;
$errors = array();

function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (!valid_length($comment, 1, 999)) {
    $error['comment'] = "Why is your comment not working?... You're probably malicious";
    $valid         = false;
}
?>

<?php
if (empty($error)) {
    header('Location: index.php');
} else {
	$_SESSION['error'] = $error;
    header('Location: index.php');
}
?>

<p>Full Name: <?= htmlspecialchars($comment)?></p>