<?php
function getgenderfromname($fullname) {
	$parts = getpartsfromfullname($fullname);
	$gender = 0;
	if (endsWith($parts['patronymic'], 'вна')) {
		$gender = $gender - 1;
	}
	if (endsWith($parts['name'], 'а')) {
		$gender = $gender - 1;
	}
	if (endsWith($parts['surname'], 'ва')) {
		$gender = $gender - 1;
	}

	if (endsWith($parts['patronymic'], 'ич')) {
		$gender = $gender + 1;
	}
	if (endsWith($parts['name'], 'й') || endsWith($parts['name'], 'н')) {
		$gender = $gender + 1;
	}
	if (endsWith($parts['surname'], 'в')) {
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

function endsWith($str, $suffix) {
	return substr($str, -strlen($suffix)) === $suffix;
}


