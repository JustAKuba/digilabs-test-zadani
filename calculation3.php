<?php

include 'data.php';
$data = get_data();

foreach($data as $record) {
    if($record['firstNumber'] % 2 == 0 && $record['firstNumber'] / $record['secondNumber'] == $record['thirdNumber']) {
        echo $record['firstNumber'] . " / " . $record['secondNumber'] . " = " . $record['thirdNumber'] . "<br>";
    }
}