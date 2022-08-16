<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getPartsFromfullName($fullName) {
    $arr_keys = ['surname', 'name', 'patronymic'];
    $namePats = explode(' ', $fullName);
    return array_combine($arr_keys, $namePats);
}

function getfullNameFromPart($surname, $name, $patronymic) {
    $fullName = $surname . ' ' . $name . ' ' . $patronymic;
    return $fullName;
}

function getShortName($fullName) {
    $nameParts = getPartsFromfullName($fullName);
    return $nameParts['name'] . ' ' . mb_strtoupper(mb_substr($nameParts ['surname'], 0, 1)) . '.';
}

function getGenderFromName($fullName) {
    $gender = 0;
    $nameParts = getPartsFromfullName($fullName);

    if (mb_substr($nameParts['surname'], -2, 2) === 'ва') {
        --$gender;
    }

    if (mb_substr($nameParts['surname'], -1, 1) === 'в') {
        ++$gender;
    }

    if (mb_substr($nameParts['name'], -1, 1) === 'а') {
        --$gender;
    }

    if (mb_substr($nameParts['name'], -1, 1) === 'й' || (mb_substr($nameParts['surname'], -1, 1) === 'н')) {
        ++$gender;
    }

    if (mb_substr($nameParts['surname'], -3, 3) === 'вна') {
        --$gender;
    }

    if (mb_substr($nameParts['surname'], -2, 2) === 'ич') {
        ++$gender;
    }

    return $gender <=> 0; // 1 - male, -1 female, 0 - not recognized
}