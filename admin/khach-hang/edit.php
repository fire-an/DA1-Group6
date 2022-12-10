<div class="form form-2">
    <?php
    // if (is_array($detailKh)) {
    //     extract($detailKh);
    // }
    extract($detailKh);
    $imagePath = "../imageProduct/" . $profile_image;
    if (is_file($imagePath)) {
        $hinh = "<img class='myAvatar' src='" . $imagePath . "' alt='' width='150px' height='150px'>";
    } else {
        $hinh = "<p>Chưa có hình ảnh đại diện</p>";
    }
    ?>
    <form action="index.php?act=updatekh" method="POST" enctype="multipart/form-data">
        <h2>Cập nhật Tài Khoản</h2>
        <div class="columnProduct1">
            <p>Tên khách hàng:</p>
            <input type="text" name="nameAccount" autocomplete="off" value="<?= $username ?>">
        </div>

        <div class="columnProduct2">
            <p>Email:</p>
            <input type="text" name="emailAccount" autocomplete="off" value="<?= $email ?>">
        </div>

        <div class="columnProduct3">
            <p>Mật khẩu:</p>
            <input type="text" name="passAccount" autocomplete="off" value="<?= $password ?>">
        </div>

        <div class="columnProduct4">
            <p>Địa chỉ:</p>
            <input type="text" name="addressAccount" autocomplete="off" value="<?= $address ?>">
        </div>

        <div class="columnProduct6">
            <p>Số điện thoại:</p>
            <input type="text" name="telephoneAccount" autocomplete="off" value="<?= $phone ?>">
        </div>
        <div class="columnProduct7">
            <p>Ảnh đại diện:</p>
            <?= $hinh ?> <br>
            <input type="file" name="avatarAccount">
            <input type="hidden" name="avatarAccount" value="<?= $image ?>">
        </div>
        <div class="btn-add">
            <input type="hidden" name="uid" value="<?= $uid ?>">
            <button type="submit" name="btn-repair-account">Cập nhật</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=dskh">
                <input class="btn-hight" type="button" value="Danh sách">
            </a>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
    </form>
</div>