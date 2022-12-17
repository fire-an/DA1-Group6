<?php
function insert_user($user, $pass, $email)
{
    $sql = "INSERT INTO user(username,password,email) VALUES('$user','$pass','$email')";
    pdo_execute($sql);
}

function check_user($user, $pass)
{
    $sql = "SELECT * FROM user WHERE username='" . $user . "' AND password='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function check_email($email)
{
    $sql = "SELECT * FROM user WHERE email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_user($uid, $username, $password, $email, $address, $phone, $real_name, $age)
{
    $sql = "UPDATE user SET username='" . $username . "', password='" . $password . "',email='" . $email . "',phone='" . $phone . "',address='" . $address . "', real_name='" . $real_name . "', age='" . $age . "' WHERE uid=" . $uid;
    pdo_execute($sql);
}

function load_all_user()
{
    $sql = "SELECT * FROM user ORDER BY uid desc";
    $listuser = pdo_query($sql);
    return $listuser;
}

function delete_user($id)
{
    $sql = "DELETE FROM user WHERE id=" . $id;
    pdo_execute($sql);
}
