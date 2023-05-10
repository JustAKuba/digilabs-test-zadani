<?php

include_once "data.php";

$data = get_data();

// Ziskani nahodneho chuck norris vtipu
function get_joke($data) {
    $data_length = count($data);
    $joke_i = random_int(0, $data_length);
    $joke = $data[$joke_i]['joke'];

    if(strlen($joke)>120) {
        get_joke($data);
    }
    return $joke;
}

function divide_joke($joke)
{
    $strings = explode(" ", $joke);
    $total_words = count($strings);
    $middle_index = floor($total_words / 2);

    $first_half = '';
    $second_half = '';

    for($i = 0; $i<$middle_index; $i++) {
        $first_half .= $strings[$i] . " ";
    }

    for($i = $middle_index; $i<count($strings); $i++) {
        $second_half .= $strings[$i] . " ";
    }

    return [$first_half, $second_half];
}

$joke = divide_joke(get_joke($data));


// Generace obrazku
$image_url = "https://www.digilabs.cz/hiring/chuck.jpg";
$image_content = file_get_contents($image_url);
$meme = imagecreatefromstring($image_content);

// Nastaveni textu
$font_size = 25;
$text_color = imagecolorallocate($meme, 255, 255, 255);
$text_size = imagettfbbox($font_size, 0, 'arial.ttf', $joke[0]);

// Umisteni textu nahore
$text_height = abs($text_size[7] - $text_size[1]);
$x_up = (imagesx($meme) - $text_size[2]) / 2;
$y_up = 40;

// Pridani horniho textu do obrazku
imagettftext($meme, $font_size, 0, $x_up, $y_up, $text_color, 'fonts/arial.ttf', $joke[0]);


// Umisteni textu dole
$x_down = (imagesx($meme) - $text_size[2]) / 2;
$y_down = (imagesy($meme) - 40);

// Pridani dolniho textu do obrazku
imagettftext($meme, $font_size, 0, $x_down, $y_down, $text_color, 'fonts/arial.ttf', $joke[1]);








header('Content-Type: image/jpeg');
imagejpeg($meme);









