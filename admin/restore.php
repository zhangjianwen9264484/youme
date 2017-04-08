<?php
    require "mydb.php";
    $db= new DbManage;
    $sqlfile ='./backup/20170408152355_all_v1.sql';
    $db->restore($sqlfile);
?>