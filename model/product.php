<?php
// function insert_sanpham($pname, $price, $img_1, $img_2, $img_3, $img_4, $des, $cid)
// {
//     $sql = "INSERT INTO product(pname,price,image_1,image_2,image_3,image_4,description,cid,discount,brand,) VALUES('$tensp','$giasp','$img','$mota','$iddm')";
//     pdo_execute($sql);
// }

function delete_product($id)
{
    $sql = "DELETE FROM product WHERE pid=" . $id;
    pdo_execute($sql);
}
function load_all_product($kyw, $cid)
{
    $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE 1";
    if ($kyw != "") {
        $sql .= " and pname like '%" . $kyw . "%'";
    }

    if ($cid > 0) {
        $sql .= " and cid='" . $cid . "'";
    }
    $sql .= " ORDER BY pid desc";
    $p_list = pdo_query($sql);
    return $p_list;
}

function load_new_product_home()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY id desc limit 0,9";
    $listproduct = pdo_query($sql);
    return $listproduct;
}



function load_one_product($pid)
{
    $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE pid=" . $pid;
    $product = pdo_query_one($sql);
    return $product;
}

function load_category($cid)
{
    if ($cid > 0) {
        $sql = "SELECT * FROM category WHERE cid=" . $cid;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $cname;
    } else {
        return "";
    }
}

function load_products_same_category($id, $cid)
{
    $sql = "SELECT * FROM product WHERE cid=" . $cid . " AND pid <>" . $id;
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota)
{
    $sql = "UPDATE sanpham SET iddm='" . $iddm . "', name='" . $tensp . "',price='" . $giasp . "',description='" . $mota . "' WHERE id=" . $id;
    pdo_execute($sql);
}

function load_category_name($cid)
{
    if ($cid > 0) {
        $sql = "SELECT * FROM category WHERE cid=" . $cid;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

// function load_products_price_down_500()
// {
//     $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE price BETWEEN 0 AND 500000";
//     $sql .= " ORDER BY pid desc";
//     $p_list = pdo_query($sql);
//     return $p_list;
// }

// function load_products_price_between_500_800()
// {
//     $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE price BETWEEN 500000 AND 800000";
//     $sql .= " ORDER BY pid desc";
//     $p_list = pdo_query($sql);
//     return $p_list;
// }
// function load_products_price_between_800_1000()
// {
//     $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE price BETWEEN 800000 AND 1000000";
//     $sql .= " ORDER BY pid desc";
//     $p_list = pdo_query($sql);
//     return $p_list;
// }
// function load_products_price_between_1000_2000()
// {
//     $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE price BETWEEN 1000000 AND 2000000";
//     $sql .= " ORDER BY pid desc";
//     $p_list = pdo_query($sql);
//     return $p_list;
// }
// function load_products_price_up_2000()
// {
//     $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE price > 2000000";
//     $sql .= " ORDER BY pid desc";
//     $p_list = pdo_query($sql);
//     return $p_list;
// }

function load_all_products_home()
{
    $sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid WHERE 1 ORDER BY pid desc limit 0,9";
    $p_list = pdo_query($sql);
    return $p_list;
}
