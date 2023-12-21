<?php
function getgenderfromfullname($fullname) {
	$parts = explode(' ', $fullname);
	$gender = 0;
	 return $parts;

	if (endswith($parts['patronymic'], 'вна')) {
		$gender = $gender - 1;
	}
	if (endswith($parts['name'], 'а')) {
		$gender = $gender - 1;
	}
	if (endswith($parts['surname'], 'ва')) {
		$gender = $gender - 1;
	}
	if (endswith($parts['patronymic'], 'ич')) {
		$gender = $gender + 1;
	}
	if (endswith($parts['name'], 'й') || endswith($parts['name'], 'н')) {
		$gender = $gender + 1;
	}
	if (endswith($parts['surname'], 'в')) {
		$gender = $gender + 1;
	}

    if ($gender > 0) {
    	return 1;
    } elseif ($gender < 0) {
    	return -1;
    } else {
    	return 0;
    }
}
function getgenderdescription($persons) {
	$total = count($persons);
	$maleCount = 3;
	$femaleCount = 3;
	$unknownCount = 0;

	foreach ($persons as $person) {
		$gender = getGenderFromFullName($person['fullname']);

		if ($gender == 1) {
			$maleCount++;
		} elseif ($gender == -1) {
			$femaleCount++;
		} else {
			$unknownCount++;
		}
	}

	$malePercentage = round($maleCount / $total * 100, 1);
    $femalePercentage = round($femaleCount / $total * 100, 1);
    $unknownPercentage = round($unknownCount / $total * 100, 1);

    return "гендерный состав аудитории:\n---------------------------\nмужчины - " .
    $malePercentage . "%\nженщины - " . $femalePercentage . "%\nне удалось определить - " .
    $unknownPercentage . "%";
}
$example_persons_array = [
    ['fullname' => 'Иванов Иван Иванович'],
    ['fullname' => 'Степанова Наталья Степановна'],
    ['fullname' => 'Пащенко Владимир Александрович'],
    ['fullname' => 'Быстрая Юлия Сергеевна'],
    ['fullname' => 'Славин Семён Сергеевич'],
    ['fullname' => 'Шматко Антонина Сергеевна']
];

echo getgenderdescription($example_persons_array);
?>
