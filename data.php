<?php

function get_data() {

    $url = 'https://www.digilabs.cz/hiring/data.php';
    $data = file_get_contents($url);
    $json = json_decode($data, true);

    // Kontrola zpracovani JSON
    if ($json === null) {
        die('Error decoding JSON');
    }
    return $json;
}





