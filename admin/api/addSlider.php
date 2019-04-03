<?php 

    //接收传递过来
    $text = $_POST['text'];
    $link = $_POST['link'];

    $image = $_FILES['image'];

    //取出文件名
    $name = $image['name'];

    //取出临时路径
    $tmp = $image['tmp_name'];

    //转GBK编码
    $gbkName = iconv('utf-8','gbk',$name);

    //准备新路径
    $path = "../../uploads/$gbkName";

    //移动
    move_uploaded_file($tmp,$path);


    //导入文件了
    require_once "tools/doSql.php";
    $path = "../../uploads/$name";
    $sql = "insert into sliders(image,text,link) values('$path','$text','$link')";

    $result = my_zsg($sql);

    if($result){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }