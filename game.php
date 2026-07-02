<?php

session_start();

//---------- Initialize Game ----------

if (!isset($_SESSION["money"])) {

    $_SESSION["location"] = "Portland";
    $_SESSION["progress"] = 0;
    $_SESSION["storm"] = 0;

    $_SESSION["money"] = 200;
    $_SESSION["gas"] = 100;
    $_SESSION["morale"] = 100;
}

//---------- Restart Game ----------

if (isset($_POST["reset"])) {

    $_SESSION["location"] = "Portland";
    $_SESSION["progress"] = 0;
    $_SESSION["storm"] = 0;

    $_SESSION["money"] = 200;
    $_SESSION["gas"] = 100;
    $_SESSION["morale"] = 100;

    $choice = "";
}

//---------- Choice Outcomes ----------

$choice = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["choice"])) {

    $choice = $_POST["choice"];

    $message = "";

    if ($choice == "safe") {

        $_SESSION["gas"] -= 10;
        $_SESSION["progress"] += 15;
        $_SESSION["storm"] += 15;

    } elseif ($choice == "risk") {

        if (rand(0, 1)) {

            // Success
            $_SESSION["gas"] -= 15;
            $_SESSION["progress"] += 20;
            $_SESSION["morale"] += 5;

        } else {

            // Failure
            $_SESSION["gas"] -= 25;
            $_SESSION["progress"] += 5;
            $_SESSION["morale"] -= 15;

        }

        $_SESSION["storm"] += 15;

    } elseif ($choice == "rest") {

        $_SESSION["money"] -= 20;
        $_SESSION["morale"] += 10;
        $_SESSION["storm"] += 15;

    }

    // Keep the storm from exceeding 100%
    if ($_SESSION["storm"] > 100) {
        $_SESSION["storm"] = 100;
    }

    // Keep progress from exceeding 100%
if ($_SESSION["progress"] > 100) {
    $_SESSION["progress"] = 100;
}
}
include 'header.php';
?>

<h1>The Maine Trail</h1>



<div class="game-layout">

    <div class="sidebar">

        <div class="hud">

            <p>
            📍 Current Location:
            <br>
            <?php echo $_SESSION["location"]; ?>
            </p>

            <h3>Progress to Mabel's Cabin</h3>
            <div class="progress-bar">
            <?php echo $_SESSION["progress"]; ?>%
            </div>

            <h3>Storm Progress</h3>
            <div class="storm-bar">
            <?php echo $_SESSION["storm"]; ?>%
            </div>

            <p>💵 Money: $<?php echo $_SESSION["money"]; ?></p>
            <p>⛽ Gas: <?php echo $_SESSION["gas"]; ?>%</p>
            <p>❤️ Morale: <?php echo $_SESSION["morale"]; ?>%</p>

        </div>

        <!-- -------- Restart Button -------- -->

        <form method="post" class="restart-form">

            <button
                type="submit"
                class="restart-button"
                name="reset"
                value="true">

                🔄 Restart Journey

            </button>

        </form>

    </div>

    <div class="game-content">

        <div class="event-window">

            <?php if ($choice == ""): ?>

<!----------- DAY 1 ----------------->

                <h2>October 18 — The Journey Begins</h2>

                <p>
                    You leave Portland just after sunrise with a full tank of gas,
                    a latte in your Stanley, and directions to Mabel's cabin ready
                    on Google Maps.
                </p>

                <p>
                    While pumping gas, you notice an older man leaning against
                    an aging pickup truck.
                </p>

                <p><em>"Storm's comin' early this year."</em></p>

                <p>You glance toward the gray sky.</p>

                <p><em>"Should I be worried?"</em></p>

                <p>He shrugs.</p>

                <p><em>"Depends how much you trust your tires."</em></p>

                <p>
                    As you twist the gas cap back on, another stranger points toward the truck.
                </p>

                <p><em>"That's Gary."</em></p>

                <p><em>The stranger disappears into the building.</em></p>

                <p><i>Who the hell is Gary?</i></p>

            <?php elseif ($choice == "safe"): ?>

                <h2>You Play It Safe</h2>

                <p>
                    You decide to stay on I-95.
                </p>

                <p>
                    The interstate isn't exciting, but at least
                    you'll have cell service for Google Maps.
                </p>

                <p><strong>Progress +1</strong></p>
                <p><strong>Gas -10</strong></p>

            <?php elseif ($choice == "risk"): ?>

                <h2>You Follow Gary</h2>

                <p>
                    Gary swears his shortcut will save you an hour.
                </p>

                <p>
                    It doesn't.
                </p>

                <p>
                    You very quickly realize that the term "road" is generous.
                </p>

                <p><strong>Progress -1</strong></p>
                <p><strong>Gas -20</strong></p>
                <p><strong>Morale -10</strong></p>

            <?php elseif ($choice == "rest"): ?>

                <h2>You Stay the Night</h2>

                <p>
                    Today has been overwhelming enough. Let's start again tomorrow.
                </p>

                <p>
                    Self care in a hotel room hits different.
                </p>

                <p><strong>Progress +0</strong></p>
                <p><strong>Money -20</strong></p>
                <p><strong>Morale +10</strong></p>

            <?php endif; ?>

        </div>

        <div class="choices">

            <form method="post">

                <button class="choice-button" name="choice" value="safe">
                    🟢 Play It Safe
                    <br>
                    <small>Stay on I-95.</small>
                </button>

                <button class="choice-button" name="choice" value="risk">
                    🔴 Take the Risk
                    <br>
                    <small>Follow Gary's shortcut.</small>
                </button>

                <button class="choice-button" name="choice" value="rest">
                    🔵 Rest &amp; Recover
                    <br>
                    <small>Stay in Augusta for the night.</small>
                </button>

            </form>

        </div>

    </div>

</div>

<?php
include 'footer.php';
?>