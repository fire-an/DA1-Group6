<div class="flex">
<div class="title">
    <h2>Thêm Tài Khoản</h2>
</div>
<div class="form form-2">
    <form action="index.php?act=addkh" method="POST" enctype="multipart/form-data">
        <div class="columnProduct1">
            <p>Tên khách hàng:</p>
            <input type="text" name="nameAccount" autocomplete="off" value="">
            <?php echo isset($error['user']) ? $error['user'] : "" ?>
        </div>

        <div class="columnProduct2">
            <p>Email:</p>
            <input type="text" name="emailAccount" autocomplete="off" value="">
            <?php echo isset($error['email']) ? $error['email'] : "" ?>
        </div>

        <div class="columnProduct3">
            <p>Mật khẩu:</p>
            <input type="text" name="passAccount" autocomplete="off" value="">
            <?php echo isset($error['password']) ? $error['password'] : "" ?>
            <?php echo isset($error['pwsize']) ? $error['pwsize'] : "" ?>
        </div>

        <div class="columnProduct4">
            <p>Số điện thoại:</p>
            <input type="text" name="telephoneAccount" autocomplete="off" value="">
            <?php echo isset($error['telephone']) ? $error['telephone'] : "" ?>
        </div>
        <div class="columnProduct5">
            <p>Địa chỉ:</p>
            <input type="text" name="address" autocomplete="off" value="">
            <?php echo isset($error['address']) ? $error['address'] : "" ?>
        </div>
        <div class="btn-add">
            <button type="submit" name="btn-add">Thêm Mới</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=dskh">
                <input class="btn-hight" type="button" value="Danh sách">
            </a>
        </div>
        <div class="columnProduct6">
            <p>Ảnh đại diện:</p>
            <div class="input-image">
                <input type="file" multiple name="imageProduct">
                <?php echo isset($error['img_type']) ? $error['img_type'] : "" ?>
            </div>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
            
        }
        ?>
    </form>
</div>
</div>