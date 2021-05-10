<?php
require 'database.php';
$migration = "SELECT name FROM migrations by DESC LIMIT 1";
$result = mysqli_fetch_assoc($migration);
echo $result;
require_once('migrations/' . $result);
