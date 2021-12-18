<?php

try{


    $db=new PDO("mysql:host=localhost;dbname=c2cproje;charset=utf8",'root','');


//echo "bağlantı başarılı";

}

catch (PDOException $e) {

    echo $e->getMessage();
}

 ?>