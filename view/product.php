<div class="container mx-auto mt-5 mb-[80px]">
    <div class="grid grid-cols-4 gap-8 relative">
        <div class="sticky top-0">
            <div id="filter-search" class="border-2 p-3">
                <h3 class="font-bold text-xl">TÌM KIẾM SẢN PHẨM</h3>
                <hr class="my-3" />
                <h3 class="text-lg font-semibold">TÌM KIẾM THEO DANH MỤC</h3>
                <ul>
                    <?php
                    foreach ($c_list as $category) {
                        extract($category);
                        $c_link = "index.php?act=product&cid=" . $cid;
                        echo '<li class=""><a href="' . $c_link . '">' . $cname . '</a></li>';
                    }

                    ?>

                </ul>
                <hr class="my-3" />
                <h3 class="text-lg font-semibold">TÌM KIẾM THEO KHOẢNG GIÁ</h3>
                <ul>
                    <li><a href="index.php?act=price_down_500">Dưới 500.000đ</a></li>
                    <li><a href="index.php?act=price_500_800">Từ 500.000đ - 800.000đ</a></li>
                    <li><a href="index.php?act=price_800_1000">Từ 800.000đ - 1.000.000đ</a></li>
                    <li><a href="index.php?act=price_1000_2000">Từ 1.000.000đ - 2.000.000đ</a></li>
                    <li><a href="index.php?act=price_up_2000">Trên 2.000.000</a></li>
                </ul>
                <hr class="my-3" />
                <h3 class="text-lg font-semibold">TÌM KIẾM THEO TÊN HÃNG</h3>
                <ul>
                    <li><a href="">ASUS</a></li>
                    <li><a href="">APPLE</a></li>
                    <li><a href="">LOGITECH</a></li>
                    <li><a href="">SAMSUNG</a></li>
                    <li><a href="">NVIDIA</a></li>
                </ul>
            </div>
        </div>

        <div class="col-span-3">
            <h3 class="text-xl font-bold mb-5">KẾT QUẢ TÌM KIẾM VỚI TỪ KHÓA <? echo $_POST['kyw'] ?></h3>
            <div class="grid grid-cols-3">
                <?php
                foreach ($p_list as $p) {
                    if (!empty($p_list)) {
                        extract($p);
                        $p_link = "index.php?act=product_detail&pid=" . $pid;
                        $c_link = "index.php?act=product&cid=" . $cid;
                        echo
                        '<div class="border border-2 p-5">
                <a class="text-[#3494e0] text-lg font-bold" href="' . $p_link . '"><div class="h-[120px]">' . $pname . '</div><img src="' . $image . '" alt=""></a>
                <p class="text-red-600 font-semibold">' . $price . '</p>
                <a href="' . $c_link . '">' . $cname . '</a>
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="' . $pid . '">
                    <input type="hidden" name="name" value="' . $pname . '">
                    <input type="hidden" name="img" value="' . $image . '">
                    <input type="hidden" name="price" value="' . $price . '">
                </form>
            </div>';
                    } else {
                        echo 'Không tìm thấy sản phẩm';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>