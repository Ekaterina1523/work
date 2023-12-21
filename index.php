<?php
function getshortname($fullname) {
    $parts = getpartsfromfullname($fullname);
    $surname_short = mb_substr($parts['surname'], 0, 1) . '.';
    return $parts['name'] . ' ' . $surname_short;
}
function getpartsfromfullname($fullname) {
    $words = explode(' ', $fullname);
    $parts = [
        'surname' => '',
        'name' => '',
        'patronymic' => ''
    ];
    $parts['surname'] = $words[0];
    $parts['name'] = $words[1];
    $parts['patronymic'] = $words[2];
    return $parts;
}
$fullname = 'Иванов Иван Иванович';
$shortname = getshortname($fullname);

echo $shortname;