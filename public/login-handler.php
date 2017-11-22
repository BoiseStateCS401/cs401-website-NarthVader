<?php
require_once ('Dao.php');
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$error = array();

function valid_length($field, $min, $max)
{
    $trimmed = trim($field);
    return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}
if (!valid_length($email, 1, 50))
{
    $error['email'] = "email is required, and should be less than 50 characters";
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
if (empty($error))
{
    try
    {
        $dao = new Dao();
        $user = $dao->authenticate($email, $password);
        if ($user)
        {
            $_SESSION['access'] = true;
            session_regenerate_id(true);
            $_SESSION['logged'] = $user['name'];
            $_SESSION['loggedID'] = $user['id'];
            header('Location: welcome.php');
        }
        else
        {
            $error['invalid'] = "invalid login credentials";
            $_SESSION['presets'] = array(
                'email' => htmlspecialchars($email)
            );
            header('Location: seapg4.php');
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        header('Location: seapg4.php');
        $error['message'] = "something went wrong";
    }
}
else
{
    $_SESSION['error'] = $error;
    $_SESSION['presets'] = array(
        'email' => htmlspecialchars($email)
    );
    header('Location: seapg4.php');
}
?>

<p>Full Name: <?=htmlspecialchars($email) ?></p>
<p>Password: <?=htmlspecialchars($password) ?></p>
