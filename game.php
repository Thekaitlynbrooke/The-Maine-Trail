<?php

session_start();
// ===============================================
//              HUD
// ================================================
if (!isset($_SESSION['money'])) {
    $_SESSION['money'] = 200;
    $_SESSION['gas'] = 100;
    $_SESSION['morale'] = 100;
    $_SESSION['progress'] = 0;
    $_SESSION['storm'] = 0;
    $_SESSION['status'] = "playing";
    $_SESSION['message'] = "";
}

if (!isset($_SESSION['event'])) {
    $_SESSION['event'] = 1;
}
// ================================================
//              RESET GAME
// ================================================

    if ($_POST['choice'] == 'reset') {
        session_destroy();
        header("Location: game.php");
        exit();
    }
// =================================================
//               PLAYER CHOICE LOGIC
// =================================================    
    if (isset($_POST['choice']) && $_SESSION['status'] == "playing") {
// =================================================
//              EVENT 1 OUTCOME 
// =================================================       
    if ($_SESSION['event'] == 1) {
    // Event 1 travel
    if ($_POST['choice'] == 'travel') {
    $_SESSION['progress'] += 15;
    $_SESSION['gas'] -= 10;
    $_SESSION['storm'] += 10;
    $_SESSION['message'] = "You stay on the interstate. There arent't any cryptic strangers in sight. Which, considering the last conversation you had, feels like a win.";
}   
    //Event 1 rest
    if ($_POST['choice'] == 'rest') {
    $_SESSION['money'] -= 20;
    $_SESSION['morale'] += 10;
    $_SESSION['storm'] += 10;
    $_SESSION['message'] = "You could use a face mask, a girl dinner and an actual weather man right about now.";
}
    // Event 1 risk
    if ($_POST['choice'] == 'risk') {
        $chance = rand(1, 2);

    if ($chance == 1) {
    $_SESSION['progress'] += 20;
    $_SESSION['gas'] -= 15;
    $_SESSION['morale'] += 15;
    $_SESSION['message'] = "The shortcut actually works. You reconnect with the interstate ahead of schedule. Maybe Gary came in handy at the right time.";

} else {
    $_SESSION['progress'] += 5;
    $_SESSION['gas'] -= 25;
    $_SESSION['morale'] -= 50;
    $_SESSION['message'] = "How would Gary even know where I was going? You haven’t seen anything other than a logging truck for hours. And I have no cell service… Great.";
}
        $_SESSION['storm'] += 10;
}
}
// =======================================================
//                 EVENT 2 OUTCOME
// =======================================================
if ($_SESSION['event'] == 2) {

    // Event 2 travel
    if ($_POST['choice'] == 'travel') {
    $_SESSION['progress'] += 15;
    $_SESSION['gas'] -= 10;
    $_SESSION['storm'] += 10;
    $_SESSION['message'] = "You accept that persuading a twelve-hundred-pound moose across the road isn't going to work. About ten minutes later he wanders into the woods. I'll bet this is just another Tuesday.";
}
    // Event 2 rest
    if ($_POST['choice'] == 'rest') {
    $_SESSION['money'] -= 20;
    $_SESSION['morale'] += 10;
    $_SESSION['storm'] += 10;
    $_SESSION['message'] = "You pull off into the gravel and snap a few pictures. The moose ignores everyone. You're beginning to suspect people in Maine schedule their day around moose instead of the other way around.";
}
    // Event 2 risk
if ($_POST['choice'] == 'risk') {

    $chance = rand(1, 2);

    if ($chance == 1) {
        $_SESSION['progress'] += 20;
        $_SESSION['gas'] -= 15;
        $_SESSION['morale'] += 5;
        $_SESSION['message'] = "The logging road reconnects with the highway. You even caught sight of a few deer and turkeys. Ok National Geographic.";

    } else {
        $_SESSION['progress'] += 5;
        $_SESSION['gas'] -= 25;
        $_SESSION['morale'] -= 15;
        $_SESSION['message'] = "The detour has a detour since a logging truck has tipped over. There are too many trees here.";
    }

    $_SESSION['storm'] += 10;
}

}
// =======================================================
//                  EVENT 3 OUTCOME
// =======================================================
if ($_SESSION['event'] == 3) {

    // Event 3 travel
    if ($_POST['choice'] == 'travel') {
        $_SESSION['progress'] += 15;
        $_SESSION['gas'] -= 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "Eventually he gets enough photos and traffic starts moving again. You pass the overlook and... okay... it is a pretty nice view. You'd never admit that out loud.";
    }
    // Event 3 rest
     if ($_POST['choice'] == 'rest') {
        $_SESSION['money'] -= 20;
        $_SESSION['morale'] += 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "If everyone's stopping anyway... why not? You stretch your legs, take a few pictures, and against your better judgment... you kind of get it.";
    }
    // Event 3 risk
       if ($_POST['choice'] == 'risk') {

        $chance = rand(1, 2);

        if ($chance == 1) {
            $_SESSION['progress'] += 20;
            $_SESSION['gas'] -= 15;
            $_SESSION['morale'] += 5;
            $_SESSION['message'] = "The back roads wind through small towns and old farms before reconnecting with the highway. Sometimes the scenic route really is worth it.";

        } else {
            $_SESSION['progress'] += 5;
            $_SESSION['gas'] -= 25;
            $_SESSION['morale'] -= 15;
            $_SESSION['message'] = "The shortcut ends at a seasonal road closure. By the time you get back... the leaf peepers are gone, which makes it even more annoying.";
        }

        $_SESSION['storm'] += 10;
    }

}
// =======================================================
//                  EVENT 4 OUTCOME
// =======================================================
if ($_SESSION['event'] == 4) {

    // Event 4 travel
     if ($_POST['choice'] == 'travel') {
        $_SESSION['progress'] += 15;
        $_SESSION['gas'] -= 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "The highway is quiet. Maybe the cashier was just making conversation. As you merge back onto the highway, an old pickup passes in the opposite direction.
                                Wait, isn't that...?
                                Gary lifts two fingers from the steering wheel in a casual wave.
                                This guy feels like an unlucky penny.";
    }
    // Event 4 rest
     if ($_POST['choice'] == 'rest') {
        $_SESSION['money'] -= 20;
        $_SESSION['morale'] += 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "You browse a wall of Stephen King novels. As you leave, the cashier smiles. 'Enjoy the trip.' You can't tell if he means the drive... or something else.";
    }
    // Event 4 risk
     if ($_POST['choice'] == 'risk') {

        $chance = rand(1, 2);

        if ($chance == 1) {
            $_SESSION['progress'] += 20;
            $_SESSION['gas'] -= 15;
            $_SESSION['morale'] += 5;
            $_SESSION['message'] = "Google Maps finds a faster route that actually works. You make a mental note to stop insulting your GPS.";

        } else {
            $_SESSION['progress'] += 5;
            $_SESSION['gas'] -= 25;
            $_SESSION['morale'] -= 15;
            $_SESSION['message'] = "Google Maps proudly announces you've arrived. You're in the middle of nowhere. Eventually it recalculates. Very generous, kind sir.";
        }

        $_SESSION['storm'] += 10;
    }

}
// =======================================================
//                  EVENT 5 OUTCOME
// =======================================================
if ($_SESSION['event'] == 5) {

    // Event 5 travel
    if ($_POST['choice'] == 'travel') {
        $_SESSION['progress'] += 15;
        $_SESSION['gas'] -= 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "Granola bars and questionable gas station trail mix have carried you this far. They can probably carry you a little farther.";
    }
    // Event 5 rest
    if ($_POST['choice'] == 'rest') {
        $_SESSION['money'] -= 20;
        $_SESSION['morale'] += 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "But not too broke for the Diner with a statue of a fat man outside. The food is cheap and hits the spot. 
        I don’t know who the governor is but I wouldn’t be surprised if it’s the guy in the corner eating a whoopie pie.";
    }
    // Event 5 risk
    if ($_POST['choice'] == 'risk') {

        $chance = rand(1, 2);

        if ($chance == 1) {
            $_SESSION['progress'] += 20;
            $_SESSION['gas'] -= 15;
            $_SESSION['morale'] += 5;
            $_SESSION['message'] = "You take your first bite.
                                    Okay.
                                    You hate admitting it... but that might be the best sandwich you've ever had. 
                                    You briefly consider buying another one before remembering you're not independently wealthy.";

        } else {
            $_SESSION['progress'] += 5;
            $_SESSION['gas'] -= 25;
            $_SESSION['morale'] -= 15;
            $_SESSION['message'] = "The lobster roll is... fine. 
                                    But no sandwich should make you question your financial future. 
                                    ‼️Blrpblrpblrp‼️
                                    Oh my dog, was that my stomach?🤢";
        }

        $_SESSION['storm'] += 10;
    }

}
// =======================================================
//                  EVENT 6 OUTCOME
// =======================================================
if ($_SESSION['event'] == 6) {

    // Event 6 travel
    if ($_POST['choice'] == 'travel') {
        $_SESSION['progress'] += 15;
        $_SESSION['gas'] -= 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "Whatever crossed the road is now someone else's problem. You turn the radio up.
                                If you can't hear it... it can't hear you.";
    }
    // Event 6 rest
    if ($_POST['choice'] == 'rest') {
        $_SESSION['money'] -= 20;
        $_SESSION['morale'] += 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "You put the car in park and take a breath before another pickup rolls past. The driver gives you a casual wave. 
                                Gary. Of course.
                                You wave back reluctantly... and you still have absolutely no idea who Gary is.";
    }
    // Event 6 risk
    if ($_POST['choice'] == 'risk') {

        $chance = rand(1, 2);

        if ($chance == 1) {
            $_SESSION['progress'] += 20;
            $_SESSION['gas'] -= 15;
            $_SESSION['morale'] += 5;
            $_SESSION['message'] = "The footprints disappear into the woods after only a few yards. 
                                    You never find whatever made them. At least now you'll have a story nobody is going to believe.";

        } else {
            $_SESSION['progress'] += 5;
            $_SESSION['gas'] -= 25;
            $_SESSION['morale'] -= 15;
            $_SESSION['message'] = "The footprints simply... stop. No return tracks. No explanation. 
                                    You suddenly become very aware of how quiet the forest is. 
                                    Until you hear footsteps in the leaves. Running is any direction seems logical🏃🏻💨";
        }

        $_SESSION['storm'] += 10;
    }

}
// =======================================================
//                  EVENT 7 OUTCOME
// =======================================================
if ($_SESSION['event'] == 7) {

    // Event 7 travel
    if ($_POST['choice'] == 'travel') {
        $_SESSION['progress'] += 15;
        $_SESSION['gas'] -= 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "You've made it this far. Six more miles isn't going to stop you now. You tighten your grip on the steering wheel and press on.🗺️";
    }
    // Event 7 rest
    if ($_POST['choice'] == 'rest') {
        $_SESSION['money'] -= 20;
        $_SESSION['morale'] += 10;
        $_SESSION['storm'] += 10;
        $_SESSION['message'] = "Cell service isn’t strong enough to pull up the radar. Better stop and see if anyone has a working tv or wifi.";
    }
    // Event 7 risk
    if ($_POST['choice'] == 'risk') {

        $chance = rand(1, 2);

        if ($chance == 1) {
            $_SESSION['progress'] += 20;
            $_SESSION['gas'] -= 15;
            $_SESSION['morale'] += 5;
            $_SESSION['message'] = "For once, Google Maps knows exactly what it's is doing. You shave a few precious minutes off the trip.";

        } else {
            $_SESSION['progress'] += 5;
            $_SESSION['gas'] -= 25;
            $_SESSION['morale'] -= 15;
            $_SESSION['message'] = "Google Maps proudly reroutes you to a dirt road with a locked gate awaiting at the end. It offers no apology. Naturally.";
        }

        $_SESSION['storm'] += 10;
    }

}


if ($_POST['choice'] == 'next') {
    $_SESSION['event']++;
    $_SESSION['message'] = "";
}

}
// =======================================================
//              VALUE PARAMETERS
// =======================================================
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

<!-- =====================================================
//              HUD DISPLAY 
// ===================================================== -->

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
<!-- ===========================================================
//                           EVENTS 
// =========================================================== -->
    <div class="game-content">
        <div class="event-window">
            
           <?php if ($_SESSION['message'] == "") { ?> 
           <?php if ($_SESSION['event'] == 1) { ?>
<!--  ===========================================================
//                     1 THE JOURNEY BEGINS 
// =========================================================== -->         
        <h2>The Journey Begins</h2>   
<p>You leave Portland just after sunrise with a full tank of gas,
an overpriced latte, and Google Maps confidently insisting you'll be
at Mabel's cabin before dinner.</p>
<p>Outside a gas station near Augusta, an older man leans against
a pickup truck next to you as you top off.</p>
<p>He nods toward the gray sky.</p>
<p>"Storm's comin' early this year."</p>
<p>"Like a bad one?"</p>
<p>"I wouldn't want to be on the roads if I didn't hafta be", he shrugs and gets into his truck.</p>
<p>Um. Okay.</p>
<p> As you're getting back in the car, another stranger points toward the truck. </p>
<p> "That's Gary."</p>
<p> "Who's Gary?"</p>
<p> "You know... Gary."</p>
<p> 🫩 </p>
 <?php } ?>
<!--=============================================================
//                      2 MOOSE CROSSING 
// =============================================================-->
 <?php if ($_SESSION['event'] == 2) { ?>

    <h2>The Moose Has Right of Way</h2>
    <p> Traffic comes to a complete stop. First you assume it's construction.
        Or an accident. Instead, a moose is standing in the middle of the road.
        Not crossing it. Just standing there.</p>
    <p>"He'll move."</p>
    <p>"...How long?"</p>
    <p>"Whenever he's ready."</p>
    
<?php } ?>
<!-- ===============================================================
//                    3 LEAF PEEPERS 
// =============================================================== -->
 <?php if ($_SESSION['event'] == 3) { ?>

    <h2>Peak Leaf Peeper Season</h2>
    <p> The camper in front of you has been braking every thirty seconds. Then it stops dead in the middle of the road. </p>
    <p> A camera appears out of the driver's side window.</p>
    <p>Apparently the leaves on these particular trees were worth blocking traffic for.</p>
  
<?php } ?>

<!-- ===============================================================
//                  4 BANGOR AFTER DARK 
// =============================================================== -->
 <?php if ($_SESSION['event'] == 4) { ?>

    <h2>People Here Really Like Stephen King...</h2>
    <p>This particular gas station is the last one on Google maps for a minute.</p>
    <p>The pump won't work, so you head inside.</p>
    <p>Also, why does every gas station in this state have a full liquor store and a gift shop?</p>
    <p>As you set your phone on the counter, Google Maps announces, "Continue north for 82 miles."</p>
    <p>The cashier glances up at you.</p>
    <p>"Headin' north?"</p>
    <p>"Trying to"</p>
    <p>"You read Stephen King?"</p>
    <p>"Um, yeah I guess"</p>
    <p>He looks outside to the tree line</p>
    <p>"Good."</p>
    <p>You wait for him to continue.</p>
    <p>He doesn't.</p>
    <p>😳</p>

    
<?php } ?>

<!-- ===============================================================
//                  5 LOBSTER ROLLS 
// =============================================================== -->
 <?php if ($_SESSION['event'] == 5) { ?>

    <h2>Lobster Roll Economics</h2>
    <p>A roadside shack claiming to have the BEST LOBSTER ROLLS IN MAINE comes into view as your stomach sends out an SOS signal.</p>
    <p>"🦞Market Price🦞"</p>
    <p>"How much is market price?</p>
    <p>"$34"</p>
    <p>This lobster better have a passport</p>
    
<?php } ?>

<!-- ===============================================================
//                  6 NOT BIGFOOT
// =============================================================== -->
 <?php if ($_SESSION['event'] == 6) { ?>

    <h2>Definitely Not Big Foot</h2>
    <p>No one mentions that the sun sets at 4 pm up here. Something crosses in front of your headlights up ahead.</p>
    <p>Too tall to be a person</p>
    <p>Deer don't stand on two legs</p>
    <p>Maybe a moose who lost its front legs from angry Leaf Peepers who needed to get to their leaves.</p>
    <p>👀</p>
  
    
<?php } ?>

<!-- ===============================================================
//                  7 LAST STOP 
// =============================================================== -->
 <?php if ($_SESSION['event'] == 7) { ?>

    <h2>One Last Stop</h2>
    <p>These towns keep getting smaller and smaller.</p>
    <p>One blinking traffic light.</p>
    <p>One gas station.</p>
    <p>One diner</p>
    <p>Google Maps: "Continue for 6 miles."</p>
    <p>The snow started falling about 10 miles ago...</p>
    <p>Gary's warning rings in your mind, "Storm's comin' early this year."</p>
    <p>Feels like a threat.</p>
      
  
    
<?php } ?>
<?php } else { ?>

    <div class="outcome">
        <p><?php echo $_SESSION['message']; ?></p>
    </div>

<?php } ?>
</div>

<!-- ===============================================================
//                      CHOICES 
// =============================================================== -->
       <div class="choices">

<form method="post">

<?php if ($_SESSION['message'] == "") { ?>
<!-- ===============================================================
//                  EVENT 1 CHOICES 
// =============================================================== -->
    <?php if ($_SESSION['event'] == 1) { ?>
        <button type="submit" name="choice" value="travel">
            I-95 is That Way ➡️
        </button>
        <button type="submit" name="choice" value="rest">
            Consult the Professionals 
        </button>
        <button type="submit" name="choice" value="risk">
            Gary Mentioned a Back Road?
        </button>
    <?php } ?>
<!-- ===============================================================
//                  EVENT 2 CHOICES 
// =============================================================== -->
    <?php if ($_SESSION['event'] == 2) { ?>
    <button type="submit" name="choice" value="travel">
        I Don't Think I Can Make Him Do Anything He Doesn't Want To
    </button>
    <button type="submit" name="choice" value="risk">
        Enticing Mystery Road To My Right
    </button>
    <button type="submit" name="choice" value="rest">
        When In Rome 📷
    </button>
<?php } ?>
<!-- ===============================================================
//                 EVENT 3 CHOICES 
// =============================================================== -->
<?php if ($_SESSION['event'] == 3) { ?>
    <button type="submit" name="choice" value="travel">
        Wait For The Flat Lander
    </button>

    <button type="submit" name="choice" value="risk">
        To The Left. To The Left.
    </button>

    <button type="submit" name="choice" value="rest">
        The Fall Vibes Though... 🤳🏻🍂
    </button>
<?php } ?>
<!-- ===============================================================
//                 EVENT 4 CHOICES 
// =============================================================== -->
<?php if ($_SESSION['event'] == 4) { ?>
    <button type="submit" name="choice" value="travel">
        Get tf out of there 
    </button>

    <button type="submit" name="choice" value="risk">
        Google Maps reroute? Okay! 
    </button>

    <button type="submit" name="choice" value="rest">
        Check out the bookstore 📚
    </button>
<?php } ?>
<!-- ===============================================================
//                 EVENT 5 CHOICES 
// =============================================================== -->
<?php if ($_SESSION['event'] == 5) { ?>
    <button type="submit" name="choice" value="travel">
        Pass ❌
    </button>

    <button type="submit" name="choice" value="risk">
        Smash ✔️
    </button>

    <button type="submit" name="choice" value="rest">
        Too broke for this
    </button>
<?php } ?>
<!-- ===============================================================
//                 EVENT 6 CHOICES 
// =============================================================== -->
<?php if ($_SESSION['event'] == 6) { ?>
    <button type="submit" name="choice" value="travel">
        I'd like to live
    </button>

    <button type="submit" name="choice" value="risk">
        What's life without a little adventure?
    </button>

    <button type="submit" name="choice" value="rest">
        Beta-Blocker Break 😌
    </button>
<?php } ?>
<!-- ===============================================================
//                 EVENT 7 CHOICES 
// =============================================================== -->
<?php if ($_SESSION['event'] == 7) { ?>
    <button type="submit" name="choice" value="travel">
        Al. Most. There...😰 
    </button>

    <button type="submit" name="choice" value="risk">
        Google Maps Faster Route? Okay!
    </button>

    <button type="submit" name="choice" value="rest">
        Consult with the Weather Man 
    </button>
<?php } ?>
<?php } else { ?>
    <button type="submit" name="choice" value="next">
        🛣️🚗💨
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