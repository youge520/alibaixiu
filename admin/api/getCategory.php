<?php 

    //导入sql文件
    require_once "tools/doSql.php";

    $sql = "select *from categories";

    $data = my_select($sql);

    echo json_encode($data);