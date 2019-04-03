<?php 

    //接收两个参数
    $pageIndex = $_GET['pageIndex'];
    $pageSize = $_GET['pageSize'];
    $category = $_GET['category'];
    $status = $_GET['status'];

    require_once "tools/doSql.php";

    //计算出起始索引
    $start = ($pageIndex - 1) * $pageSize;

    //准备sql语句
    $sql = "select p.id,p.title,u.nickname,c.name,p.created,p.status from posts p
                inner join users u
                on p.user_id = u.id
                inner join categories c
                on p.category_id = c.id
                where p.status != 'trashed'";
    
    //在中间我可以有选择的来添加where条件
    //如果分类 不等于 所有分类，就要加一个条件
    if($category != '所有分类'){

        $sql .= "and c.name = '$category'";
    }

    //如果状态 不等于 所有状态，就要加一个条件
    if($status != '所有状态'){

        $sql .= "and p.status = '$status'";
    }

    //在加limit之前，先把之前的sql语句保存一下就能在后面查新的总数量
    $sql2 = $sql;

    $sql .= "order by p.id desc limit $start,$pageSize";


    $data = my_select($sql);


    //还要查出总数，就是不加limit的语句
    // $sql2 = "select p.id,p.title,u.nickname,c.name,p.created,p.status from posts p
    //             inner join users u
    //             on p.user_id = u.id
    //             inner join categories c
    //             on p.category_id = c.id
    //             where p.status != 'trashed'";

    //查出数量
    $count = count( my_select($sql2) );

    //计算出总页数
    $totalPages = ceil( $count / $pageSize );


    //拼成关系型数组
    $arr = array(
        "data" => $data,
        "totalPages" => $totalPages
    );

    //转成JSON输出
    echo json_encode($arr);