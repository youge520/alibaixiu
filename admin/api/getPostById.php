<?php 

    //接收id
    $id = $_GET['id'];

    //查询sql语句
    require_once "tools/doSql.php";

    $sql = "select *from posts where id = $id";

    $data = my_select($sql);

    //记得取下标0！才是真正要的数据
    echo json_encode($data[0]);