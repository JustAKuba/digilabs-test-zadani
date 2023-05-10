<?php

include 'data.php';
$data = get_data();

$current_date = new DateTime();

$interval_start = clone $current_date;
$interval_start->modify('-1 month');

$interval_end = clone $current_date;
$interval_end->modify('+1 month');

foreach($data as $record) {
    $input_date = $record['createdAt'];
    $input_date_time = new DateTime($input_date);
    if ($input_date_time >= $interval_start && $input_date_time <= $interval_end) {
        echo $input_date . "<br>";
    } else {
    }
}
