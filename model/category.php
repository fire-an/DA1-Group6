<?php
function insert_category($cname)
{
    $sql = "INSERT INTO category(cname) VALUES('$cname')";
    pdo_execute($sql);
}

function delete_category($id)
{
    $sql = "DELETE FROM category WHERE cid=" . $id;
    pdo_execute($sql);
}

function load_all_category()
{
    $sql = "SELECT * FROM category ORDER BY cid desc";
    $list_category = pdo_execute($sql);
    return $list_category;
}

function load_one_category($id)
{
    $sql = "SELECT * FROM category WHERE cid=" . $id;
    $one_category = pdo_query_one($sql);
    return $one_category;
}

function update_category($id, $category_update)
{
    $sql = "UPDATE category SET name='" . $category_update . "' WHERE cid=" . $id;
    pdo_execute($sql);
}
