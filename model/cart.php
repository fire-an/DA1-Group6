<?php
function viewcart($del)
{

    $sum = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th class="border bg-blue-100 py-2 px-4">Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo
    '
    <thead>
    <tr>
        <th class="border bg-blue-100 py-2 px-4">Hình</th>
        <th class="border bg-blue-100 py-2 px-4">Sản phẩm</th>
        <th class="border bg-blue-100 py-2 px-4">Đơn giá</th>
        <th class="border bg-blue-100 py-2 px-4">Số lượng</th>
        <th class="border bg-blue-100 py-2 px-4">Thành tiền</th>
        ' . $xoasp_th . '
        </tr>
        </thead>
    ';
    if (isset($_SESSION['cart']) && $_SESSION['cart']) {
        foreach ($_SESSION['cart'] as $cart) {
            $ttien = $cart[3] * $cart[4];
            $sum += $ttien;
            if ($del == 1) {
                $xoasp_td = '<td class="text-center text-red-500 border p-2"><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
            } else {
                $xoasp_td = '';
            }
            echo
            '
                <tr>
                    <td class="border p-2"><img class="w-10" src="' . $cart[2] . '"></td>
                    <td class="border p-2">' . $cart[1] . '</td>
                    <td class="border p-2">' . $cart[3] . '</td>
                    <td class="border p-2">' . $cart[4] . '</td>
                    <td class="border p-2">' . $ttien . '</td>
                    ' . $xoasp_td . '
                </tr>';
            $i += 1;
        }
    }

    echo
    '
            <tr>
            <td colspan="4" class="font-bold text-[20px] pl-2">Tổng đơn hàng</td>
            <td class="font-bold text-[20px] text-center">' . $sum . '</td>
            ' . $xoasp_td2 . '
        </tr>
            ';
}

function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    echo
    '
    <tr>
        <th class="border bg-blue-100 py-2 px-4">Hình</th>
        <th class="border bg-blue-100 py-2 px-4">Sản phẩm</th>
        <th class="border bg-blue-100 py-2 px-4">Đơn giá</th>
        <th class="border bg-blue-100 py-2 px-4">Số lượng</th>
        <th class="border bg-blue-100 py-2 px-4">Thành tiền</th>
        </tr>
    ';

    foreach ($listbill as $cart) {
        $hinh = $img_path . $cart['img'];
        $tong += $cart['total'];
        echo
        '
            <tr>
                <td class="border p-2"><img class="w-10" src="' . $hinh . '" height="80px"></td>
                <td class="border p-2">' . $cart['name'] . '</td>
                <td class="border p-2">' . $cart['price'] . '</td>
                <td class="border p-2">' . $cart['quantity'] . '</td>
                <td class="border p-2">' . $cart['total'] . '</td>
            </tr>';
        $i += 1;
    }
    echo
    '
            <tr>
            <td class="font-bold text-[20px] pl-2" colspan="4">Tổng đơn hàng</td>
            <td class="font-bold text-[20px]">' . $tong . '</td>
        </tr>
            ';
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['cart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}

function insert_bill($uid, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill(uid,bname,b_email,b_address,b_phone,b_payment_method,b_date,b_total_price) VALUES('$uid','$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastInsertID($sql);
}

function insert_cart($uid, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO shopcart(uid,pid,img,name,price,quantity,total,bid) VALUES('$uid', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$idbill')";
    return pdo_execute($sql);
}
function loadOne_bill($id)
{
    $sql = "SELECT * FROM bill WHERE bid=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function load_bill_user($uid)
{
    $sql = "SELECT * FROM bill WHERE uid=" . $uid;
    $bill_list = pdo_query($sql);
    return $bill_list;
}

function loadAll_cart($idbill)
{
    $sql = "SELECT * FROM shopcart WHERE bid=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function loadAll_cart_count($idbill)
{
    $sql = "SELECT * FROM cart WHERE idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function load_products_cart($bid)
{
    $sql = "SELECT * FROM shopcart WHERE bid=" . $bid;
    $products = pdo_query($sql);
    return $products;
}

function loadAll_bill($kyw = "", $iduser = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($iduser > 0) {
        $sql .= " AND iduser=" . $iduser;
    }
    if ($kyw != "") {
        $sql .= " AND id like '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = 'Đơn hàng mới';
            break;
        case '1':
            $tt = 'Đang xử lý';
            break;
        case '2':
            $tt = 'Đang giao hàng';
            break;
        case '3':
            $tt = 'Đã giao hàng';
            break;
        case '4':
            $tt = 'Đã hoàn thành';
            break;
        case '5':
            $tt = 'Đã hủy đơn';
            break;
        default:
            $tt = 'Đơn hàng mới';
            break;
    }
    return $tt;
}

function loadAll_thongke()
{
    $sql = "SELECT danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql .= " FROM sanpham LEFT JOIN danhmuc on danhmuc.id=sanpham.iddm WHERE 1";
    $sql .= " GROUP BY danhmuc.id ORDER BY danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
