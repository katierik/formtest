<?php
    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
	
    session_start();
    include 'setup.php';

    $checkbox = '';

    //Geting the timezone and appending it to the comments field
    $zone = $_POST["timezone"];
    $_POST["comments"] .= " ZONE:";
    $_POST["comments"] .= $zone;

    if(!empty($_POST['pref'])) {
        foreach($_POST['pref'] as $prefList){
            $checkbox .= $prefList.',';
        }
    }
    else if(!empty($_POST['nopref'])) {
        foreach($_POST['nopref'] as $prefList){
            $checkbox .= $prefList.',';
        }
    }
    else {
        $checkbox = '';
    }

	$conn = pg_connect('host=localhost user=webuser dbname=formtest'); 
    $query = "INSERT INTO results(email, preference, checkbox, comments, testlist_1, testlist_1_time, testlist_2, testlist_2_time) VALUES('".pg_escape_string($_POST["email"])."','".pg_escape_string($_POST["preference"])."','".pg_escape_string($checkbox)."','".pg_escape_string($_POST["comments"])."',".$_SESSION["testList"][0].','.$_SESSION["resultsTime"][0].','.$_SESSION["testList"][1].','.$_SESSION["resultsTime"][1].')';
    $result = pg_query($conn, $query); 
    if (!$result) { 
        $errormessage = pg_last_error(); 
        echo "Error with query: " . $errormessage; 
        exit(); 
    } 
    pg_close($conn);
?>


<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" type="text/css" href="testprototype.css" />
        <link rel="stylesheet" type="text/css" href="formdesign-base.css" />
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <title>Form test</title>
        
    </head>
    
    <body>
    
    <div class="content" id="setup">
        
        <h1>Thanks!</h1>
        
        <h2>Give us your feedback!</h2>
        <p>Did you find this fun? Frustrating? Help us improve the quality of this test by emailing your comments to marina.miaoulis@pega.com</p>
        

        
    </div>
    
    
    </body>

</html>
