<?php
// helpers
function string_vowels(string $string)
{
    return implode('', array_intersect(str_split($string), ["A", 'a', "E", 'e', "I", 'i', "O", 'o', "U", 'u']));
}

function string_consonants(string $string)
{
    return implode('', array_intersect(str_split($string), ["B", "b", "C", "c", "D", "d", "F", "f", "G", "g", "H", "h", "J", "j", "K", "k", "L", "l", "M", "m", "N", "n", "P", "p", "Q", "q", "R", "r", "S", "s", "T", "t", "V", "v", "W", "w", "X", "x", "Y", "y", "Z", "z",]));
}

function number_digits(int $number)
{
    $digits = [];
    while ($number != 0) {
        $digits[] = $number % 10;
        $number = (int)($number / 10);
    }

    return array_reverse($digits);
}

function string_numbers(string $string)
{
    return preg_replace('![^1-9]+!', '', html_entity_decode($string, ENT_QUOTES, 'UTF-8'));
}

function count_digits(string $string)
{
    return strlen(string_numbers($string));
}

function string_capitals(string $string)
{
    return preg_replace('![^A-Z]+!', '', html_entity_decode($string, ENT_QUOTES, 'UTF-8'));
}

function count_capitals(string $string)
{
    return strlen(string_capitals($string));
}

function string_even_digits(string $string)
{
    $number = preg_replace('![^1-9]+!', '', html_entity_decode($string, ENT_QUOTES, 'UTF-8'));
    $digits = number_digits($number);

    return array_filter($digits, function ($value) {
        return $value % 2 === 0;
    });
}

function count_even_digits(string $string)
{
    return count(string_even_digits($string));
}

function count_special_characters(string $string)
{
    return preg_match_all('/\X/u', html_entity_decode($string, ENT_QUOTES, 'UTF-8'));
}

function replace_in_string(string $type, string $replace_with, string $string)
{
    switch ($type) {
        case "numbers":
            return str_replace(number_digits((int)string_numbers($string)), "+", $string);
            break;
        case "vowels":
            return str_replace(str_split(string_vowels($string)), " ", $string);
            break;
        case "capitals":
            return str_replace(str_split(string_capitals($string)), "8", $string);
            break;
        default:
            return $string;
            break;
    }
}
//=========

function ex_1(array $request)
{
    $string = $request['string'];

    return array(
        "capitals_count" => [
            "title" => "Numarul de majuscule din sir",
            "value" => count_capitals($string),
        ],
        "digits_count" => [
            "title" => "Numarul de cifre din sir",
            "value" => count_digits($string),
        ],
        "special_characters" => [
            "title" => "Numarul de caractere speciale",
            "value" => count_special_characters($string),
        ],
        "even_digits_count" => [
            "title" => "Numarul de cifre pare citite",
            "value" => count_even_digits($string),
        ]
    );
}

function ex_2(array $request)
{
    $string = $request['string'];

    return array(
        "replace_digits_with_plus" => [
            "title" => "Cifrele din sir cu semnul +",
            "value" => replace_in_string("numbers", "+", $string),
        ],
        "replace_vowels_with_space" => [
            "title" => "Vocalele din sir cu spatiu",
            "value" => replace_in_string("vowels", " ", $string),
        ],
        "replace_capitals_with_8" => [
            "title" => "Majusculele din sir cu cifra 8",
            "value" => replace_in_string("capitals", "8", $string),
        ]
    );
}

function ex_3(array $request)
{
    $string = $request['string'];

    return array(
        "digits" => [
            "title" => "Doar cifrele din sir",
            "value" => string_numbers($string),
        ],
        "replace_vowels_with_space" => [
            "title" => "Fiecarea cuvant din rand nou",
            "value" => str_split($string),
        ],
        "replace_capitals_with_8" => [
            "title" => "Doar consoanele din sir",
            "value" => string_consonants($string),
        ],
        "even_digits" => [
            "title" => "Toate cifrele cu exceptia celor divizibile cu 3",
            "value" => implode("", string_even_digits($string)),
        ]
    );
}



$request = $_POST;

echo json_encode(call_user_func($request['function_name'], $request));
