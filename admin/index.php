<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header("location: ../admin/index.php");
// }

include "model/pdo.php";
include "model/model-dm.php";
include "model/model-sp.php";
include "model/model-thongke.php";
include "model/model-tk.php";
include "model/cart.php";

$soLuongSp = sanpham_soluong();
$soLuongDm = danhmuc_soluong();
$soLuongKh = taikhoan_soluong();
$soLuongDh = tongdonhang();
// Controler
$flag = 0;
if (isset($_GET['actLog'])) {
    $flag++;
    $actLog = $_GET['actLog'];
} else {
    $flag = 0;
    include "header.php";
}
if ($flag == 0) {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'bieudo':
                $listThongKe = thong_ke();
                include "thong-ke/bieudo.php";
                break;
            case 'thongke':
                $listThongKe = thong_ke();
                include "thong-ke/list.php";
                break;
                //Khách hàng
            case 'xoabill':
                if (isset($_GET['bid'])) {
                    $bid = $_GET['bid'];
                    delete_bill($bid);
                    $thongbao = "Xóa khách hàng thành công";
                }
                $listbill = loadAll_bill();
                include "bill/listbill.php";
                break;
            case 'listbill':
                if (isset($_POST['kyw']) && ($_POST['kyw'])) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                $listbill = loadAll_bill();
                include "bill/listbill.php";
                break;
            case 'suabill':
                if (isset($_GET['bid']) && ($_GET['bid'])) {
                    $bid = $_GET['bid'];
                    $detailBill = loadOne_bill($bid);
                }
                include "bill/edit.php";
                break;
            case 'updatebill':
                if (isset($_POST['btn-repair-bill'])) {
                    $bid = $_POST['bid'];
                    $status = $_POST['statusProduct'];
                    update_bill($status, $bid);
                    $thongbao = "Cập nhật thông tin thành công";
                }

                include "bill/listbill.php";
                break;
            case 'xoakh':
                if (isset($_GET['uid'])) {
                    $id = $_GET['uid'];
                    $user = taikhoan_select_one_id($id);
                    extract($user);
                    if ($role == 1) {
                        $thongbao = "Đây là tài khoản của quản trị";
                    } else {
                        taikhoan_delete($id);
                        $thongbao = "Xóa khách hàng thành công";
                    }
                }
                $listAccount = taikhoan_soluong();
                include "khach-hang/list.php";
                break;
            case 'suakh';
                if (isset($_GET['uid'])) {
                    $uid = $_GET['uid'];
                    $detailKh = taikhoan_select_id($uid);
                }
                include "khach-hang/edit.php";
                break;
            case 'updatekh':
                if (isset($_POST['btn-repair-account'])) {
                    $uid = $_POST['uid'];
                    $username = $_POST['nameAccount'];
                    $email = $_POST['emailAccount'];
                    $password = $_POST['passAccount'];
                    $phone = $_POST['telephoneAccount'];
                    $profile_image = $_POST['avatarAccount'];
                    if ($_FILES['avatarAccount']['size'] > 0) {
                        $profile_image = $_FILES['avatarAccount']['name'];
                    }
                    if ($profile_image != "") {
                        move_uploaded_file($_FILES['avatarAccount']['tmp_name'], "../imageProduct/" . $profile_image);
                    }
                    taikhoan_update_admin($uid, $username, $email, $password, $phone, $profile_image);
                    $thongbao = "Cập nhật thông tin thành công";
                }
                $listAccount = taikhoan_soluong();
                include "khach-hang/list.php";
                break;
            case 'dskh':
                $listAccount = taikhoan_soluong();
                include "khach-hang/list.php";
                break;
            case 'addkh':
                $error = [];
                if (isset($_POST['btn-add'])) {
                    $user = $_POST['nameAccount'];
                    $email = $_POST['emailAccount'];
                    $password = $_POST['passAccount'];
                    $telephone = $_POST['telephoneAccount'];
                    $address = $_POST['address'];
                    if ($user == "") {
                        $error["user"] = "Hãy nhập tên khách hàng!";
                    }
                    if ($email == "") {
                        $error["email"] = "Hãy nhập Email!";
                    }
                    if ($password == "") {
                        $error["password"] = "Hãy nhập password!";
                    }
                    if ($telephone == "") {
                        $error["telephone"] = "Hãy nhập telephone!";
                    }
                    if ($address == "") {
                        $error["address"] = "Hãy nhập address!";
                    }
                    $file = $_FILES["imageProduct"];
                    $image = $file["name"];
                    if ($file["size"] > 0) {
                        $imgFileType = pathinfo($image, PATHINFO_EXTENSION);
                        if ($imgFileType != 'jpg' && $imgFileType != 'png') {
                            $error["img_type"] = "Bạn cần nhập hình ảnh đúng định dạng png , jpg";
                        } elseif ($file["size"] >= 1024 * 1024 * 10) {
                            $error["img_type"] = "Ảnh vượt quá 2MB";
                        }
                    }
                    if (!$error) {
                        taikhoan_insert_admin($user, $email, $password, $telephone, $image, $address);
                        if ($file["size"] > 0) {
                            move_uploaded_file($file["tmp_name"],  "../imageProduct/" . $image);
                            $thongbao = "Thêm tài khoản mới thành công";
                        }
                    }
                }
                include "khach-hang/add.php";
                break;
            case 'listsp':
                if (isset($_POST['btn-findPr'])) {
                    $namePr = $_POST['nameFind'];
                } else {
                    $namePr = '';
                }
                if (isset($_POST['btn-finDm'])) {
                    $iddm = $_POST['iddm'];
                } else {
                    $iddm = '';
                }
                $sqlClone = "select * from product";
                $sqlAll = pdo_query($sqlClone);
                // $listsp  = sanpham_selectAll($iddm, $namePr);
                $p_list = list_product();
                $countPage = get_Page_Product_admin($iddm, $namePr);
                $soLuongSp = sanpham_soluong();
                $listdm = danhmuc_selectAll();
                include "san-pham/list.php";
                break;
            case 'addsp':
                if (isset($_POST['btn-add'])) {
                    $pname = $_POST['nameProduct'];
                    // $soluongSp = $_POST['amountProduct'];
                    $price = $_POST['priceProduct'];
                    // $giaDaGiam = $_POST['discountProduct'];
                    $category = $_POST['catProduct'];
                    // $statusSp = $_POST['statusProduct'];
                    $image = $_FILES['file']['name'][0];
                    $image_2 = $_FILES['file']['name'][1];
                    $image_3 = $_FILES['file']['name'][2];
                    $image_4 = $_FILES['file']['name'][3];
                    $description = $_POST['description'];
                    $warranty = $_POST['warranty'];
                    $target_dir = "../assets/uploads/";
                    $target_file = $target_dir . basename($_FILES['file']['name'][0]);
                    $target_file_2 = $target_dir . basename($_FILES['file']['name'][1]);
                    $target_file_3 = $target_dir . basename($_FILES['file']['name'][2]);
                    $target_file_4 = $target_dir . basename($_FILES['file']['name'][3]);
                    move_uploaded_file($_FILES['file']['tmp_name'][0], $target_file);
                    move_uploaded_file($_FILES['file']['tmp_name'][1], $target_file_2);
                    move_uploaded_file($_FILES['file']['tmp_name'][2], $target_file_3);
                    move_uploaded_file($_FILES['file']['tmp_name'][3], $target_file_4);

                    // if (isset($_FILES['files'])) {
                    //     $files = $_FILES['files'];
                    //     $file_names = $files['name'];
                    //     foreach ($file_names as $key => $value) {
                    //         move_uploaded_file($files['tmp_name'][$key], "../imageProduct/" . $value);
                    //     }
                    // }

                    sanpham_insert($pname, $price, $category, $image, $image_2, $image_3, $image_4, $description, $warranty);
                    $thongbao = "Thêm sản phẩm thành công";
                }
                $listdm = danhmuc_selectAll();
                include "san-pham/add.php";
                break;
            case 'xoasp':
                if (isset($_GET['pid'])) {
                    $id = $_GET['pid'];
                    sanpham_delete($id);
                    $thongbao = "Xóa sản phẩm thành công";
                }
                $p_list = list_product(0, "");
                include "san-pham/list.php";
                break;
            case 'suasp';
                if (isset($_GET['pid'])) {
                    $pid = $_GET['pid'];
                    $detailSp = sanpham_select($pid);
                }
                $listdm = danhmuc_selectAll();
                include "san-pham/edit.php";
                break;
            case 'updatesp';
                if (isset($_POST['btn-edit-sp'])) {
                    $pid = $_POST['pid'];
                    $danhmucSp = $_POST['catProduct'];
                    $tenSp = $_POST['nameProduct'];
                    $soluongSp = $_POST['amountProduct'];
                    $giaSp = $_POST['priceProduct'];
                    $giaDaGiam = $_POST['discountProduct'];
                    $statusSp = $_POST['statusProduct'];
                    $imageSp = $_POST['imageProduct'];
                    $describeSp = $_POST['description'];
                    if ($_FILES['imageProduct']['size'] > 0) {
                        $imageSp = $_FILES['imageProduct']['name'];
                    }
                    move_uploaded_file($_FILES['imageProduct']['tmp_name'], "../imageProduct/" . $imageSp);
                    sanpham_update($pid, $tenSp, $soluongSp, $giaSp, $imageSp, $describeSp, $giaDaGiam, $statusSp, $danhmucSp);
                    $thongbao = "Cập nhật sản phẩm thành công";
                }
                $listdm = danhmuc_selectAll();
                $p_list = list_product(0, "");
                include "san-pham/list.php";
                break;
                // Sản phẩm
                // Danh mục 
            case 'adddm':
                if (isset($_POST['btn-add'])) {
                    $tenLoai = $_POST['tenloai'];
                    danhmuc_insert($tenLoai);
                    $thongbao = "Thêm danh mục thành công";
                }
                include "danh-muc/add.php";
                break;
            case 'listdm':
                $listdm = danhmuc_selectAll();
                include "danh-muc/list.php";
                break;
            case 'xoadm':
                if (isset($_GET['cid'])) {
                    $cid = $_GET['cid'];
                    danhmuc_delete($cid);
                    $thongbao = "Xóa danh mục thành công";
                }
                $listdm = danhmuc_selectAll();
                include "danh-muc/list.php";
                break;
            case 'suadm';
                if (isset($_GET['cid']) && ($_GET['cid'] > 0)) {
                    $detailDm = category_loadone($_GET['cid']);
                }
                include "danh-muc/edit.php";
                break;
            case 'updatedm';
                if (isset($_POST['btn-edit']) && ($_POST['btn-edit'])) {
                    $cid = $_POST['cid'];
                    $cname = $_POST['cname'];
                    danhmuc_update($cid, $cname);
                    $thongbao = "Cập nhật danh mục thành công";
                }
                $listdm = danhmuc_selectAll();
                include "danh-muc/list.php";
                break;
                // Danh mục 
            default:
                include "home.php";
                break;
        }
    } else {
        include "home.php";
    }
}
