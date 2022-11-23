<div class="container mx-auto mt-5">
    <div class="flex justify-between">
        <div class="wrapper w-3/5 relative">
            <div class="carousel">
                <div class="inner">
                    <div class="slide active">

                    </div>
                    <div class="slide">

                    </div>
                    <div class="slide">

                    </div>
                </div>
                <div class="arrow arrow-left"></div>
                <div class="arrow arrow-right"></div>
            </div>

        </div>

        <div class="w-2/5 flex-col space-y-[82px]">
            <div class="flex items-center">
                <div class="bg-red-500 py-3 px-6 text-white">REVIEW</div>
                <marquee class="text-2xl font-bold" direction="left">Review các sản phẩm công nghệ</marquee>
            </div>
            <img class="w-full" src="https://theme.hstatic.net/1000037809/1000944346/14/smallbanner_img1.jpg?v=49" alt="" />
            <img class="w-full" src="https://theme.hstatic.net/1000037809/1000944346/14/smallbanner_img2.jpg?v=49" alt="" />
        </div>
    </div>
    <div class="mt-3">
        <img class="w-full" src="https://theme.hstatic.net/1000037809/1000944346/14/home_banner_img.jpg?v=49" alt="" />
    </div>
</div>
<section class="container mx-auto mt-4">
    <div class="flex bg-black item-center py-2 px-3 justify-between">
        <div class="text-[#35FC26] text-2xl font-semibold">SẢN PHẨM MỚI</div>
        <a class="text-white hover:text-[#35FC26]" href="#">Xem tất cả ></a>
    </div>
    <div class="grid grid-cols-5">
        <?php
        foreach ($p_new as $p) {
            extract($p);
            $p_link = "index.php?act=product_detail&pid=" . $pid;
            $c_link = "index.php?act=product&cid=" . $cid;
            echo
            '<div class="border border-2 p-5">
                <div class="h-[400px]">
                    <a class="text-[#3494e0] text-lg font-bold" href="' . $p_link . '">' . $pname . '<img src="' . $image . '" alt=""></a>
                </div>
                <p class="text-red-600 font-semibold">' . $price . '</p>
                <a href="' . $c_link . '">' . $cname . '</a>
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="' . $pid . '">
                    <input type="hidden" name="name" value="' . $pname . '">
                    <input type="hidden" name="img" value="' . $image . '">
                    <input type="hidden" name="price" value="' . $price . '">
                    <button class="bg-[#653332] text-white w-full py-3 mt-3"><input type="submit" name="addtocart" value="Thêm vào giỏ hàng"></button>
                </form>
            </div>';
        }
        ?>



</section>