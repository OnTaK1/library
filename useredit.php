<?php
require ('database.php');
if (count($_POST) > 0) {
    updateUser();
}
function getUserById(): void
{
    global $db;
    $id = htmlspecialchars(addslashes($_GET['id']));
    if (!empty($id)) {
        $result = mysqli_query($db, "SELECT * FROM users EHERE id = " . $id);
        if((mysqli_num_rows($result)) > 0) {
            $user = mysqli_fetch_assoc($result);
        } else {
            die ("Пользователь не найден");
        }


    }  else {
        die('Не задан id пользователя');
    }

}
function updateUser():void {
    global $id;
    global $db;
    $name= htmlspecialchars(addslashes($_GET['name']));
    $surname= htmlspecialchars(addslashes($_GET['surname']));
    $phone= htmlspecialchars(addslashes($_GET['phone']));
    $email = htmlspecialchars(addslashes($_GET['email']));
    $date = htmlspecialchars(addslashes($_GET['date']));
    if(!empty($name) && !empty ($surname) && !empty($date) && !empty($phone) && !empty($email));
    {
        $query = "UPDATE users SET name = '$name', surname = '$surname', date = '$date', phone = '$phone', email = '$email'";
    }
}
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
    <input type="text" name="name" value="" placeholder="Введите имя">
    <input type="password" name="pass" placeholder="Введите пароль"><br>
    <input type="text" name="surname" placeholder="Введите фамилию"><br>
    <input type="text" name="phone" placeholder="Введите телефон"><br>
    <input type="text" name="email" placeholder="Введите e-mail"><br>
    <input type="date" name="date" placeholder="Введите дату рождения"><br>
    <input type= "submit" value="Отправить"> <br>
</form>
</body>
</html>