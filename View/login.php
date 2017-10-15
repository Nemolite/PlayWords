<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../View/assets/mystyle.css">

</head>
<body>


<div class="container">

    <form class="form-signin" role="form" method="post" action="">
        <h3 class="form-signin-heading" style="text-align: center;">Добро пожаловать в  "Play of Words"</h3>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ваш логин" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Запомнить меня
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Играть</button>
        <p></p>
        <p><a href="/register">Зарегистрироваться</a>&nbsp;&nbsp;&nbsp;<a href="/">В следующий раз</a></p>
    </form>

</div> <!-- /container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>