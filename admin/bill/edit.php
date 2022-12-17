<div class="form form-2">
    <?php
    if (is_array($detailBill)) {
        extract($detailBill);
    }
    // $imagePath = "../imageProduct/" . $profile_image;
    // if (is_file($imagePath)) {
    //     $hinh = "<img class='myAvatar' src='" . $imagePath . "' alt='' width='150px' height='150px'>";
    // } else {
    //     $hinh = "<p>Chưa có hình ảnh đại diện</p>";
    // }
    ?>
    <form action="index.php?act=updatebill" method="POST" enctype="multipart/form-data">
        <h2>Cập nhật Đơn hàng</h2>
        <div class="columnProduct7">
            <p>Tình trạng đơn hàng:</p>
            <select name="statusProduct" id="">
                <option value="89" hidden>Chọn trạng thái sản phẩm</option>
                <option value="0" <?= $detailBill['b_status'] == 0 ? "selected" : "" ?>>Đơn hàng mới</option>
                <option value="1" <?= $detailBill['b_status'] == 1 ? "selected" : "" ?>>Đang xử lý</option>
                <option value="2" <?= $detailBill['b_status'] == 2 ? "selected" : "" ?>>Đang giao hàng</option>
                <option value="3" <?= $detailBill['b_status'] == 3 ? "selected" : "" ?>>Đã giao hàng</option>
                <option value="4" <?= $detailBill['b_status'] == 4 ? "selected" : "" ?>>Đã hoàn thành</option>
                <option value="5" <?= $detailBill['b_status'] == 5 ? "selected" : "" ?>>Đã hủy dơn</option>
            </select>
            <input type="hidden" name="bid" value="<?= $detailBill['bid'] ?>">
        </div>

        <div class="btn-add">
            <input type="hidden" name="uid" value="<?= $uid ?>">
            <button type="submit" name="btn-repair-bill">Cập nhật</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=listbill">
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