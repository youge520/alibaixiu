<?php 

    // var_dump($_FILES);

    //接收文件用$_FILES
    $icon = $_FILES['icon'];

    // var_dump($icon);
    //文件上传后会临时存到服务器的临时路径，如果你不做处理，会被自动删除
    //所以如果我们要保存上传的文件，就要移动这个临时路径上的文件到新的路径上去！

    //先取到临时路径
    $tmp = $icon['tmp_name'];

    //获取一下原来的名字
    $name = $icon['name'];

    //为什么乱码？网页用的编码是UTF-8，但是传到了中文的windows操作系统上
    //而中文的windows操作系统它的内置编码是GBK的，编码不一样导致乱码出现
    //解决办法：把原来的UTF-8图片名转成跟服务器一样的编码，服务器用的是GBK你就转GBK
    $gbkName = iconv('utf-8','gbk',$name);

    $path = "upload/$gbkName";
    //移动它！
    move_uploaded_file($tmp,$path);


    //还要返回它在服务器上的路径
    //要返回给网页用，而网页用的是UTF-8，所以记得还要把路径赚回来
    echo  "upload/$name";