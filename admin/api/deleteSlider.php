<?php 

    $ids = $_POST['ids'];


    require_once "tools/dosql.php";

    $sql = "delete from sliders where id in ($ids)";

    $result = my_zsg($sql);


    if($result){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }