<?php 

    //导入文件
    //include是把导入文件的内容在写include的地方拷贝一份
    //如果你写多次，就会拷贝多份，那么里面声明的函数会造成“重复定义”的问题
    // include "data.php";
    // include "data.php";
    // include "data.php";
    // include "data.php";

    //php里不能声明同名函数
    // function f1(){
    //     echo 'f1';
    // }

    // function f1(){

    //     echo 'fsdsfs';
    // }

    // 它的作用也是把文件的内容在这拷贝一份，但是它内部会有一个判断
    // 判断这个文件之前有没有被导入过，如果没有才导入，如果导入过就忽略
    // include_once "data.php";
    // include_once "data.php";
    // include_once "data.php";
    // include_once "data.php";
    // include_once "data.php";

    // test();

    // 使用include导入，如果路径有错，也会执行后面的代码
    // include_once "../data.php";

    // 使用require导入，如果路径有错，不会执行后面的代码
    require_once "../data.php";


    echo 'end';