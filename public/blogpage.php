<?php
$thisPage = "Blog";
require_once ('header.php');
require_once ('navigation.php');
?>
    <div>
        <p id="banner2">CS 398 Blog -- Clojure and Immutability</p>
        <section>
            <p> <b>What Is Immutability???</b>
                Immutability is a concept that once created, data cannot be changed. This stands in stark contrast to the concept of Object Oriented programming
                in which everything relies on the behavior of side-effects in order to run your program. As anyone who has programmed in an OO language before, namely
                Java because this is a Java focused department, if you aren't careful with your code and treatment of side-effects, bugs are nearly impossible to track down, and unless your code is highly modularized, any changes to your program down the road has a high probability of causing havoc. Great, you've changed the onClick handler to give you some cool effect, but now your whole program is translated to Martian. This is a hyperbolic example, but I've had simple changes to small parts of code completely wreck larger aspects due to unintended side-effects. <br>
                next P
            </p>
            
        </section>
    </div>
<?php
require_once ('footer.php');
?>