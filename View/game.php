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

    <h1> "PlayWords"!</h1>

    <div class="main">
        <div class="left">
        <h3>Ваши ходы</h3>
            <p id="result_user"></p>

        </div>
        <div class="right">
            <h3>Computer</h3>
            <p id="result_computer"></p>

        </div>

    </div>


</div>

<div class="stroke">
    <form class="formstyl" name="wordform" action="" method="post">
        <lable for="bit">Ваш ход</lable>
        <input class="inputstyl" type="text" name="word" id="bit" value="Введите слово"/>
        <button type="submit" class="btn btn-primary" onclick="javascript:send()">Сделать ход</button>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<script src="../View/assets/script.js"></script>
</body>
</html>