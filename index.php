<?php
session_start();
include "view/header.php";
include "model/product.php";
include "model/pdo.php";
include "model/user.php";
include "model/cart.php";
include "model/category.php";


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$p_new = load_all_products_home();
$c_list = load_all_category();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case '':
            break;
        case 'product_detail':
            if (isset($_GET['pid']) && ($_GET['pid'] > 0)) {
                $pid = $_GET['pid'];
                $product = load_one_product($pid);
                extract($product);
                include "view/product_detail.php";
            }

            break;
        case 'signup':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                insert_user($user, $pass, $email);
                $thongbao = "Đăng ký thành công. Vui lòng đăng nhập";
            }
            include "view/account/signup.php";
            break;
        case 'signin':
            if (isset($_POST['signin']) && ($_POST['signin'])) {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    //$thongbao = "Đăng nhập thành công";
                    header('Location:index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/account/signin.php";
            break;
        case 'logout':
            session_unset();
            header('Location:index.php');
            break;
        case 'product':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['cid']) && ($_GET['cid'] > 0)) {
                $cid = $_GET['cid'];
            } else {
                $cid = 0;
            }
            $p_list = load_all_product($kyw, $cid);
            include "view/product.php";
            break;
        case 'product_detail':
            if (isset($_GET['pid']) && ($_GET['pid'] > 0)) {
                $pid = $_GET['pid'];
                $product = load_one_product($pid);
                extract($product);
                include "view/product_detail.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $pid = $_POST['pid'];
                $pname = $_POST['pname'];
                $image = $_POST['image'];
                $price = $_POST['price'];

                $quantity = $_POST['quantity'];
                $tprice = $quantity * $price;
                $p_add = [$pid, $pname, $image, $price, $quantity, $tprice];
                array_push($_SESSION['cart'], $p_add);
                
                // $_SESSION['cart'];
            }
            include "view/cart/viewcart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['cart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['cart'] = [];
            }
            // include "view/contact.php";
            header('Location:index.php?act=viewcart');
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
