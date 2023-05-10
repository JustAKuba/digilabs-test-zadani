<?php

include 'data.php';
$data = get_data();

function evaluate_equation($input_string) {
    $pattern = '/^([\+\-]?\d+)\s*([\+\-])\s*(\d+)\s*=\s*([\+\-]?\d+)$|^([\+\-]?\d+)\s*=\s*([\+\-]?\d+)\s*([\+\-])\s*(\d+)$/';
    preg_match($pattern, $input_string, $matches);

    if (count($matches) > 0) {
        if (!empty($matches[1])) {
            $left_operand = $matches[1];
            $operator = $matches[2];
            $right_operand = $matches[3];
            $result = $matches[4];
        } else {
            $left_operand = $matches[6];
            $right_operand = $matches[8];
            $operator = $matches[7];
            $result = $matches[5];
        }

        switch ($operator) {
            case '+':
                $calculated_result = $left_operand + $right_operand;
                break;
            case '-':
                $calculated_result = $left_operand - $right_operand;
                break;
        }

        if ($calculated_result == $result) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

foreach($data as $record) {
    if(evaluate_equation($record['calculation'])) {
        echo $record['calculation'] . "<br>";
    }
}
