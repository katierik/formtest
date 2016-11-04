<?php
    $dbopts = parse_url(getenv('DATABASE_URL'));
    $conn = pg_connect('host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"].' dbname='.ltrim($dbopts["path"],'/'));
    $query = "SELECT * from results;";

    $result = pg_query($conn, $query); 

    if (!$result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    var_dump($result);

    pg_close($conn);
?>

