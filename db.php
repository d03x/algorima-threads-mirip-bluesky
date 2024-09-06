<?php

try{
    $connect = new mysqli('localhost',"root","root","threads_eg");
}catch(mysqli_sql_exception $e) {
    die($e->getMessage());
}