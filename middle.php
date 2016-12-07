<?php
	session_start();
    include setup.php;

    //Record the time
    $_SESSION["resultsTime"][0] = $_POST["time"];

    //Count this round
    $_SESSION["count"]++;
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
        
        <h1>Halfway there!</h1>
        <p>You're half the way there! Next up you will be presented with the same questions in a slightly different layout. </p>
        <p>Try to answer the questions in the same way you did on the last screen.</p>
        
        <form id="startForm" method="get" action="FormTest.php">
            <button>Start</button>
        </form>
        
        <div id="testError">
            <p>Sorry - right now we're only testing on screen sizes larger than 1100px. If you would like to participate, please switch to a larger screen.</p>
        
        </div>
        
    </div>
    
    
    </body>

</html>


</body>
</html>