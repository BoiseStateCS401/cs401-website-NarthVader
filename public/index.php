<?php session_start(); $thisPage="The Clink" ; require_once ('header.php'); require_once ('navigation.php'); require_once ('Dao.php');?>
<section>
    <div class="container-fluid">
        <div class="row-fluid">
            <h1 id="banner2">Have a GOOD opinion? SHARE HERE!!!</h1>
            <table class="table table-bordered table-striped">
                <caption id="discussionTitle">Trash Board</caption>
                <thead>
                    <tr>
                        <th>
                            Trash
                        </th>
                        <th>
                            Date
                        </th>
                    </tr>
                </thead>
                <?php 
                $dao = new Dao();
                $comments= $dao->getComments(); if ($comments) { ?>
                <table>
                    <?php foreach ($comments as $comment) { ?>
                    <tr>
                        <td>
                            <?=htmlspecialchars($comment["message"]); ?>
                        </td>
                        <td>
                            <?=htmlspecialchars($comment["posted"]); ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?php } ?>
        </div>
        <?php if(isset($_SESSION['access']) && ($_SESSION['access']===true)) { ?>
        <div class="row-fluid">
            <form method="POST" action="comment-handler.php">
                <fieldset>

                    <p>

                        <label for="comment">comment</label>
                        <input type="text" id="comment" name="comment" maxlength=999 placeholder="Comment here..." value="<?=$_SESSION['presets']['comment'] ?>">
                        <?php if (isset($_SESSION['error']['comment'])) { ?>
                        <span id="comment" class="error"> <?php echo $_SESSION['error']['comment'] ?></span>
                        <?php } ?>
                    </p>
            </form>
        </div>
    </div>
    <?php } else { ?>Register and Log In to Leave a Comment!
    <?php } ?>
</section>
<?php require_once ('footer.php'); ?>