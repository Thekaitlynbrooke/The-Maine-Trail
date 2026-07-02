<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

require 'header.php';
require 'events.php';


// ---------- Initialize Game ----------

if (!isset($_SESSION["money"])) {

    $_SESSION["location"] = "Portland";
    $_SESSION["progress"] = 0;
    $_SESSION["storm"] = 0;

    $_SESSION["money"] = 200;
    $_SESSION["gas"] = 100;
    $_SESSION["morale"] = 100;

    $_SESSION["event"] = 1;
}


// ---------- Restart Game ----------

if (isset($_POST["reset"])) {

    $_SESSION["location"] = "Portland";
    $_SESSION["progress"] = 0;
    $_SESSION["storm"] = 0;

    $_SESSION["money"] = 200;
    $_SESSION["gas"] = 100;
    $_SESSION["morale"] = 100;

    $_SESSION["event"] = 1;
}


// ---------- Current Game State ----------

$currentEvent = $_SESSION["event"];
$event = $events[$currentEvent];

$choice = "";
$riskResult = "";
$gameOver = false;
$ending = "";

?>

<div class="event-window">

    <h2><?= $event["title"] ?></h2>

    <?php foreach ($event["story"] as $line): ?>
        <p><?= $line ?></p>
    <?php endforeach; ?>

</div>

<?php

require 'footer.php';

?>