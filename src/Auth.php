<?php

require_once(__DIR__ . '/DB.php');
require_once(__DIR__ . '/DBHelper.php');

class Auth
{
    public static function init()
    {
        try {
            DB::query('CREATE TABLE users (id int primary key AUTO_INCREMENT, login varchar(255) unique, password varchar(255), student_id int not null)');
        } catch (Throwable $e) {
            return;
        }
    }

    public static function login(string $login, string $password): bool
    {
        $users = DB::read('users', ['*']);

        foreach ($users as $user) {
            if ($user['login'] == $login
                && $user['password'] == $password) {
                setcookie('user', $user['id']);
                return true;
            }
        }

        return false;
    }

    public static function checkCookie(): bool
    {
        if (!isset($_COOKIE['user'])) {
            return false;
        }

        $users = DB::read('users', ['id']);

        foreach ($users as $user) {
            if ($user['id'] == $_COOKIE['user']) {
                return true;
            }
        }

        return false;
    }

    public static function register(string $login, string $password, int $studentId): void
    {
        DB::create('users', [
            'login' => DBHelper::string($login),
            'password' => DBHelper::string($password),
            'student_id' => $studentId
        ]);
    }
}