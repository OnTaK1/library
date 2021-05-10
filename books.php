
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
    <input type="text" name="aut" placeholder="Введите автора">
    <input type= "submit" value="Отправить"> <br>

</form>
</body>
</html>
<?php
require ('database.php');
$page = htmlspecialchars(addslashes($_GET['page'] ?? 1));
$num_page = 3;
$fir = $page * $num_page - $num_page;
$ghost = "SELECT * FROM books ORDER BY name ASC LIMIT $fir, $num_page";
$result = mysqli_query($db,$ghost);

echo '<table border = "1" >' . '<tr>' . '<td>' . 'Имя книги'. '</td>' . '<td>' . 'Имя автора'. '</td>'. '</tr>';
    for ($i = 0; $i<mysqli_num_rows($result); $i++) {
        $result_arr = mysqli_fetch_assoc($result);

        $res = mysqli_query($db, "SELECT * FROM authors WHERE id = " . $result_arr['author_id']);
        $res_arr = mysqli_fetch_assoc($res);

        echo  '<tr>'. '<td>'  . $result_arr['name'] . '</td>' . '<td>'  . $res_arr['name'] . '</td>' . '</tr>' ;
    }
$nolim = "SELECT * FROM books as t1 
    INNER JOIN authors as t2 ON t1.author_id = t2.id ORDER BY t1.name ASC";
$res = mysqli_query($db,$nolim);
$num = mysqli_num_rows($res) / 2;
$firstpage = $page + 1;
$secondpage = $page - 1;
for ($i = 1; $i<=$num; $i++) {
    echo "<a href='?page=$i'>$i</a>";

}

$aut = htmlspecialchars(addslashes($_GET['aut']));
$auth = "SELECT * FROM books as y1
    INNER JOIN authors as y2 ON y1.author_id = y2.id WHERE y2.name LIKE '%$aut%'";
$rek = mysqli_query($db,$auth);
echo '<table border = "1" >' . '<tr>' . '<td>' . 'Имя книги'. '</td>' . '<td>' . 'Имя автора'. '</td>'. '</tr>';
for ($i = 0; $i<mysqli_num_rows($rek); $i++) {
    $rek_arr = mysqli_fetch_assoc($rek);
    echo  '<tr>'. '<td>'  . $result_arr['name'] . '</td>' . '<td>'  . $rek_arr['name'] . '</td>' . '</tr>' .'<br>';
}
$au = "SELECT authors.name, COUNT(books.id) as count from books
inner JOIN authors on authors.id = books.author_id
GROUP By authors.id ";
$aau = mysqli_query($db,$au);
echo '<table border = "1" >' . '<tr>' . '<td>' . 'Имя книги'. '</td>' . '<td>' . 'Имя автора'. '</td>'. '</tr>';
for ($i = 0; $i<mysqli_num_rows($aau); $i++) {
    $aau_arr = mysqli_fetch_assoc($aau);
    echo  '<tr>'. '<td>'  . $aau_arr['name'] . '</td>' . '<td>'  . $aau_arr['count']. '</td>' . '</tr>' .'<br>';
}
//echo '</table> <a href="http://localhost/library/books.php?page=' . $secondpage. '">' . $secondpage .'</a>';
//echo '</table> <a href="http://localhost/library/books.php?page=' . $page. '">' . 'Вы тут' .'</a>';
// echo '</table> <a href="http://localhost/library/books.php?page=' . $firstpage. '">' . $firstpage .'</a>';



