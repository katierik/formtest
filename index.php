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
        
        <h1>Study: Filling out forms</h1>
        <p>Thanks for participating in our study. </p>
        <p>After completing the study you will be entered to win a <strong>$50 Amazon giftcard!</strong></p>
        <p>During this study, you will fill in a form containing some information that you should be familiar with: things like your name, what subject you liked in school, and who sits near you in the office. </p>
        <p>You'll fill in the same information twice, with the layout of the form being slightly different each time. At the end of the study, we're going to ask you if you prefer one or the other.</p>
        
        <form id="startForm" method="get" action="FormTest.php">
            <button>Start</button>
        </form>
        
        <div id="testError">
            <p>Sorry - right now we're only testing on screen sizes larger than 1100px. If you would like to participate, please switch to a larger screen.</p>
        
        </div>
        
    </div>
    
    
    </body>

</html>

