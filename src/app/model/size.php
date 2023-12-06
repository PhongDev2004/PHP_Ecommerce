<?php
    function query_allsize(){
        $sql = "select * from size order by size_id desc";
        $result = pdo_queryall($sql);
        return $result;
    }
    function query_onesize($id){
        $sql = "select * from size where size_id = $id";
        $result = pdo_query_one($sql);
        return $result;
    }
   
?>