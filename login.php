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
                    Đăng nhập vào tài khoản của bạn
                </h2>
                <form action="" method="POST">
                    <p for="email" class="font-bold mb-3 text-20">Tài khoản</p>
                    <input class="mb-3 px-2 w-full rounded-md h-10 bg-lightgray" name="username" type="text" placeholder="name@company.com" /><br />
                    <p for="password" class="font-bold mb-3 text-20">Mật khẩu</p>
                    <input type="password" name="password" class="px-2 w-full rounded-md mb-3 h-10 bg-lightgray" /><br />
                    <div class="flex justify-between items-center mb-5">
                        <div>
                            <span class=""><a href="#">Quên mật khẩu?</a></span>
                        </div>
                    </div>

                    <button class="text-20 bg-black text-white rounded-md font-medium px-8 py-3 border-primary pointer mb-5">
                        <input class="text-white" type="submit" name="signin" value="Đăng nhập">
                    </button>
                    <p>
                        Chưa đăng ký? <a class="text-primary hover:text-[#00FF02]" href="signup.php">Tạo tài khoản</a>
                    </p>
                    <?php

                    ?>
                </form>
            </div>
        </section>
    </div>
    <?php

    if (isset($_POST['signin']) && ($_POST['signin'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $checkuser = check_user($user, $pass);
        extract($checkuser);
        if (is_array($checkuser) && $role == 1) {
            //$thongbao = "Đăng nhập thành công";
            session_start();
            $_SESSION['user'] = $checkuser;
            header('Location:admin/index.php');
        } else if (is_array($checkuser) && $role == 0) {
            session_start();
            $_SESSION['user'] = $checkuser;
            header('Location:index.php');
        }
        $thongbao = "Tài khoản không tồn tại";
    }
    ?>
</body>

</html>