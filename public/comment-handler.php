<?php
require_once ('Dao.php');
session_start();
$comment       = $_POST['comment'];
$errors = array();
$dao = new Dao();

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
	if ($dao->addComment($_SESSION['loggedID'], $comment))
        {
            echo "Good to go!";
            header('Location: index.php');
        }
        else
        {
            $error['undefined'] = "Something is janky. Try changing your comment/face por favor!";
            header('Location: index.php');
        }
    header('Location: index.php');
} else {
	$_SESSION['error'] = $error;
	$_SESSION['presets'] = array('comment' => htmlspecialchars($comment));
    header('Location: index.php');
}
?>

<p>Full Name: <?= htmlspecialchars($comment)?></p>