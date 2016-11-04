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
    $csv = fopen('php://memory', 'w');

    while ($row = pg_fetch_row($result)) {
        fputcsv($row);
    }
    pg_close($conn);
    fseek($csv, 0);
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="results.csv";');
    fpassthru($f);
?>

