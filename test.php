<?php
$db = mysqli_connect('localhost', 'library', 'library123', 'library');
if (mysqli_connect_errno()) {
    die('Ошибка подключния к базе');
} else {
    mysqli_query($db, "SET NAMES'utf8'");
}
$query = "update authors set name = 'Анна', surname = 'Карпова' WHERE id = 1";
mysqli_query($db, $query);
/**
 *UPDATE {НАЗВАНИЕ ТАБЛИЦЫ} SET {ПОЛЕ, КОТОРОЕ МЕНЯЕМ} = {НОВОЕ ЗНАЧЕНИЕ} WHERE ...
 */



?>
