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
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }

    if ($cid > 0) {
        $sql .= " and cid='" . $cid . "'";
    }
    $sql .= " ORDER BY id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_new_product_home()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY id desc limit 0,9";
    $listproduct = pdo_query($sql);
    return $listproduct;
}



function load_one_product($id)
{
    $sql = "SELECT * FROM product WHERE pid=" . $id;
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

// function load_danh_muc($iddm)
// {
//     switch ($iddm) {
//         case 12:
//             $dm = 'Bánh sinh nhật';
//             break;
//         case 13:
//             $dm = 'Bánh tươi';
//             break;
//         case 14:
//             $dm = 'Bánh ngọt';
//             break;
//         case 15:
//             $dm = 'Bánh quy khô';
//             break;
//         case 16:
//             $dm = 'Bánh miếng nhỏ';
//             break;
//         default:
//             $dm = '';
//             break;
//     }
//     return $dm;
// }
