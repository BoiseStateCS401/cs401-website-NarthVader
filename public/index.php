<?php
$thisPage = "The Clink";
require_once ('header.php');
require_once ('navigation.php');
?>
    <section>
        <div class="container-fluid">
            <div class="row-fluid">
                <h1 id="banner2">Have a GOOD opinion? SHARE HERE!!!</h1>
                <table class="table table-bordered table-striped">
                    <caption id="discussionTitle">Talk Your Best Trash</caption>
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
                        <tr>
                            <td colspan="2">No opinions... yet...</td>
                        </tr>
                        <tr>
                            <td colspan="2">But there will be!!!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row-fluid">
                <form id="new-user">
                    <input type="text" name="username" placeholder="Username" />
                    <input type="text" name="message" placeholder="Message" />
                    <a id="send" class="btn btn-primary">SEND</a>
                </form>
            </div>
        </div>
    </section>
    <?php
require_once ('footer.php');
?>