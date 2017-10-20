<?php
session_start();
$comment       = $_POST['comment'];
$errors = array();

function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (!valid_length($comment, 1, 999)) {
    $error['comment'] = "Why is your comment not working?... You're probably malicious";
}
?>

<?php
if (empty($error)) {
    header('Location: index.php');
} else {
	$_SESSION['error'] = $error;
	$_SESSION['presets'] = array('comment' => htmlspecialchars($comment));
    header('Location: index.php');
}
?>

<p>Full Name: <?= htmlspecialchars($comment)?></p>