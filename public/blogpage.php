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
                Java because this is a Java focused department, if you aren't careful with your code and treatment of side-effects; bugs are nearly impossible to track down, and unless your code is highly modularized, any changes to your program down the road has a high probability of causing havoc. Great, you've changed the onClick handler to give you some cool effect, but now your whole program is translated to Martian. This is a hyperbolic example, but I've had simple changes to small parts of code completely wreck larger aspects due to unintended side-effects. <br>
                Enter the elegant solution of immutability. I'm going to focus on its implementation in Clojure because there are a couple basic properties of this language that make it a unique and great solution to this problem of side-effects, plus I have experience using it which will make it easier for me to demonstrate. Clojure is a functional language in which everything is treated as data. But more importantly, this data is treated as Immutable, meaning that once it's set, it's set in stone and will never change. Here's a great example pulled from Clojure For the Brave and True, the starter book in which I cut my teeth on Clojure: <br>
                (def great-baby-name "Rosanthony")<br>
                great-baby-name<br>
                ; => "Rosanthony"<br>
                <br>
                (let [great-baby-name "Bloodthunder"]<br>
                <nbsp><nbsp>great-baby-name)<br>
                ; => "Bloodthunder"<br>
                <br>
                great-baby-name<br>
                ; => "Rosanthony"<br>
            </p>
            
        </section>
    </div>
<?php
require_once ('footer.php');
?>