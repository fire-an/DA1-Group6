<?php
    // Select all data
    function danhmuc_soluong(){
        $sql = "select * from category";
        return pdo_query($sql);
    }
    function danhmuc_selectAll(){
        $sql = "select * from category order by cid desc";
        return pdo_query($sql);
    }
    // Insert data
    function danhmuc_insert($ten_loai){
        $sql = "insert into category(cname) values('$ten_loai')";
        pdo_execute($sql);
    }
    // Delete data
    function danhmuc_delete($cid){
        $sql = "DELETE FROM category WHERE cid=" . $cid;
        pdo_execute($sql);
    }
    // Select a data
    function danhmuc_select($ma_loai){
        $sql = "SELECT * FROM category WHERE cid=" .$ma_loai;
        $detailDm = pdo_query_one($sql);
        return $detailDm;
    }
    function category_loadone($cid){
        $sql = "SELECT * FROM category WHERE cid=" .$cid;
        $update = pdo_query_one($sql);
        return $update;
    }
    //Update data
    function danhmuc_update($cid, $cname){
        // $sql = "update category set cname='$tenLoai' where cid=$id";
        $sql = "UPDATE category SET cname='" . $cname . "' WHERE cid=" . $cid;
        pdo_execute($sql);
    }
?>