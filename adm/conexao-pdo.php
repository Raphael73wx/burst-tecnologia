<?php

define('username','root');
define('password','');
try {
    $coon = new PDO('mysql:host=localhost;
    dbname=burst',
    username,
    password
);
} catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    exit;
}  


?>
