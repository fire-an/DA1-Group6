<?php
include "model/pdo.php";
include "model/user.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        background: #f9fafb;
    }
</style>

<body>
    <div class="container mx-auto">
        <section>
            <div class="items-center text-center mx-auto mb-5 flex justify-center items-center">

            </div>
            <div class="w-2/5 mx-auto bg-white drop-shadow-md rounded-md p-10">
                <h2 class="text-36 text-extrabold mb-5">
                    Đăng ký tài khoản mới
                </h2>
                <form action="" method="POST">
                    <p for="email" class="font-bold mb-3 text-20">Tài khoản</p>
                    <input class="border mb-3 px-2 w-full rounded-md h-10 bg-lightgray" name="username" type="text" /><br />
                    <p for="password" class="font-bold mb-3 text-20">Mật khẩu</p>
                    <input type="password" name="password" class="border px-2 w-full rounded-md mb-3 h-10 bg-lightgray" /><br />
                    <p for="email" class="font-bold mb-3 text-20">Email</p>
                    <input type="email" name="email" placeholder="name@company.com" class="border px-2 w-full rounded-md mb-3 h-10 bg-lightgray" /><br />
                    <!-- <div class="flex justify-between items-center mb-5">
                        <div class="">
                            <input class="mr-2" type="checkbox" />Nhớ mật khẩu
                        </div>
                        <div>
                            <span class=""><a href="#">Quên mật khẩu?</a></span>
                        </div>
                    </div> -->

                    <button class="text-20 bg-black text-white rounded-md font-medium px-8 py-3 border-primary pointer mb-5">
                        <input class="text-white" type="submit" name="signup" value="Đăng ký">
                    </button>
                    <p>
                        <a class="text-primary" href="index.php">Tới trang chủ</a>
                    </p>
                    <p>
                        <a class="text-primary" href="login.php">Đăng nhập</a>
                    </p>
                    <?php

                    ?>
                </form>
                <?php
                $users = load_all_user();
                $db = mysqli_connect('localhost', 'root', '', 'project1');
                $user = "";
                $email = "";
                if (isset($_POST['signup']) && ($_POST['signup'])) {
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $sql_u = "SELECT * FROM user WHERE username='$user'";
                    $sql_e = "SELECT * FROM user WHERE email='$email'";
                    $res_u = mysqli_query($db, $sql_u);
                    $res_e = mysqli_query($db, $sql_e);
                    if (mysqli_num_rows($res_u) > 0) {
                        $thongbao = "Tên tài khoản đã có người sử dụng";
                    } else if (mysqli_num_rows($res_e) > 0) {
                        $thongbao = "Email đã có người sử dụng";
                    } else {
                        insert_user($user, $pass, $email);
                        $thongbao = "Đăng ký thành công";
                    }
                }
                ?>
                <?php
                if (isset($thongbao)) {
                    echo $thongbao;
                }

                ?>
            </div>
        </section>
    </div>
</body>

</html>