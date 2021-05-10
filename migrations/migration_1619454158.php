<?php
function up1619454158()
{ 
return [
    "CREATE TABLE test_table (
  id int AUTO_INCREMENT PRIMARY KEY, 
  name varchar(50),
  description text,
  birth date     
)",
    "INSERT INTO `test_table` (`name`, `description`, `birth`) VALUES ('test', 'blabla', ' 2020-02-01')"
];
    echo 'mom';
}
function down1619454158()
{
return [
"DROP TABLE test_table"
];
}