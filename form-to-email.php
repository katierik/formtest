<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
	
	session_start();
    include 'setup.php';
	$dbopts = parse_url(getenv('DATABASE_URL'));
	
	$conn = pg_connect('host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"].' dbname='.ltrim($dbopts["path"],'/')); 
    $result = pg_query($conn, "select * from pg_stat_activity");
    var_dump(pg_fetch_all($result));
    pg_close($conn);

    if(!empty($_POST['pref'])) {
        foreach($_POST['pref'] as $prefList){
            $preference .= $prefList;
        }
    }


    if(!empty($_POST['nopref'])) {
        foreach($_POST['nopref'] as $prefList){
            $nopreference .= $prefList;
        }
    }
    $query = "INSERT INTO results(email, preference, comments, testlist_1, testlist_1_time, testlist_2, testlist_2_time) VALUES('$_POST["email"].','.$_POST["preference"].','.$_POST["comments"].','.$_SESSION["testList"][0].','.$_SESSION["resultsTime"][0].','.$_SESSION["testList"][1].','.$_SESSION["resultsTime"][1]);

    $result = pg_query($query); 

    if (!$result) { 
        $errormessage = pg_last_error(); 
        echo "Error with query: " . $errormessage; 
        exit(); 
    } 

    //Save to CSV
	$file = 'results.csv';
	$list = array($_POST["email"],$_POST["preference"],$preference,$nopreference,$_POST["comments"],$_SESSION["testList"][0],$_SESSION["resultsTime"][0],$_SESSION["testList"][1],$_SESSION["resultsTime"][1]);
    

	$fp = fopen($file, "a", FILE_APPEND | LOCK_EX);
	fputcsv($fp, $list);
	fclose($fp);



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
        <p>Thanks for your participation! </p>
        

        
    </div>
    
    
    </body>

</html>
