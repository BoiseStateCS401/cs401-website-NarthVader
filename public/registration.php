<?php
session_start();
?>

<html>
<head>
	<title>Registration.php</title>
</head>
<body>
	<section>
		<form method="POST" action="registration-handler.php">
			<fieldset>
			<p>

				<label for="fullName">Your Name:</label>
				<input type="text" id="fullName" name="fullName" value=>
				<?php
if (isset($_SESSION['error']['fullName']))
{ ?>
        <span id="fullNameError" class="error"> <?= $_SESSION['error']['fullName'] ?></span>
<?php } ?>
			</p>
			<p>
				<label for="email">email:</label>
				<input type="text" id="email" name="email" >
				<?php
if (isset($_SESSION['error']['email']))
{ ?>
        <span id="fullNameError" class="error"> <?= $_SESSION['error']['email'] ?></span>
<?php } ?>
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" >
				<?php
if (isset($_SESSION['error']['password']))
{ ?>
        <span id="fullNameError" class="error"> <?= $_SESSION['error']['password'] ?></span>
<?php } ?>
			</p>
			<p>
				<label for="password_match">Password again:</label>
				<input type="password" id="password_match" name="password_match" >
				<?php
if (isset($_SESSION['error']['password_match']))
{ ?>
        <span id="fullNameError" class="error"> <?= $_SESSION['error']['password_match'] ?></span>
<?php } ?>
			</p>
			<input type="submit" value="Register">
			</fieldset>
		</form>
		
	</section>
</body>
</html>