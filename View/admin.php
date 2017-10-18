<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../View/assets/admin.css">

</head>
<body>

<nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
    <button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">PlayWords</a>
    <div id="navbar">
        <nav class="nav navbar-nav pull-xs-left">
            <a class="nav-item nav-link" href="/admin">Панель управления</a>
            <a class="nav-item nav-link" href="/game">Играть</a>
            <a class="nav-item nav-link" href="/">Выход</a>
        </nav>
        <form class="pull-xs-right">
            <input type="text" class="form-control" placeholder="Поиск слова...">
        </form>
    </div>
</nav>



<div class="container-fluid">
    <div class="row">
     <!--
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Игроки<span class="sr-only">(current)</span></a></li>
                <li><a href="#">База слов</a></li>
            </ul>

        </div>

        -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Панель управления</h1>



            <h2>База слов</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Слова</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $key;?></td>
                        <td>Удалить</td>

                    </tr>
                    <tr>
                        <td><?= $sql_admin[2][words];?></td>
                        <td>Удалить</td>

                    </tr>
                    <tr>
                        <td><?=  $sql_admin[3][words];?></td>
                        <td>Удалить</td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
echo "<pre>";
print_r($array_data);
echo "</pre>";


?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<script src="../View/assets/script.js"></script>
</body>
</html>
