<?php
session_start();
include "view/header.php";
include "model/product.php";
include "model/pdo.php";
include "model/user.php";
include "model/category.php";
include "global.php";

if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
?>

    <div class="container mx-auto">
        <h3>Xin chào <?= $username ?></h3>
        <?php
        if ($role == 1) {
        ?>
            <a href="admin/index.php">Truy cập trang quản trị</a>
        <?php
        } else {
        ?>
            <a href="index.php?act=user_info">Hồ sơ người dùng</a>

        <?php
        }
        ?>
        <a href="index.php?act=logout">Đăng xuất</a>

    </div>

<?php
} else {
}

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
        case 'search':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = load_all_product($kyw, $iddm);
            $tendm = load_category_name($iddm);
            include "view/product.php";

            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
