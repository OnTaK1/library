<?php
$db = mysqli_connect('localhost', 'library', 'library123', 'library');
if (mysqli_connect_errno()) {
    die('Ошибка подключния к базе');
} else {
    mysqli_query($db, "SET NAMES'utf8'");
}