<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../View/assets/mystyle.css">

</head>
<body>
<div class="header">
<h1>Добро пожаловать! </h1>
    <p>тестовое задание №1</p>
    <h2>Игра в Слова</h2>
</div>
<div class="rules">
    <h4>Правила очень простые</h4>
    <p>Компьютер и игрок по очереди пишут слова, каждое слово
        должно начинаться на ту же букву, что и заканчивается предыдущее.
        Проигрывает тот, кто не может предложить ни одного варианта.
        Если предыдущее слово заканчивается на «ь»,
        то следующее слово должно начинаться с предпоследней буквы
        предыдущего слова. Например компьютер:«морковь» -  игрок:«вишня»
        Во время одной игры слова повторяться не должны.
        Слово не принимается в случаях, если оно
         короче трех букв,
         содержит только гласные,
         только согласные
         или больше трех подряд гласных или согласных букв,
         содержит какие-либо символы, кроме символов русского алфавита

    </p>
    <button type="button" class="btn btn-primary" id="Login">Вход</button>
    <button type="button" class="btn btn-success" id="Register">Регистрация</button>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<script src="../View/assets/script.js"></script>
</body>
</html>