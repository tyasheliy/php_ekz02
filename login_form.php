<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Авторизация</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>

    <div class="main-container">
        <div class="page-header-container">
            <h4>Библиотека</h4>
        </div>
        <form action="login.php" method="POST" class="form">
            <input type="text" name="login" placeholder="Логин:" required/>
            <input type="text" name="password" placeholder="Пароль: " required>
            <button type="submit">Войти</button>
            <a href="registration-form.php">Регистрация</a>
        </form>
    </div>

    </body>
</html>