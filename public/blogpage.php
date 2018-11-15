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
                Enter the elegant solution of immutability. I'm going to focus on its implementation in Clojure because there are a couple basic properties of this language that make it a unique and great solution to this problem of side-effects, plus I have experience using it which will make it easier for me to demonstrate. Clojure is a functional language in which everything is treated as data. But more importantly, this data is treated as Immutable, meaning that once it's set, it's set in stone and will never change. Here's a great example pulled from Clojure for the Brave and True, the starter book in which I cut my teeth on Clojure: <br>
                (def great-baby-name "Rosanthony")<br>
                great-baby-name<br>
                ; => "Rosanthony"<br>
                <br>
                (let [great-baby-name "Bloodthunder"]<br>
                &nbsp;&nbsp;great-baby-name)<br>
                ; => "Bloodthunder"<br>
                <br>
                great-baby-name<br>
                ; => "Rosanthony"<br><br>
                Since great-baby-name is defined as "Rosanthony", the let binding that proceeds it has no effect on the global scope of the variable. In the scope of the let binding, there is another value that happens to be named the same, but as far as the programs concerned, great-baby-name is defined as "Rosanthony" now and forever. That is, until you use some nifty tricks to get around this. Java also has the concept of immutability built into it. Strings in Java are immutable.
                <br>This concept doesn't apply just to strings though. Numbers are also affected (everything in Clojure is immutable)<br>
                user=> (def numbers [1 2 3])<br>
                #’user/numbers<br>
                user=> (map inc numbers)<br>
                (2 3 4)<br>
                user=> numbers<br>
                [1 2 3]<br>
                Some fancy tricks for getting around this. Defining the value as an atom, which, under specific conditions can be changed, but it's instead a pointer connecting the two values. Below is another great example from Clojure for the Brave and True:<br>
                def fred (atom {:cuddle-hunger-level 0<br>
                &nbsp;&nbsp;:percent-deteriorated 0}))<br>
                <br>;fred is now a variable that is defined as an Atom, which is a data structure in Clojure that allows for some flexibility when you use macros such as swap!, etc. Macros that change behavior of atoms are signified with a !<br><br>
                (swap! fred<br>
                (fn [current-state]<br>
                (merge-with + current-state {:cuddle-hunger-level 1})))<br>
                ; => {:cuddle-hunger-level 1, :percent-deteriorated 0}<br>
                @fred<br>
                ; => {:cuddle-hunger-level 1, :percent-deteriorated 0}<br>
                (swap! fred<br>
                &nbsp;&nbsp;&nbsp;&nbsp;(fn [current-state]<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(merge-with + current-state {:cuddle-hunger-level 1<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :percent-deteriorated 1})))<br>
                ; => {:cuddle-hunger-level 2, :percent-deteriorated 1}<br><br>
                Pretty cool, huh? Now we can leverage the power of functional programming and pass this concept to a function that will do it for us!<br><br>
                (defn increase-cuddle-hunger-level<br>
                &nbsp;&nbsp;[zombie-state increase-by]<br>
                &nbsp;&nbsp;(merge-with + zombie-state {:cuddle-hunger-level increase-by}))<br>
                &nbsp;&nbsp;(increase-cuddle-hunger-level @fred 10)<br>
                ; => {:cuddle-hunger-level 12, :percent-deteriorated 1}<br><br>
                this is just a return however and a dereference of fred still results in <br><br>
                @fred<br>
                ; => {:cuddle-hunger-level 2, :percent-deteriorated 1}<br><br>
                  but we use this function with swap, and...<br><br>
                (swap! fred increase-cuddle-hunger-level 10)<br>
                ; => {:cuddle-hunger-level 12, :percent-deteriorated 1}<br>
                <br>
                @fred<br>
                ; => {:cuddle-hunger-level 12, :percent-deteriorated 1}<br><br>
                And now since we used swap!, when you dereference our zombie friend fred, he's actually been changed! I hope that this has been somewhat informative. If you want more information here's my source and where I've gathered about 80% of my Clojure information from. It's presented in an awesome, fun, and informative manner, plus it's FREE!!!<br>
                <a href="https://www.braveclojure.com/">Clojure For The Brave and True</a>

            </p>
            
        </section>
    </div>
<?php
require_once ('footer.php');
?>