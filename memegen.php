<?php

include_once "data.php";
$data = get_data();

// Ziskani nahodneho chuck norris vtipu
function get_joke($data) {
    $data_length = count($data);
    $joke_i = random_int(0, $data_length);
    $joke = $data[$joke_i]['joke'];

    while(strlen($joke) > 120) {
        $joke_i = random_int(0, $data_length);
        $joke = $data[$joke_i]['joke'];
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
$text_color = imagecolorallocate($meme, 0, 0, 0);
$background_color = imagecolorallocate($meme, 255, 255, 255);
$text_size_up = imagettfbbox($font_size, 0, 'fonts/arial.ttf', $joke[0]);
$text_size_down = imagettfbbox($font_size, 0, 'fonts/arial.ttf', $joke[1]);

// Umisteni textu nahore
$text_height = abs($text_size_up[7] - $text_size_up[1]);
$x_up = (imagesx($meme) - $text_size_up[2]) / 2 ;
$y_up = 70;

// Vykresleni bilyho pozadi
$background_width = $text_size_up[2] + 1000;
$background_height = $text_size_up[5] + 150;
$background_x_up = 0;
$background_y_up = 0;
$background_x_down = 0;
$background_y_down = (imagesy($meme) - 100);

imagefilledrectangle($meme, $background_x_up, $background_y_up, $background_x_up + $background_width, $background_y_up + $background_height, $background_color);
imagefilledrectangle($meme, $background_x_down, $background_y_down, $background_x_down + $background_width, $background_y_down + $background_height, $background_color);

// Pridani horniho textu do obrazku
imagettftext($meme, $font_size, 0, $x_up, $y_up, $text_color, 'fonts/arial.ttf', $joke[0]);

// Umisteni textu dole
$x_down = (imagesx($meme) - $text_size_down[2]) / 2;
$y_down = (imagesy($meme) - 40);

// Pridani dolniho textu do obrazku
imagettftext($meme, $font_size, 0, $x_down, $y_down, $text_color, 'fonts/arial.ttf', $joke[1]);

header('Content-Type: image/jpeg');
imagejpeg($meme);