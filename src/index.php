<?php

require_once(__DIR__ . '/Auth.php');
require_once(__DIR__ . '/DB.php');
require_once(__DIR__ . '/Table.php');
require_once(__DIR__ . '/DBHelper.php');

$conn = new mysqli(
    'localhost',
    'root',
    'root',
    'php',
    '8889'
);

DB::setConnection($conn);

Auth::init();

function endScript() {
    DB::closeConnection();
}