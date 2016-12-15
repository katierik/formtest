<?php

    session_start();

    include 'setup.php';

    //Figure out which cases to test
    $_SESSION["testList"] = pickTests();
    //Start counter at zero
    $_SESSION["count"] = 0;


?>

<html>


    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" type="text/css" href="formdesign-base.css" />
        <link rel="stylesheet" type="text/css" href="testprototype.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <title>Form test</title>
        
    </head>
    
    <body>
    
    <div id="content">
        
        <h1>Ready to get started?</h1>
        <p>Excellent!</p>
        <p>You're going to fill out two forms that are similar to the one you practiced with. There are some questions about you, but we are not saving any of your answers.</p>
        <p>Try to fill these forms both <strong>accurately and quickly.</strong> The time it takes you to fill these out will be recorded, but don't sacrifice accuracy for time.</p>

        
        <form id="startForm" method="get" action="FormTest.php">
            <button>Start</button>
        </form>
        
        <div id="testError">
            <p>Sorry - right now we're only testing on screen sizes larger than 1100px. If you would like to participate, please switch to a larger screen.</p>
        
        </div>
        
    </div>
    
    
    </body>

</html>

