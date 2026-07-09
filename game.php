<?php

session_start();
// HUD
if (!isset($_SESSION['money'])) {
    $_SESSION['money'] = 200;
    $_SESSION['gas'] = 100;
    $_SESSION['morale'] = 100;
    $_SESSION['progress'] = 0;
    $_SESSION['storm'] = 0;
    $_SESSION['status'] = "playing";
    $_SESSION['message'] = "";
}
// Choice Meter

    if ($_POST['choice'] == 'reset') {
        session_destroy();
        header("Location: game.php");
        exit();
    }
    if (isset($_POST['choice']) && $_SESSION['status'] == "playing") {

    if ($_POST['choice'] == 'travel') {

    $_SESSION['progress'] += 15;
    $_SESSION['gas'] -= 10;
    $_SESSION['storm'] += 10;
    $_SESSION['message'] = "You stay on the interstate. It's uneventful. Which, considering the last conversation you had, feels like a win.";
}
        
    if ($_POST['choice'] == 'rest') {

    $_SESSION['money'] -= 20;
    $_SESSION['morale'] += 10;
    $_SESSION['storm'] += 10;

    $_SESSION['message'] = "You settle in for the night. Tomorrow's problems can wait until tomorrow.";
}
    if ($_POST['choice'] == 'risk') {
        $chance = rand(1, 2);

    if ($chance == 1) {
    $_SESSION['progress'] += 20;
    $_SESSION['gas'] -= 15;
    $_SESSION['morale'] += 15;

    $_SESSION['message'] = "The shortcut actually works. You reconnect with the interstate ahead of schedule. Maybe Gary knows what he's talking about after all.";

} else {
    $_SESSION['progress'] += 5;
    $_SESSION['gas'] -= 25;
    $_SESSION['morale'] -= 50;

    $_SESSION['message'] = "The shortcut becomes two muddy tire tracks. Your GPS loses signal... and so does your confidence. By the time you find pavement again, you're pretty sure Gary measures distance in emotional damage.";
}
        $_SESSION['storm'] += 10;
}
}
// Keep values within display limits
if ($_SESSION['gas'] < 0) {
    $_SESSION['gas'] = 0;
}
if ($_SESSION['gas'] > 100) {
    $_SESSION['gas'] = 100;
}
if ($_SESSION['morale'] < 0) {
    $_SESSION['morale'] = 0;
}
if ($_SESSION['morale'] > 100) {
    $_SESSION['morale'] = 100;
}
if ($_SESSION['progress'] > 100) {
    $_SESSION['progress'] = 100;
}
if ($_SESSION['storm'] > 100) {
    $_SESSION['storm'] = 100;
}
if ($_SESSION['progress'] >= 100) {
    $_SESSION['status'] = "win";
}
if ($_SESSION['gas'] <= 0) {
    $_SESSION['status'] = "gas";
}
if ($_SESSION['morale'] <= 0) {
    $_SESSION['status'] = "morale";
}
if ($_SESSION['storm'] >= 100) {
    $_SESSION['status'] = "storm";

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
            <h2>The Journey Begins</h2>
           <?php if ($_SESSION['message'] == "") { ?> 
<p>You leave Portland just after sunrise with a full tank of gas,
a hot coffee, and Google Maps confidently insisting you'll be
at Mabel's cabin before dinner.</p>
<p>Outside a gas station near Augusta, an older man leans against
a pickup truck that's seen better decades.</p>
<p>He nods toward the gray sky.</p>
<p>"Storm's comin' early this year."</p>
<p>"...Should I be worried?"</p>
<p>"Depends how much you trust your brakes."</p>
<p>Well.</p>
<p>That wasn't ominous at all.</p>
<p> As you're pulling getting back in the car, another customer points toward the truck. </p>
<p> "That's Gary."</p>
<p> "Who's Gary?"</p>
<p> "You know... Gary."</p>
<?php } ?>
<?php if ($_SESSION['message'] != "") { ?>

    <div class="outcome">
        <p>
            <?php echo $_SESSION['message']; ?>
        </p>
    </div>

<?php } ?>
        </div>

       <div class="choices">

<form method="post">

<?php if ($_SESSION['message'] == "") { ?>

    <button type="submit" name="choice" value="travel">
        Stay on I-95
    </button>

    <button type="submit" name="choice" value="rest">
        Stay in Augusta
    </button>

    <button type="submit" name="choice" value="risk">
        Follow Gary's Shortcut
    </button>

<?php } else { ?>

    <button type="submit" name="choice" value="next">
        🚗💨
    </button>

<?php } ?>


<button type="submit" name="choice" value="reset">
    Reset Game
</button>

</form>

</div>
    </div>
</div>


<?php
include 'footer.php';
?>