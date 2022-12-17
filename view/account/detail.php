<div class="container mx-auto">
    <div class="">
        <div class="">
            <div>
                <h2 class="my-3 text-[28px] font-bold">CẬP NHÂT TÀI KHOẢN</h2>
                <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
                <form action="index.php?act=edit_user" method="post">
                    <div class="grid grid-cols-2">
                        <div>
                            Email <br>
                            <input class="border-2 my-2 w-2/5" type="email" name="email" value="<?= $email ?>"><br>
                            Tên đăng nhập<br>
                            <input class="border-2 my-2 w-2/5" type="text" name="username" value="<?= $username ?>"><br>
                            Mật khẩu<br>
                            <input class="border-2 my-2 w-2/5" type="password" name="password" value="<?= $password ?>"><br>
                            Địa chỉ<br>
                            <input class="border-2 my-2 w-2/5" type="text" name="address" value="<?= $address ?>"><br>

                        </div>
                        <div>
                            Tên thật <br>
                            <input class="border-2 my-2 w-2/5" type="text" name="real_name" value="<?= $real_name ?>"> <br>
                            Tuổi <br>
                            <input class="border-2 my-2 w-2/5" type="number" name="age" value="<?= $age ?>"> <br>
                            Điện thoại<br>
                            <input class="border-2 my-2 w-2/5" type="text" name="phone" value="<?= $phone ?>"><br>
                            <input type="hidden" name="uid" value="<?= $uid ?>">
                        </div>
                    </div>


                    <input class="mt-3 border-2 bg-green-400 px-4 py-2 cursor-pointer text-white" type="submit" value="Cập nhật" name="update_account">
                    <input class="mt-3 border-2 bg-red-400 px-4 py-2 cursor-pointer text-white" type="reset" value="Nhập lại">
                </form>
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </div>
        </div>
    </div>
</div>