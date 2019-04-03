<?php 

    //拿到提交的数据
    $pageIndex = $_GET['pageIndex'];
    $pageSize = $_GET['pageSize'];

    /*
        假设我要一页显示10条，也就是说页容量为10
       
        那么我想问
        limit左边的数字是代表从哪条数据开始，写0，代表下标0的数据开始，写1代表下标1的数据开始
       
        第1页： limit 0,10    下标0-下标9       (1-1) * 10 = 0
        第2页： limit 10,10   下标10-下标19     (2-1) * 10 = 10
        第3页： limit 20,10   下标20-下标29     (3-1) * 10 = 20
        第4页： limit 30,10   下标30-下标39     (4-1) * 10 = 30

        结论：limit右边的数字，等于页容量
             limit左边的数字 = ( 页码 - 1 ) * 页容量
    */

    // 计算出左边索引
    $start = ($pageIndex - 1) * $pageSize;

    //就准备sql去查了
    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status from comments c
                inner join posts p
                on c.post_id = p.id
                where c.status != 'trashed'
            limit $start,$pageSize";

    require_once "tools/doSql.php";

    //执行sql语句
    $data = my_select($sql);

    // var_dump($data);

    //转成JSON再输出,此处仅仅只是返回分页数据
    // echo json_encode($data);


    //先查出总数
    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status from comments c
                inner join posts p
                on c.post_id = p.id
            where c.status != 'trashed'";
    $count = count(my_select($sql));

    //再用 ceil(总数 / 页容量) 得到总页数
    $totalPages = ceil( $count / $pageSize );

    // echo $totalPages;


    //把数据和总页数拼成关系型数组
    $arr = array(
        "data" => $data,
        "totalPages" => $totalPages
    );

    echo json_encode($arr);