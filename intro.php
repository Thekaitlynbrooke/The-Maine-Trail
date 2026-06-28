<?php
session_start();
include 'header.php';
?>

<h1>The Maine Trail</h1>

<div class="instructions">

    <h2>☝🏻Before You Head Out...</h2>

    <p>
        You're headed north to your newly aquired cabin from dear Aunt Mabel 🪦 before the first major snowstorm
        of the season arrives.
    </p>

    <p>
        Every decision matters. Some choices will save time, while others may
        cost you ⛽gas, 💵money, or ❤️morale.
    </p>

    <p>
        The storm is always moving closer❄️, and supplies are limited.
        You won't always know which option is best until it's too late.
    </p>

    <p class="warning">
        <strong>Remember:</strong><br>
        Your choices can affect your
        <strong>Money</strong>,
        <strong>Gas</strong>,
        <strong>Morale</strong>,
<n>
        and how quickly you reach your destination📍
    </p>

    <p class="tiny-note">
        Make smart decisions... wouldn't want you to be the next main character of a Netflix Documentary🫆
    </p>

    <br>

    <div class="button-container">
    <a href="game.php" class="start-button">
        Begin Journey
    </a>
</div>

<?php
include 'footer.php';
?>