<div class="container mx-auto mt-5">
    <div class="grid grid-cols-4 gap-8 relative">
        <div class="sticky top-0">
            <div id="filter-search" class="border-2 p-3">
                <h3 class="font-bold text-xl">TÌM KIẾM SẢN PHẨM</h3>
                <hr class="my-3" />
                <h3 class="text-lg font-semibold">TÌM KIẾM THEO DANH MỤC</h3>
                <ul>
                    <li><a href="">Danh mục 1</a></li>
                    <li><a href="">Danh mục 2</a></li>
                    <li><a href="">Danh mục 3</a></li>
                    <li><a href="">Danh mục 4</a></li>
                    <li><a href="">Danh mục 5</a></li>
                </ul>
                <hr class="my-3" />
                <h3 class="text-lg font-semibold">TÌM KIẾM THEO KHOẢNG GIÁ</h3>
                <ul>
                    <li><a href="">Dưới 500.000đ</a></li>
                    <li><a href="">Từ 500.000đ - 800.000đ</a></li>
                    <li><a href="">Từ 800.000đ - 1.000.000đ</a></li>
                    <li><a href="">Từ 1.000.000đ - 2.000.000đ</a></li>
                    <li><a href="">Trên 2.000.000</a></li>
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
            <h3 class="text-xl font-bold mb-5">KẾT QUẢ TÌM KIẾM</h3>
            <div class="grid grid-cols-3">
                <!-- <a href="#">
                    <div class="border-2 px-6 py-6">
                        <div class="relative">
                            <div class="absolute bg-[#A11917] text-white px-2 py-1">
                                -12%
                            </div>
                            <div class="absolute bg-[#A11917] text-white px-2 py-1 right-0">
                                HẾT
                            </div>
                            <img class="mx-auto" src="https://product.hstatic.net/1000037809/product/logitech_g102_lightsync_rgb_black_5ad3c72931ec44a7a27926cb45547be8_medium.png" alt="" />
                        </div>
                        <p>Chuột chơi game có dây Logitech G102</p>
                        <div class="flex justify-between">
                            <p class="text-[#a11917] font-bold text-xl">513.000đ</p>
                            <p class="text-gray-500 text-xl line-through">590.000đ</p>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="border-2 px-6 py-6">
                        <div class="relative">
                            <div class="absolute bg-[#A11917] text-white px-2 py-1">
                                -12%
                            </div>
                            <div class="absolute bg-[#A11917] text-white px-2 py-1 right-0">
                                HẾT
                            </div>
                            <img class="mx-auto" src="https://product.hstatic.net/1000037809/product/logitech_g102_lightsync_rgb_black_5ad3c72931ec44a7a27926cb45547be8_medium.png" alt="" />
                        </div>
                        <p>Chuột chơi game có dây Logitech G102</p>
                        <div class="flex justify-between">
                            <p class="text-[#a11917] font-bold text-xl">513.000đ</p>
                            <p class="text-gray-500 text-xl line-through">590.000đ</p>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="border-2 px-6 py-6">
                        <div class="relative">
                            <div class="absolute bg-[#A11917] text-white px-2 py-1">
                                -12%
                            </div>
                            <div class="absolute bg-[#A11917] text-white px-2 py-1 right-0">
                                HẾT
                            </div>
                            <img class="mx-auto" src="https://product.hstatic.net/1000037809/product/logitech_g102_lightsync_rgb_black_5ad3c72931ec44a7a27926cb45547be8_medium.png" alt="" />
                        </div>
                        <p>Chuột chơi game có dây Logitech G102</p>
                        <div class="flex justify-between">
                            <p class="text-[#a11917] font-bold text-xl">513.000đ</p>
                            <p class="text-gray-500 text-xl line-through">590.000đ</p>
                        </div>
                    </div>
                </a> -->
                <?php
                foreach ($dssp as $sp) {
                    extract($sp);
                    $p_link = "index.php?act=sanphamct&idsp=" . $id;
                    $c_link = "index.php?act=sanpham&iddm=" . $iddm;
                    $hinh = $img_path . $img;
                    // $dm = load_danh_muc($iddm);
                    echo
                    '<div class="border border-2 p-5">
                <a class="text-[#3494e0] text-lg font-bold" href="' . $linksp . '">' . $name . '<img src="' . $hinh . '" alt=""></a>
                <p class="text-red-600 font-semibold">' . $price . '</p>
                <a href="' . $linkdm . '">' . $dm . '</a>
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="' . $id . '">
                    <input type="hidden" name="name" value="' . $name . '">
                    <input type="hidden" name="img" value="' . $img . '">
                    <input type="hidden" name="price" value="' . $price . '">
                    <button class="bg-[#653332] text-white w-full py-3 mt-3"><input type="submit" name="addtocart" value="Thêm vào giỏ hàng"></button>
                </form>
            </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>