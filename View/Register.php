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
<h1>Регистрация нового игрока</h1>
</div>
<div class="form_reg">
    <form name="reg_form" id="reg_form" action="/register" method="post">

        <fieldset class="form-group">
            <label for="exampleInputLogin">Логин</label>
            <input type="text" class="form-control" id="exampleInputLogin" name="regname" placeholder="Login">
        </fieldset>
        <fieldset class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pwd1"
                   placeholder="Пароль">

        </fieldset>
        <fieldset class="form-group">
             <input type="password" class="form-control" id="exampleInputPassword2" name="pwd2"
                   placeholder="Подтвердите пароль">
            <small class="text-muted">Повторите ввод пароля</small>
        </fieldset>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <button type="button" class="btn btn-warning" id="Index">Нет не хочу</button>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<script src="../View/assets/script.js"></script>
</body>
</html>