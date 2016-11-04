<?php
    $dbopts = parse_url(getenv('DATABASE_URL'));
    $conn = pg_connect('host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"].' dbname='.ltrim($dbopts["path"],'/'));
    $query = "TRUNCATE TABLE results;";

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
        <title> results table cleared </title>
    </head>
    <body>
        <h1>results table cleared</h1>
    </body>
</html>
