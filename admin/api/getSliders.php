<?php 

    //直接操作
    require_once "tools/doSQL.PHP";

    $sql = "select *from sliders";

    $data = my_select($sql);

    echo json_encode($data);