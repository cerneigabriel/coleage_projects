<?php

const EMAIL_REGEX = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
const PHONE_REGEX = '/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/';

function validateData(array $data)
{
    $first_name = !isset($data["first_name"]) || is_null($data["first_name"]) || empty($data["first_name"]);

    $last_name = !isset($data["last_name"]) || is_null($data["last_name"]) || empty($data["last_name"]);

    $city = !isset($data["city"]) || is_null($data["city"]) || empty($data["city"]);

    $email = !isset($data["email"]) || is_null($data["email"]) || empty($data["email"]);
    $email = $email || !preg_match(EMAIL_REGEX, $data["email"]);

    $phone = !isset($data["phone"]) || is_null($data["phone"]) || empty($data["phone"]);
    $phone = $phone || !preg_match(PHONE_REGEX, $data["phone"]);

    $gender = !isset($data["gender"]) || is_null($data["gender"]) || empty($data["gender"]);

    $errors = [];

    if ($first_name) $errors[] = "Numele este obligatoriu";
    if ($last_name) $errors[] = "Prenumele este obligatoriu";
    if ($city) $errors[] = "Orasul este obligatoriu";
    if ($email) $errors[] = "Verificati email-ul dvs.";
    if ($phone) $errors[] = "Verificati telefonul dvs.";
    if ($gender) $errors[] = "Genul este obligatoriu";

    return $errors;
}
