<?php
    function taikhoan_soluong(){
        $sql = "select * from user order by uid desc";
        return pdo_query($sql);
    }
    function taikhoan_insert($user,$email,$password){
        $sql = "INSERT INTO `user`(`user`,`password`,`email`) VALUES ('$user','$password','$email')";
        pdo_execute($sql);
    }
    function taikhoan_select($email,$password){
        $sql = "select * from user where email='$email' and password='$password'";
        return pdo_query_one($sql);
    }
    function taikhoan_update($id,$user,$email,$telephone,$image){
        $sql = "UPDATE `user`
         SET 
         `user`='$user',
        `email`='$email',
        `telephone`='$telephone',
        `image`='$image'
         WHERE uid=$id";
        pdo_execute($sql);
    }
    function taikhoan_select_one($email){
        $sql = "select * from user where email='$email'";
        return pdo_query_one($sql);
    }
    function taikhoan_select_one_id($uid){
        $sql = "select * from user where uid='$uid'";
        return pdo_query_one($sql);
    }
    function taikhoan_select_validate($email){
        $sql = "select `email` from user where email='$email'";
        return pdo_query_one($sql);
    }
    function update_pass($id,$pass){
        $sql = "UPDATE `user` SET `password`='$pass' WHERE uid=$id";
        pdo_execute($sql);
    }
    // function taikhoan_select_validate_pass($email){
    //     $sql = "select `password` from tai_khoan where email='$email'";
    //     return pdo_query_one($sql,$email);
    // }
    function taikhoan_insert_admin($user,$email,$password,$telephone,$profile_image,$address){
        $sql = "INSERT INTO `user`(`username`,`email`,`password`, `phone`,`profile_image`,`address`) VALUES ('$user','$email','$password','$telephone','$profile_image','$address')";
        pdo_execute($sql);
    }
    function taikhoan_update_admin($uid,$username,$email,$password,$phone,$profile_image){
        $sql = "UPDATE `user` SET `username`='$username',`email`='$email',`password`='$password',`phone`='$phone',`profile_image`='$profile_image' WHERE uid=$uid";
        pdo_execute($sql);
    }
    function taikhoan_delete($uid){
        $sql="DELETE FROM user WHERE uid =" .$uid;
        pdo_execute($sql);
    }
    function taikhoan_select_id($uid){
        $sql = "select * from user where uid=$uid";
        return pdo_query_one($sql);
    }
