<?php

$events = [

    1 => [

        "title" => "The Journey Begins",

        "story" => [

            "You leave Portland just after sunrise with a full tank of gas, a hot coffee, and Google Maps confidently insisting you'll be at Mabel's cabin before dinner.",

            "Outside a gas station near Augusta, an older man leans against a pickup truck that's seen better decades.",

            "He nods toward the gray sky.",

            "\"Storm's comin' early this year.\"",

            "\"...Should I be worried?\"",

            "\"Depends how much you trust your brakes.\"",

            "Well.",

            "That wasn't ominous at all.",

            "As you're pulling away, another customer points toward the truck.",

            "\"That's Gary.\"",

            "\"...Who's Gary?\"",

            "\"You know... Gary.\"",

            "Before you can ask another question, he disappears inside the store."

        ],

        "choices" => [

            "safe" => [

                "label" => "Stay on I-95",

                "outcome" =>
                "You stay on the interstate. It's uneventful. Which, considering the last conversation you had, feels like a win."

            ],

            "risk" => [

                "label" => "Follow Gary's Shortcut",

                "success" =>
                "The shortcut actually works. You reconnect with the interstate ahead of schedule. Maybe Gary knows what he's talking about after all.",

                "failure" =>
                "The shortcut becomes two muddy tire tracks. Your GPS loses signal... and so does your confidence. By the time you find pavement again, you're pretty sure Gary measures distance in emotional damage."

            ],

            "rest" => [

                "label" => "Stay in Augusta",

                "outcome" =>
                "You settle in for the night. Tomorrow's problems can wait until tomorrow."

            ]

        ]

    ],

];