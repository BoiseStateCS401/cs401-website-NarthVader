<?php
session_start();
?>
<?php
$thisPage = "Log In";
require_once ('header.php');
require_once ('navigation.php');
?>
    <div>
        <h1 id="banner2">Log In Below!</h1>
        <form method="POST" action="login-handler.php">
            <fieldset>
            <p>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" maxlength=50 value="<?=$_SESSION['presets']['email'] ?>" required>
                <?php
if (isset($_SESSION['error']['email']))
{ ?>
        <span id="emailerror" class="error"> <?php echo $_SESSION['error']['email'] ?></span>
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
            <input type="submit" value="Log In">
            </fieldset>
        </form>
<h1 id="banner2">Not a User? Register!!!</h1>
<button id="register">Register</button>
        </section>
    </div>
   
   <?php
require_once ('footer.php');
?>
