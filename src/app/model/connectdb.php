<?php

function get_connect(){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=da1;charset=utf8","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (\Throwable $th) {
        echo 'kết nối thất bại';
    }
}

function pdo_execute($sql){
    $thamso = array_slice(func_get_args(),1);
    try {
        $conn = get_connect();
        $exe = $conn->prepare($sql);
        $exe->execute($thamso);
        
    } catch (\Throwable $th) {
        echo 'Thao Tác Thất bại';
    }
    finally{
        unset($conn);
    }
}
function pdo_queryall($sql){
    $thamso = array_slice(func_get_args(),1);
    try {
        $conn = get_connect();
        $exe = $conn->prepare($sql);
        $exe->execute($thamso);
        $result = $exe->fetchAll();
        return $result;
    } catch (\Throwable $th) {
        echo 'Thao Tác Thất Bại.';
    }
    finally{
        unset($conn);
    }
}
function pdo_query_one($sql){
    $thamso = array_slice(func_get_args(),1);
    try {
        $conn = get_connect();
        $exe = $conn->prepare($sql);
        $exe->execute($thamso);
        $result = $exe->fetch();
        return $result;
    } catch (\Throwable $th) {
        echo 'Thao Tác Thất Bại';
    }
    finally{
        unset($conn);
    }
}
?>
