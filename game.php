<?php
include 'header.php';
?>

<h1>The Maine Trail</h1>

<div class="game-layout">

    <div class="hud">

        <p>📍 Current Location: Portland</p>

        <h3>Progress to Mabel's Cabin</h3>
        <div class="progress-bar">
            Placeholder
        </div>

        <h3>Storm Progress</h3>
        <div class="storm-bar">
            Placeholder
        </div>

        <p>💵 Money: $200</p>
        <p>⛽ Gas: 100%</p>
        <p>❤️ Morale: 100%</p>

    </div>


    <div class="game-content">

        <div class="event-window">

            <h2>Today's Event</h2>

            <p>
                Placeholder event text goes here.
            </p>

        </div>

        <div class="choices">

            <button>Travel</button>

            <button>Rest</button>

            <button>Visit Store</button>

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