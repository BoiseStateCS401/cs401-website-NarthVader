<?php
session_start();
?>
<?php
$thisPage = "Register!!!";
require_once ('header.php');
?>
	<h1 id="banner2">Welcome to the Team! Register below!</h1>
	<section>
		<form method="POST" action="registration-handler.php">
			<fieldset>
			<p>

				<label for="fullName">username:</label>
				<input type="text" id="fullName" name="fullName" maxlength=50 value="<?=$_SESSION['presets']['fullName'] ?>" required>
				<?php
if (isset($_SESSION['error']['fullName']))
{ ?>
        <span id="fullNameError" class="error"> <?php echo $_SESSION['error']['fullName'] ?></span>
<?php
} ?>
			</p>
			<p>
				<label for="email">email:</label>
				<input type="email" id="email" name="email" value="<?=$_SESSION['presets']['email'] ?>"required>
				<?php
if (isset($_SESSION['error']['email']))
{ ?>
        <span id="fullNameError" class="error"> <?php echo $_SESSION['error']['email'] ?></span>
<?php
} ?>
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
				<?php
if (isset($_SESSION['error']['password']))
{ ?>
        <span id="fullNameError" class="error"> <?php echo $_SESSION['error']['password'] ?></span>
<?php
} ?>
			</p>
			<p>
				<label for="password_match">Password again:</label>
				<input type="password" id="password_match" name="password_match" required>
				<?php
if (isset($_SESSION['error']['password_match']))
{ ?>
        <span id="fullNameError" class="error"> <?php echo $_SESSION['error']['password_match'] ?></span>
<?php
} ?>
			</p>
			<input type="submit" value="Register">
			</fieldset>
		</form>
	
	</section>
 <?php
require_once ('footer.php');
?>
