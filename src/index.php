<?php

echo "hello world a";

$con = new mysqli('mysql_db', 'root', 'root', 'mysql');

if($con)
{
    echo "OK6";
}

?>