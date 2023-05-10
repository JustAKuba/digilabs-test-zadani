<?php

include 'data.php';
$data = get_data();

foreach($data as $record) {
    $names = explode(" ", $record['name']);
    $initials = "";
    foreach($names as $name) {
        $initials .= $name[0];
    }

    if(preg_match('/^([a-zA-Z])\1+$/', $initials)) {
        echo $record['name'] . "<br>";
    }
}
