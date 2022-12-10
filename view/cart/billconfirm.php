<div class="container mx-auto">
    <div>
        <h2 class="text-[20px] font-bold my-5">CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT HÀNG</h2>
    </div>
    <?php
    if (isset($bill) && (is_array($bill))) {
        extract($bill);
    }
    ?>
    <div class="border-2 my-5 p-5">
        <h2 class="text-[20px] font-bold my-5">THÔNG TIN ĐƠN HÀNG</h2>
        <div>
            <ul>
                <li>Mã đơn hàng: PO-<?= $bill['bid'] ?></li>
                <li>Ngày đặt hàng: <?= $bill['b_date'] ?></li>
                <li>Tổng đơn hàng: <?= $bill['b_total_price'] ?></li>
                <li>Phương thức thanh toán: <?= $bill['b_payment_method'] ?></li>
            </ul>

        </div>
    </div>
    <div class="border-2 my-5 p-5">
        <h2 class="text-[20px] font-bold my-5">THÔNG TIN ĐẶT HÀNG</h2>
        <table class="table-auto border border-collapse">
            <tr>
                <td class="border p-2 font-bold">Người đặt hàng</td>
                <td class="border p-2"><?= $bill['bname'] ?></td>
            </tr>
            <tr>
                <td class="border p-2 font-bold">Địa chỉ</td>
                <td class="border p-2"><?= $bill['b_address'] ?></td>
            </tr>
            <tr>
                <td class="border p-2 font-bold">Email</td>
                <td class="border p-2"><?= $bill['b_email'] ?></td>
            </tr>
            <tr>
                <td class="border p-2 font-bold">Điện thoại</td>
                <td class="border p-2"><?= $bill['b_phone'] ?></td>
            </tr>
        </table>
    </div>
    <div class="border-2 my-5 p-5">
        <h2 class="text-[20px] font-bold my-5">CHI TIẾT GIỎ HÀNG</h2>
        <table class="table-auto border border-collapse">
            <?php
            bill_chi_tiet($billct);
            ?>
        </table>
    </div>
</div>