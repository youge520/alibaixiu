<?php 
    //获取提交过来的数据
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $created = $_POST['created'];
    $category = $_POST['category'];
    $status = $_POST['status'];


    //feature是文件，要用files拿
    $feature = $_FILES['feature'];

    //文件名
    $name = $feature['name'];

    //临时路径
    $tmp = $feature['tmp_name'];

    //转成GBK的图片名
    $gbkName = iconv('utf-8','gbk',$name);

    //准备一个上传文件的新路径
    $path = "../../uploads/$gbkName";

    //移动临时路径到新路径
    move_uploaded_file($tmp,$path);


    //导入工具
    require_once "tools/doSql.php";

    //准备sql语句
    //注意数据库里feature字段保存的是路径，所以你不要传图片
    //先把路径再转回UTF-8
    $path = "../../uploads/$name";

    //开启session
    session_start();
    $id = $_SESSION['userInfo']['id'];

    $sql = "insert into posts(title,content,slug,feature,category_id,created,status,user_id) 
                    values('$title','$content','$slug','$path','$category','$created','$status','$id')";

    $result = my_zsg($sql);

    if($result){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }