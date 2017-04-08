<?php
    require "mydb.php";
    $db= new DbManage;
    $sqlfile ='./backup/20170407142606_all_v1.sql';
    $db->restore($sqlfile);
?>