<?php

session_start();

if (!isset($_SESSION['money'])) {
    $_SESSION['money'] = 200;
    $_SESSION['gas'] = 100;
    $_SESSION['morale'] = 100;
    $_SESSION['progress'] = 0;
    $_SESSION['storm'] = 0;
}

if (isset($_POST['choice'])) {

    if ($_POST['choice'] == 'travel') {

        $_SESSION['progress'] += 15;
        $_SESSION['gas'] -= 10;
        $_SESSION['storm'] += 10;

    }

    if ($_POST['choice'] == 'rest') {

        $_SESSION['money'] -= 20;
        $_SESSION['morale'] += 10;
        $_SESSION['storm'] += 10;

    }

    if ($_POST['choice'] == 'reset') {
        session_destroy();
        header("Location: game.php");
        exit();

    }

}

include 'header.php';

?>


<h1>The Maine Trail</h1>

<div class="game-layout">

    <div class="hud">

        <p>📍 Current Location: Portland</p>

        <h3>Progress to Mabel's Cabin</h3>

        <div class="progress-bar">

            <?php echo $_SESSION['progress']; ?>%

    </div>

        <h3>Storm Progress</h3>

        <div class="storm-bar">

            <?php echo $_SESSION['storm']; ?>%

    </div>

        <p>💵 Money: $<?php echo $_SESSION['money']; ?></p>

        <p>⛽ Gas: <?php echo $_SESSION['gas']; ?>%</p>

        <p>❤️ Morale: <?php echo $_SESSION['morale']; ?>%</p>

    </div>


    <div class="game-content">

        <div class="event-window">

            <h2>Today's Event</h2>

            <p>
                Placeholder event text goes here.
            </p>

        </div>

       <div class="choices">

    <form method="post">

        <button type="submit" name="choice" value="travel">
            Travel
        </button>

        <button type="submit" name="choice" value="rest">
            Rest
        </button>

        <button type="submit" name="choice" value="store">
            Visit Store
        </button>

        <button type="submit" name="choice" value="reset">
            Reset Game
        </button>

    </form>

</div>

    </div>

</div>


<div class="instructions">

    <h2>📖 Before You Head Out...</h2>

    <p>
        Every choice changes your journey.
    </p>

    <p>
        Sometimes the safe choice costs you time.
        Sometimes the risky choice pays off.
        Sometimes it absolutely does not.
    </p>

    <p>
        There isn't always a right answer.
        You're just trying to make it to Mabel's Cabin in one piece.
    </p>

    <p class="warning">
        <strong>Fair warning:</strong>
        Your choices can change your
        <strong>Money</strong>,
        <strong>Gas</strong>, and
        <strong>Morale</strong>.
    </p>

    <p class="tiny-note">
        Try not to become the main character of the next Dateline.
    </p>

</div>

<?php
include 'footer.php';
?>