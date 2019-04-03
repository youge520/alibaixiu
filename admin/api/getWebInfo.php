<?php 

    //暂时记住跟include_once是一样的
    require_once "tools/doSql.php";

    //查出所有没被删除的文章
    $sql = "select *from posts where status != 'trashed'";
    $data = my_select($sql);
    //取出没被删除的文章数量
    $wenzhang = count($data);


    //找到所有草稿
    $sql = "select *from posts where status ='drafted'";
    $caogao = count(my_select($sql));


    //找到所有分类
    $sql = "select *from categories";
    $fenlei = count(my_select($sql));


    //找到所有没被删除的评论
    $sql = "select *from comments where status != 'trashed'";
    $pinglun = count(my_select($sql));


    //找到所有待审核的评论
    $sql = "select *from comments where status = 'held'";
    $daishenhe = count(my_select($sql));


    //拼接成关系型数组
    $arr = array(
        "wenzhang" => $wenzhang,
        "caogao" => $caogao,
        "fenlei" => $fenlei,
        "pinglun" => $pinglun,
        "daishenhe" => $daishenhe
    );

    
    echo json_encode($arr);
