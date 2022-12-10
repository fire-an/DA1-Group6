<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
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

    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td class="text-center text-red-500 border p-2"><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }
        echo
        '
            <tr>
                <td class="border p-2"><img class="w-10" src="' . $hinh . '"></td>
                <td class="border p-2">' . $cart[1] . '</td>
                <td class="border p-2">' . $cart[3] . '</td>
                <td class="border p-2">' . $cart[4] . '</td>
                <td class="border p-2">' . $ttien . '</td>
                ' . $xoasp_td . '
            </tr>';
        $i += 1;
    }
    echo
    '
            <tr>
            <td colspan="4" class="font-bold text-[20px] pl-2">Tổng đơn hàng</td>
            <td class="font-bold text-[20px] text-center">' . $tong . '</td>
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
        $tong += $cart['thanhtien'];
        echo
        '
            <tr>
                <td class="border p-2"><img class="w-10" src="' . $hinh . '" height="80px"></td>
                <td class="border p-2">' . $cart['name'] . '</td>
                <td class="border p-2">' . $cart['price'] . '</td>
                <td class="border p-2">' . $cart['soluong'] . '</td>
                <td class="border p-2">' . $cart['thanhtien'] . '</td>
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
    $sql = "select * from bill order by bid desc";
        return pdo_query($sql);
}

function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) VALUES('$iduser','$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastInsertID($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) VALUES('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$idbill')";
    return pdo_execute($sql);
}
function loadOne_bill($bid)
{
    $sql = "SELECT * FROM bill WHERE bid=" . $bid;
    $bill = pdo_query_one($sql);
    return $bill;
}
function update_bill($status,$bid){
    $sql = "UPDATE bill SET  b_status='" . $status . "' WHERE bid=" . $bid;
        pdo_execute($sql);
}
function loadAll_cart($idbill)
{
    $sql = "SELECT * FROM cart WHERE idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadAll_cart_count($bid){
    $sql = "select * from shopcart where bid=$bid";
    return pdo_query_one($sql);
}
function delete_bill($bid){
    $sql="DELETE FROM bill WHERE bid =" .$bid;
    pdo_execute($sql);
}
function loadAll_bill($kyw = "", $uid = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($uid > 0) {
        $sql .= " AND bname=" . $uid;
    }
    if ($kyw != "") {
        $sql .= " AND bid like '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY uid desc";
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
        default:
            $tt = 'Đơn hàng mới';
            break;
    }
    return $tt;
}
