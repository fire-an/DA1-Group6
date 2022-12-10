<?php
// Select all data
function sanpham_soluong()
{
    $sql = "select * from product";
    return pdo_query($sql);
}
function get_Page_Product($rows)
{
    // $rows = 12;
    $sql = "select * from product where 1 order by pid desc";
    $numberPage = pdo_query($sql);
    $countPage = sizeof($numberPage) / $rows;
    return $countPage;
}

function sanpham_selectAll_home($rows)
{
    // $rows = 12;
    $countPage = get_Page_Product($rows);
    if (isset($_GET['page']) &&  $_GET['page'] > 0 && $_GET['page'] <= $countPage + 1) {
        $page = $_GET['page'];
    } else {
        $page = '1';
    }
    $from = ($page - 1) * $rows;
    $sql = "select * from product where 1 order by pid desc limit $from,$rows ";
    return pdo_query($sql);
}
function get_Page_Product_admin($iddm, $namePr)
{
    // $rows = 5;
    $sql = "select A.*, B.cname from product A inner join category B on A.cid = B.cid where 1 ";
    if ($iddm > 0) {
        $sql .= " and cid = $iddm";
    }
    if ($namePr != "") {
        $sql .= " and pname like '%$namePr%'";
    }
    $sql .= " order by A.pid desc";
    $numberPage = pdo_query($sql);
    $countPage = sizeof($numberPage);
    return $countPage;
}
function sanpham_selectAll($iddm, $namePr)
{
    $countPage = get_Page_Product_admin($iddm, $namePr);
    if (isset($_GET['page']) &&  $_GET['page'] > 0 && $_GET['page'] <= $countPage + 1) {
        $page = $_GET['page'];
    } else {
        $page = '1';
    }
    $from = ($page - 1);
    $sql = "select A.*, B.cname from product A inner join category B on A.cid = B.cid where 1 ";
    if ($iddm > 0) {
        $sql .= " and cid = $iddm";
    }
    if ($namePr != "") {
        $sql .= " and pname like '%$namePr%'";
    }
    $sql .= " order by A.pid desc limit $from";
    return pdo_query($sql);
}

function list_product()
{
    $sql = "SELECT * FROM product p INNER JOIN category c WHERE p.cid=c.cid ORDER BY pid desc";
    $list = pdo_query($sql);
    return $list;
}


function danhmuc_select_sp($ma_loai)
{
    if ($ma_loai > 0) {
        $sql = "select * from category where cid=$ma_loai";
        $dm = pdo_query_one($sql, $ma_loai);
        extract($dm);
        return $namedm;
    } else {
        return "";
    }
}


function sanpham_select_top10()
{
    $sql = "select * from product where 1 order by view desc limit 0,8";
    return pdo_query($sql);
}
function sanpham_select_topBanner()
{
    $sql = "select * from product where 1 order by view desc limit 0,4";
    return pdo_query($sql);
}
// Insert data
function sanpham_insert($name, $price, $category, $image, $image_2, $image_3, $image_4, $description, $warranty)
{
    $sql = "INSERT INTO `product`(`pname`,`price`,`cid`, `image`,`image_2`,`image_3`,`image_4`,`description`,`warranty`) VALUES ('$name','$price',$category,'$image','$image_2','$image_3','$image_4','$description','$warranty')";
    pdo_execute($sql);
}
// Delete data
function sanpham_delete($id)
{
    $sql = "delete from product where pid=$id";
    pdo_execute($sql);
}
// Select a data
function sanpham_select($pid)
{
    $sql = "select * from product where pid=$pid";
    return pdo_query_one($sql);
}
function sanpham_select_cung_loai($ma, $iddm)
{
    $sql = "select * from product where cid=$ma and cid <> $iddm";
    return pdo_query($sql);
}
//Update data
function sanpham_update($pid, $tenSp, $soluongSp, $giaSp, $imageSp, $describeSp, $giaDaGiam, $statusSp, $danhmucSp)
{
    // $sql = "UPDATE product SET 'pname'='$tenSp','price'='$giaSp','image'='$imageSp','cid'='$danhmucSp','descriptiob'='$describeSp','discount'='$giaDaGiam','warranty'='$soluongSp','brand'='$statusSp' where pid=$id";
    $sql = "UPDATE product SET pname='" . $tenSp . "', price='" . $giaSp . "',image='" . $imageSp . "',cid='" . $danhmucSp . "',description='" . $describeSp . "',discount='" . $giaDaGiam . "',quantity='" . $soluongSp . "',brand='" . $statusSp . "' WHERE pid=" . $pid;
    pdo_execute($sql);
}
function luotxem_update($id)
{
    $sql = "UPDATE 'product' SET 'view'='view'+1 where pid=$id";
    pdo_execute($sql);
}
// 
function sanpham_selectAll_devices()
{
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where 1 order by A.pid desc";
    return pdo_query($sql);
}
function get_Page_Product_Devices_phone($rows)
{
    // $rows = 12;
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where cid = 14 order by pid desc";
    $numberPage = pdo_query($sql);
    $countPageDevices = sizeof($numberPage) / $rows;
    return $countPageDevices;
}
function get_Page_Product_Devices_watch($rows)
{
    // $rows = 12;
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where cid = 23 order by pid desc";
    $numberPage = pdo_query($sql);
    $countPageDevices = sizeof($numberPage) / $rows;
    return $countPageDevices;
}
function get_Page_Product_Devices_accessory($rows)
{
    // $rows = 12;
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where cid = 16 order by pid desc";
    $numberPage = pdo_query($sql);
    $countPageDevices = sizeof($numberPage) / $rows;
    return $countPageDevices;
}
function sanpham_selectAll_page_phone($rows)
{
    $countPage = get_Page_Product_Devices_phone($rows);
    if (isset($_GET['pagePhone']) &&  $_GET['pagePhone'] > 0 && $_GET['pagePhone'] <= $countPage + 1) {
        $page = $_GET['pagePhone'];
    } else {
        $page = '1';
    }
    $from = ($page - 1) * $rows;
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where cid = 14 order by pid desc limit $from,$rows ";
    return pdo_query($sql);
}
function sanpham_selectAll_page_watch($rows)
{
    $countPage = get_Page_Product_Devices_watch($rows);
    if (isset($_GET['pageWatch']) &&  $_GET['pageWatch'] > 0 && $_GET['pageWatch'] <= $countPage + 1) {
        $page = $_GET['pageWatch'];
    } else {
        $page = '1';
    }
    $from = ($page - 1) * $rows;
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where cid = 23 order by pid desc limit $from,$rows ";
    return pdo_query($sql);
}
function sanpham_selectAll_page_accessory($rows)
{
    $countPage = get_Page_Product_Devices_accessory($rows);
    if (isset($_GET['pageAccessory']) &&  $_GET['pageAccessory'] > 0 && $_GET['pageAccessory'] <= $countPage + 1) {
        $page = $_GET['pageAccessory'];
    } else {
        $page = '1';
    }
    $from = ($page - 1) * $rows;
    $sql = "select A.*, B.`cname` from `product` A INNER JOIN `category` B ON A.`cid`=B.`cid` where cid = 16 order by pid desc limit $from,$rows ";
    return pdo_query($sql);
}
