<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">

<div class="persons">
    <div class="persons_data">
        <code>
            <?php
            $randomNumber = mt_rand(0, count($persons_array) - 1);
            $person = $persons_array[$randomNumber];
            $nameParts = getPartsFromFullName($person['fullName']);
                    echo '<br>';
                    echo getFullNameFromPart('Иванов', 'Иван', 'Иванович');
                    echo '<br>';
                    echo getShortName($person['fullName']) . ' пол "' . getGenderFromName($person['fullName']) . '" (1 - мужчина, -1 - женщина, 0 - не удалось определить)';
                    echo '<br>';
            ?>
        </code>
    </div>
</div>

    
</body>
</html>