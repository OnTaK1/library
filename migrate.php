<?php

require 'database.php';

$migrations = scandir('migrations');
unset($migrations[0]);
unset($migrations[1]);

foreach ($migrations as $migration) {
    if (shouldQuery($migration)) {
        require_once('migrations/' . $migration);

        $time = getTime($migration);

        $queries_up = ('up' . $time)();
        $queries_down = ('down' . $time)();

        $error_key = null;
        foreach ($queries_up as $key => $query) {
            mysqli_query($db, $query);
            if ($error = mysqli_error($db) !== '') {
                echo 'При выполнении запроса вознила ошибка ' . $error;
                $error_key = $key;
            }
        }

        if ($error_key !== null) {
            for ($i = 0; $i < $error_key; $i++) {
                mysqli_query($db, $queries_down[$i]);
            }
        } else {
            mysqli_query($db, "INSERT INTO `migrations` (`name`) VALUES ('$migration')");
            echo 'Миграция ' . $migration . ' Успешно установлена';
        }
    }
}

function getTime(string $filename): string
{
    $time = str_replace('migration_', '', $filename);
    $time = str_replace('.php','', $time);
    return $time;
}
function shouldQuery(string $migration): bool
{
    global $db;
    $result = mysqli_query($db, "SELECT * FROM migrations WHERE name = '$migration'");
    return mysqli_num_rows($result) === 0 ? true : false;
}