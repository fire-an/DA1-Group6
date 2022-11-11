<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- HEADER -->
    <header class="bg-black">
        <div class="flex container mx-auto text-white items-center justify-between">
            <div>
                <a href="#">
                    <img class="w-[250px]" src="https://theme.hstatic.net/1000037809/1000944346/14/logo.png?v=49" alt="" />
                </a>
            </div>
            <div>
                <form action="">
                    <input type="text" placeholder="Tìm kiếm sản phẩm" />
                    <button class="bg-[363636]" type="submit">Search</button>
                </form>
            </div>
            <ul class="flex">
                <li class="px-4 hover:text-[#35FC26]">
                    <a href="#">LINH KIỆN PC</a>
                </li>
                <li class="px-4 hover:text-[#35FC26]"><a href="#">MÀN HÌNH</a></li>
                <li class="px-4 hover:text-[#35FC26]"><a href="#">GAMING GEAR</a></li>
                <li class="px-4 hover:text-[#35FC26]"><a href="#">BÀN GHẾ</a></li>
                <li class="px-4 hover:text-[#35FC26]"><a href="#">TÀI KHOẢN</a></li>
                <li class="px-4 hover:text-[#35FC26]"><a href="#">GIỎ HÀNG</a></li>
            </ul>
        </div>
    </header>
    <!-- BANNER -->
    <div class="container mx-auto">
        <div class="flex">
            <img class="w-3/5" src="https://theme.hstatic.net/1000037809/1000944346/14/banner_slider_5_large.jpg?v=49" alt="" />

            <div class="w-2/5 flex-col space-y-10">
                <div class="flex items-center">
                    <div class="bg-red-500 py-3 px-6 text-white">REVIEW</div>
                    <marquee class="text-2xl font-bold" direction="left">Review các sản phẩm công nghệ</marquee>
                </div>
                <img class="w-full" src="https://theme.hstatic.net/1000037809/1000944346/14/smallbanner_img1.jpg?v=49" alt="" />
                <img class="w-full" src="https://theme.hstatic.net/1000037809/1000944346/14/smallbanner_img2.jpg?v=49" alt="" />
            </div>
        </div>
        <div>
            <img class="w-full" src="https://theme.hstatic.net/1000037809/1000944346/14/home_banner_img.jpg?v=49" alt="" />
        </div>
    </div>