<?php
require ('database.php');
// select (ЧТО ВЫБИРАЕМ) FROM {ОТКУДА ВЫБИРАЕМ} {WHERE {ЧТО-ТО} {УСЛОВИЕ} {ЧТО-ТО} }
// SELECT  * FROM (БЕЗ КОВЫЧЕК)
$query = "SELECT * FROM authors";
$result = mysqli_query($db,$query);
//$num = mysqli_num_rows($result);
for ($i = 0; $i<mysqli_num_rows($result); $i++) {
    $result_arr = mysqli_fetch_assoc($result);
    echo '<li>' . "Имя: " . $result_arr['name'] . ' ' . "Фамилия: " . $result_arr['surname'];
}



//$query = "INSERT INTO `authors` (`name`, `surname`, `birth`) VALUES ('тоука', 'калековна', '1799-06-06')";
//mysqli_query($db, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="get" action="">
    <input type="text" name="name" placeholder="Введите имя">
    <input type="password" name="pass" placeholder="Введите пароль"><br>
    <input type="text" name="surname" placeholder="Введите фамилию"><br>
    <input type="text" name="phone" placeholder="Введите телефон"><br>
    <input type="text" name="email" placeholder="Введите e-mail"><br>
    <input type="date" name="date" placeholder="Введите дату рождения"><br>
    <input type="text" name="login" placeholder="Введите login"><br>
    <input type= "submit" value="Отправить"> <br>
    <input type="text" name="id" placeholder="Введите id"><br>

</form>
</body>
</html>
<?php

$name= htmlspecialchars(addslashes($_GET['name']));
$surname= htmlspecialchars(addslashes($_GET['surname']));
$phone= htmlspecialchars(addslashes($_GET['phone']));
$pass = htmlspecialchars(addslashes($_GET['pass']));
$email = htmlspecialchars(addslashes($_GET['email']));
$date = htmlspecialchars(addslashes($_GET['date']));
$log = htmlspecialchars(addslashes($_GET['login']));

$query = "INSERT INTO `users` (`name`, `surname`, `birth`, `phone`, `email`, `password`, `login`) VALUES ('$name', '$surname', '$date', '$phone', '$email', '$pass', '$log')";
mysqli_query($db, $query);
$ghost = "SELECT * FROM users";
$result = mysqli_query($db,$ghost);
echo '<table border = "1" >' . '<td>' . '<td>' . 'Имя'. '</td>' . '<td>' . 'Фамилия'. '</td>' . '<td>' . 'Номер'. '</td>'. '<td>' . 'e-mail'. '</td>'.'<td>'. ' Логин ' . '</td>' .  '</tr>';
for ($i = 0; $i<mysqli_num_rows($result); $i++) {
    $result_arr = mysqli_fetch_assoc($result);
    echo  '<td>'. '<td>'  . $result_arr['name'] . '</td>' . '<td>'  . $result_arr['surname'] . '</td>' . '<td>' . $result_arr['phone'] . '</td>' . '<td>'  . $result_arr['email']  . '</td>' . '<td>'  . $result_arr['login'] . '</td>'. '<td>' .' <p><a href = "useredit.php?id={id}">РЕДАКТИРОВАТЬ</a></p>'  .'</td>' . '</tr>' ;
}

echo '</table>';
$mom = "SELECT DISTINCT name from users";
$rem = mysqli_query($db, $mom);
for ($i = 0; $i<mysqli_num_rows($rem); $i++) {
    $rem_arr = mysqli_fetch_assoc($rem);
    echo $rem_arr['name'] .'<br>';
}
$num = "SELECT SUM(pages) as paa from books";
$page = mysqli_query($db, $num);
for ($i = 0; $i<mysqli_num_rows($page); $i++) {
    $page_arr = mysqli_fetch_assoc($page);
    echo $page_arr['paa'] .'<br>';
}
?>