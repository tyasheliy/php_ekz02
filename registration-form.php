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
    <form action="registration.php" method="POST" class="form">
        <input type="text" name="login" placeholder="Логин:" required/>
        <input type="text" name="password" placeholder="Пароль: " required/>
        <input type="text" name="secondname" placeholder="Фамилия: " required/>
        <input type="text" name="firstname" placeholder="Имя: " required/>
        <input type="text" name="middlename" placeholder="Отчество: " required/>
        <input type="text" name="group" placeholder="Группа: " required/>
        <button type="submit">Регистрация</button>
    </form>
</div>

</body>
</html>