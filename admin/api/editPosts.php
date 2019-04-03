<?php 

    
    //获取提交过来的数据
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $created = $_POST['created'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $id = $_POST['id'];


    //feature是文件，要用files拿
    $feature = $_FILES['feature'];


    //文件名
    $name = $feature['name']; //如果没传文件，$name就为空字符串

    //临时路径 
    $tmp = $feature['tmp_name']; //如果没传文件，也是空字符串

    //转成GBK的图片名
    $gbkName = iconv('utf-8','gbk',$name);

    //准备一个上传文件的新路径
    $path = "../../uploads/$gbkName"; //路径"../../uploads/

    //移动临时路径到新路径
    move_uploaded_file($tmp,$path);


    //导入工具
    require_once "tools/doSql.php";

    //转回UTF-8路径
    $path = "../../uploads/$name"; //"../../uploads/"
    //准备sql语句

    if($name != ""){
        //如果文件名不为空，代表图片有值或者说修改过，那么需要修改数据库里的feature字段
        $sql = "update posts set
                             title = '$title',
                             slug = '$slug',
                             content = '$content',
                             category_id = '$category',
                             status = '$status',
                             created = '$created',
                             feature = '$path'
                        where id = '$id'";

    }else{

        //文件名为空代表没改过图片，没改图片，就不用修改feature字段
        $sql = "update posts set
                        title = '$title',
                        slug = '$slug',
                        content = '$content',
                        category_id = '$category',
                        status = '$status',
                        created = '$created'
                   where id = '$id'";
    }
    //执行sql语句
    $result = my_zsg($sql);

    if($result){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }