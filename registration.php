<?php

require_once(__DIR__ . '/src/index.php');

$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$secondname = isset($_POST['secondname']) ? $_POST['secondname'] : null;
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
$middlename = isset($_POST['middlename']) ? $_POST['middlename'] : null;
$group = isset($_POST['group']) ? $_POST['group'] : null;

if (
    $login === null ||
    $password === null ||
    $secondname === null ||
    $firstname === null ||
    $group === null
) {
    echo "Введены не все требуемые данные!";
    return;
}

$studentId = null;
$groupId = null;
$groups = DB::read('groups', ['*']);
$students = DB::read('students', ['*']);

foreach ($groups as $g) {
    if ($g['name'] == $group) {
        $groupId = $g['id'];
    }
}

if ($groupId === null) {
    echo "Группа не найдена!";
    return;
}

foreach ($students as $student) {
    if (
       $student['firstname'] == $firstname &&
       $student['secondname'] == $secondname &&
       $student['group_id'] == $groupId
    ) {
        $studentId = $student['id'];
    }
}

if ($studentId === null) {
    echo "Студент не найден!";
    return;
}

$libraryCards = DB::read('library_cards', ['*']);

foreach ($libraryCards as $libraryCard) {
    if ($libraryCard['student_id'] == $studentId) {
        echo "Читательский билет уже зарегестрирован!";
        return;
    }
}

try {
    DB::create('library_cards', [
        'student_id' => $studentId
    ]);
    Auth::register($login, $password, $studentId);
} catch (Throwable $e) {
    echo "Произошла ошибка при регистрации читательского билета!";
    return;
}

echo "Успешная регистрация! <a href='login_form.php'>Вернуться к авторизации</a>";

endScript();