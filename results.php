<?php
    $conn = pg_connect('host=localhost user=webuser dbname=formtest');
    $query = "SELECT * from results;";

    $result = pg_query($conn, $query); 

    if (!$result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    $csv = fopen('php://memory', 'w');

    while ($row = pg_fetch_row($result)) {
        fputcsv($csv, $row);
    }
    pg_close($conn);
    fseek($csv, 0);
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="results.csv";');
    fpassthru($csv);
?>

