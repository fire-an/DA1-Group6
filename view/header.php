<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/product.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/function.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>

<body>
    <!-- HEADER -->

    <header class="bg-black sticky top-0 z-10">
        <div class="flex container mx-auto text-white items-center justify-between">
            <div>
                <a href="index.php">
                    <img class="w-[250px]" src="https://theme.hstatic.net/1000037809/1000944346/14/logo.png?v=49" alt="" />
                </a>
            </div>
            <div>
                <form action="index.php?act=product" method="POST">
                    <input class="px-2 py-1 rounded-sm text-black" type="text" name="kyw" placeholder="Tìm kiếm sản phẩm" />
                    <button class="bg-[#00FF02] text-black py-1 px-2 rounded-sm" type="submit">Search</button>
                </form>
            </div>
            <ul class="flex">
                <li class="px-4 py-6 hover:text-[#35FC26]">
                    <a href="#">LINH KIỆN PC</a>
                </li>
                <li class="px-4 py-6 hover:text-[#35FC26]"><a href="#">MÀN HÌNH</a></li>
                <li class="px-4 py-6 hover:text-[#35FC26]"><a href="#">GAMING GEAR</a></li>
                <li class="px-4 py-6 hover:text-[#35FC26]"><a href="#">BÀN GHẾ</a></li>
                <li id="login_menu" class="px-4 py-6 hover:text-[#35FC26] relative">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);

                    ?>
                        <div>
                            <div id="account" class="hidden bg-white absolute z-20 top-[70px] shadow-md w-[200px]">
                                <h3 class="px-3 py-2 text-black">Xin chào <span class="font-bold text-[#A11917]"><?= $username ?></span></h3>
                                <?php
                                if (isset($role) && $role == 1) {
                                ?>
                                    <ul>
                                        <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="admin/index.php">QUẢN TRỊ</a></li>
                                        <hr>
                                        <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="index.php?act=logout">ĐĂNG XUẤT</a></li>
                                    </ul>
                                <?php
                                } else {
                                ?>
                                    <ul>
                                        <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="index.php?act=profile">THÔNG TIN TÀI KHOẢN</a></li>
                                        <hr>
                                        <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="index.php?act=view_bill">ĐƠN HÀNG CỦA TÔI</a></li>
                                        <hr>
                                        <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="index.php?act=logout">ĐĂNG XUẤT</a></li>
                                    </ul>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <ul id="account" class="hidden bg-white absolute z-20 top-[70px] shadow-md w-[200px]">
                            <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="index.php?act=signin">ĐĂNG NHẬP</a></li>
                            <hr>
                            <li class="px-3 py-2 text-black hover:text-[#A11917]"><a href="index.php?act=signup">ĐĂNG KÝ</a></li>
                        </ul>
                    <?php
                    }
                    ?>

                    <?php
                    ?>
                    <a href="#">TÀI KHOẢN</a>

                </li>
                <li class="px-4 py-6 hover:text-[#35FC26]"><a href="index.php?act=addtocart">GIỎ HÀNG</a></li>
            </ul>
        </div>

    </header>

    <?php
