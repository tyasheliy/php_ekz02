<?php

require_once(__DIR__ . '/src/index.php');

$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if ($login === null || $password === null) {
    echo "Введены не все требуемые поля!";
    return;
}

if (!Auth::login($login, $password)) {
    echo "Неверный логин или пароль!";
    return;
}

echo "Успешная авторизация! <a href='main.php'>Перейти к главному окну</a>";

endScript();