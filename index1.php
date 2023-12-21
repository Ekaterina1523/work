<?php
function getfullnamefromparts($lastname, $firstname, $middlename) {
	return "$lastname $firstname $middlename";
}

function getgenderfromname($fullname) {
	$name_parts = explode(' ', $fullname);
	$middlename = end($name_parts);

	if (mb_substr($middlename, -2) == 'ва' || mb_substr($middlename, -2) == 'на') {
		return 'female';
	} else {
		return 'male';
	}
}
function getperfectpartner($lastname, $firstname, $middlename, $persons_array) {
	$lastname = mb_strtolower($lastname);
	$firstname = mb_strtolower($firstname);
	$middlename = mb_strtolower($middlename);
	$fullname = getfullnamefromparts($lastname, $firstname, $middlename);
	$gender = getgenderfromname($fullname);
	$perfect_partner = '';
	$compatibility_percent = 0;

	foreach ($persons_array as $person) {
		$person_gender = getgenderfromname($person['fullname']);

		if ($gender != $person_gender) {
			$compatibility_percent = mt_rand(0, 100) / 100;
			$partner_fullname = getfullnamefromparts(
				$person['lastname'],
				$person['firstname'],
				$person['middlename']
			);

			$perfect_partner = "$fullname + $partner_fullname = \n♡ идеально на " .
			    ceil($compatibility_percent * 100) . "% ♡";
			break;
		}
	}

	return $perfect_partner;
}

$example_persons_array = [
    [
        'lastname' => 'Иванов',
        'firstname' => 'Александр',
        'middlename' => 'Александрович'
    ],
    [
        'lastname' => 'Степанова',
        'firstname' => 'Наталья',
        'middlename' => 'Степановна'
    ],
    [
        'lastname' => 'Пащенко',
        'firstname' => 'Владимир',
        'middlename' => 'Александрович'
    ],
    [
        'lastname' => 'Громов',
        'firstname' => 'Александр',
        'middlename' => 'Иванович'
    ],
    [
        'lastname' => 'Славин',
        'firstname' => 'Семён',
        'middlename' => 'Сергеевич'
    ],
    [
        'lastname' => 'Цой',
        'firstname' => 'Владимир',
        'middlename' => 'Антонович'
    ],
    [
        'lastname' => 'Быстрая',
        'firstname' => 'Юлия',
        'middlename' => 'Сергеевна'
    ],
    [
        'lastname' => 'Шматко',
        'firstname' => 'Антонина',
        'middlename' => 'Сергеевна'
    ],
    [
        'lastname' => 'аль-Хорезми',
        'firstname' => 'Мухаммад',
        'middlename' => 'ибн-Муса'
    ],
    [
        'lastname' => 'Бардо',
        'firstname' => 'Жаклин',
        'middlename' => 'Фёдоровна'
    ],
    [
        'lastname' => 'Шварцнегер',
        'firstname' => 'Арнольд',
        'middlename' => 'Густавович'
    ],
];

$result = getperfectpartner($lastname, $firstname, $middlename, $example_persons_array);
echo $result;
?>

