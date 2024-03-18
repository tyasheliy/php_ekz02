<?php

require_once(__DIR__ . '/src/index.php');

if (!Auth::checkCookie()) {
    die();
}

$bookId = isset($_POST['id']) ? $_POST['id'] : null;

if ($bookId === null) {
    echo "Идентификатор не введен!";
    return;
}

$userId = $_COOKIE['user'];
$studentId = null;
$libraryCardId = null;
$users = DB::read('users', ['id', 'student_id']);

foreach ($users as $user) {
    if ($user['id'] == $userId) {
        $studentId = $user['student_id'];
    }
}

if ($studentId === null) {
    echo "Ошибка чтения пользователя!";
    return;
}

$libraryCards = DB::read('library_cards', ['id', 'student_id']);

foreach ($libraryCards as $libraryCard) {
    if ($libraryCard['student_id'] == $studentId) {
        $libraryCardId = $libraryCard['id'];
    }
}

if ($libraryCardId === null) {
    echo "Читательский билет не существует!";
    return;
}

$books = DB::read('books', ['*']);
$bookExists = false;

foreach ($books as $book) {
    if ($book['id'] == $bookId) {
        $bookExists = true;
    }
}

if (!$bookExists) {
    echo "Такой книги не сущетсвует!";
    return;
}

try {
    DB::create('booked_books', [
       'book_id' => $bookId,
        'library_card_id' => $libraryCardId,
        'booked_book_status_id' => 1
    ]);
} catch (Throwable $e) {
    echo "Произошла неизвестная ошибка!";
    return;
}

echo "Книга успешно забронирована!";

endScript();