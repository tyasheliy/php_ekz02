<?php
require_once(__DIR__ . '/src/index.php');

if (!Auth::checkCookie()) {
    die();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Библиотека</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
    <div class="main-container">
    <?php
    echo Table::render('books');
    ?>
        <div>
            <div>
                <h4>Бронирование книги</h4>
            </div>
            <form action="book.php" method="POST">
                <label for="id">Уникальный идентификатор книги:</label>
                <input type="number" name="id"/>
                <button type="submit">Забронировать</button>
            </form>
        </div>
    </div>
    </body>
</html>
<?php

endScript();

?>