<?php
session_start();
?>
<?php
$thisPage = "Log In";
require_once ('header.php');
require_once ('navigation.php');
?>
    <div>
        <h1 id="banner2">WIP: Log In Below!</h1>
        <form method="POST" action="login-handler.php">
            <fieldset>
            <p>

                <label for="username">username:</label>
                <input type="text" id="username" name="username" maxlength=50 required>
                <?php

if (isset($_SESSION['error']['username']))
    { ?>
        <span id="fullNameError" class="error"> <?php echo $_SESSION['error']['username'] ?></span>
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
<button id="registration" class="float-left submit-button" >Register</button>

<script type="text/javascript">
    document.getElementById("registration").onclick = function () {
        location.href = "registration.php";
    };
</script>

        <p id="banner2">This will look A LOT different and will be functional as the semester progresses...</p>
        </section>
    </div>
   <?php
require_once ('footer.php');
?>