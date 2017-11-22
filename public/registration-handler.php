<?php
session_start();
require_once ('Dao.php');
$dao = new Dao();
$name = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_match = $_POST['password_match'];
$error = array();

function valid_length($field, $min, $max)
{
    $trimmed = trim($field);
    return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (!valid_length($name, 1, 50))
{
    $error['name'] = "username is required, and should be less than 30 characters";
    $valid = false;
}
?>

<?php
if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "This ($email) email address is considered valid.\n";
}
else
{
    $error['email'] = "This ($email) email address is considered invalid.\n";
}
?>
<?php
if (!valid_length($password, 10, 128))
{
    $error['password'] = "enter password of at least 10 less than 128";
}
?>
<?php
if ($password === $password_match)
{

}
else
{
    $error['password_match'] = "Your password DOES NOT match. Try, try again...";
}
?>
<?php
if (empty($error))
{
    if ($dao->userExists($email))
    {
        $error['duplicate'] = "You must be an evil Doppelganger. Not added.";
        header('Location: registration.php');
    }
    else
    {
        if ($dao->addUser($email, $password, $name))
        {
            echo "Good to go!";
            header('Location: seapg4.php');
        }
        else
        {
            $error['undefined'] = "Something is janky. Try again, but with a different email por favor!";
            header('Location: registration.php');
        }
    }
}
else
{
    $_SESSION['error'] = $error;
    $_SESSION['presets'] = array(
        'fullName' => htmlspecialchars($name) ,
        'email' => htmlspecialchars($email)
    );
    header('Location: registration.php');
}
?>

<p>Full Name: <?=htmlspecialchars($fullName) ?></p>
<p>Email: <?=htmlspecialchars($email) ?></p>
<p>Password: <?=htmlspecialchars($password) ?></p>
<p>Password_Match: <?=htmlspecialchars($password_match) ?></p>
