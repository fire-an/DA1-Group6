<div class="container mx-auto">
    <div>
        <form action="index.php?act=billconfirm" method="post">
            <h2 class="text-[20px] font-bold my-5">THÔNG TIN ĐẶT HÀNG</h2>
            <table class="table-auto border border-collapse">
                <?php
                var_dump($_SESSION['user']);
                var_dump($_SESSION['cart']);
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['real_name'];
                    $email = $_SESSION['user']['email'];
                    $address = $_SESSION['user']['address'];
                    $tel = $_SESSION['user']['phone'];
                } else {
                    $name = "";
                    $email = "";
                    $address = "";
                    $tel = "";
                }


                ?>
                <tr>
                    <td class="border p-2">Người đặt hàng</td>
                    <td class="border"><input class="w-full" type="text" name="name" value="<?= $name ?>"></td>
                </tr>
                <tr>
                    <td class="border p-2">Địa chỉ</td>
                    <td class="border"><input class="w-full" type="text" required name="address" value="<?= $address ?>"></td>
                </tr>
                <tr>
                    <td class="border p-2">Email</td>
                    <td><input class="w-[300px] pl-2" type="text" name="email" required value="<?= $email ?>"></td>
                </tr>
                <tr>
                    <td class="border p-2">Điện thoại</td>
                    <td class="border p-2"><input type="text" name="tel" required value="<?= $tel ?>"></td>
                </tr>
            </table>
            <div>
                <h2 class="text-[20px] font-bold my-5">PHƯƠNG THỨC THANH TOÁN</h2>

                <input class="mr-2" type="radio" value="1" name="pttt" checked>Trực tiếp <br>
                <input class="mr-2" type="radio" value="2" name="pttt">Chuyển khoản <br>
                <input class="mr-2" type="radio" value="3" name="pttt">Online<br>

            </div>
            <div>
                <h2 class="text-[20px] font-bold my-5">CHI TIẾT ĐƠN HÀNG</h2>
                <table class="table-auto border border-collapse">

                    <?php
                    viewcart(0);
                    ?>
                </table>
            </div>
            <div>
                <button class="mt-3 text-white py-2 px-4 bg-[#4ADE80]"><input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang"></button>
            </div>
        </form>
    </div>


</div>