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
        
        <h1>Study: Form efficency</h1>
        <p>You are going to fill out two versions of a form with information with which you should be familiar. Some of them may seem silly. Try to fill this out accurately and quickly. </p>
        <p>After completing this study, you will be entered to win a <strong>$100 Amazon gift card!</strong> The winner will be chosen February 1st.</p>
        <h3>Let's start with a practice.</h3>

        
        <form id="startForm" method="get" action="FormTestPractice.php">
            <button>Start practice</button>
        </form>
        
        <div id="testError">
            <p>Sorry - right now we're only testing on screen sizes larger than 1100px. If you would like to participate, please switch to a larger screen.</p>
        
        </div>
        
    </div>
    
    
    </body>

</html>

