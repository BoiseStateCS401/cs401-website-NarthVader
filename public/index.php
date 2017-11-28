<?php
session_start();
$thisPage = "The Clink";
require_once ('header.php');
require_once ('navigation.php');
?>
    <section>
        <div class="container-fluid">
            <div class="row-fluid">
                <h1 id="banner2">Have a GOOD opinion? SHARE HERE!!!</h1>
                <table class="table table-bordered table-striped">
                    <caption id="discussionTitle">Register and LogIn To Talk Your Best Trash</caption>
                    <thead>
                        <tr>
                            <th>
                                User
                            </th>
                            <th>
                                Opinion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
 <?php 
          if(isset($_SESSION['access']) && ($_SESSION['access']===true)) { ?>
           <div class="row-fluid">
                <form method="POST" action="comment-handler.php">
            <fieldset>
            
            <p>

                <label for="comment">comment</label>
                <input type="text" id="comment" name="comment" maxlength=999 placeholder="Comment here..." value="<?=$_SESSION['presets']['comment'] ?>">
                <?php
if (isset($_SESSION['error']['comment']))
{ ?>
        <span id="comment" class="error"> <?php echo $_SESSION['error']['comment'] ?></span>
<?php
} ?>
            </p>
                </form>
            </div>
        </div>
        <?php   }
        else { ?>
        <?php  } ?>

    <p>
    Do you prefer a black and white text? If so...
    <button id="bwbutton">B/W Text</button>
    </p>
    </section>
    <?php
require_once ('footer.php');
?>
