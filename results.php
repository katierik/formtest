<?php

	if (!function_exists('str_putcsv')) {
        function str_putcsv($input, $delimiter = ',', $enclosure = '"') {
            $fp = fopen('php://temp', 'r+b');
            fputcsv($fp, $input, $delimiter, $enclosure);
            rewind($fp);
            $data = rtrim(stream_get_contents($fp), "\n");
            fclose($fp);
            return $data;
        }
    }
    
    $dbopts = parse_url(getenv('DATABASE_URL'));
    $conn = pg_connect('host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"].' dbname='.ltrim($dbopts["path"],'/'));
    $query = "SELECT * from results;";

    $result = pg_query($conn, $query); 

    if (!$result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    $csv = '';
    while ($row = pg_fetch_row($result)) {
        $part=str_putcsv($row);
        $csv .= $part;
    }

    var_dump($csv);

    pg_close($conn);
?>

