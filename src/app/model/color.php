<?php
    function query_allcolor(){
        $sql = "select * from color order by color_id desc";
        $result = pdo_queryall($sql);
        return $result;
    }
    function query_onecolor($id){
        $sql = "select * from color where color_id = $id";
        // printf($sql);
        // die;
        $result = pdo_query_one($sql);
        return $result;
    }
    
?>