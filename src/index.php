<?php

$con = new mysqli('mysql_db', 'root', 'root', 'mysql');

echo "<pre>";
var_dump(getenv(null));

if($con)
{
    echo "Connection OK";
}
 
?>