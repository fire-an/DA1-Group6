<?php
print_r($_SESSION['cart']);


?>
<div class="mx-auto container mb-[50px]">
    <h2 class="my-3 text-[28px] font-bold">CHI TIẾT ĐƠN HÀNG</h2>
    <table class="table-auto border border-collapse">

        <?php
        viewcart(1);
        ?>
    </table>
    <div class="mt-4">
        <button class="text-white py-2 px-4 bg-[#4ADE80] mr-3"><a href="index.php?act=bill"><input type="button" value="Đặt hàng"></a></button>
        <button class="text-white py-2 px-4 bg-[#FF0000]"><a href="index.php?act=delcart"><input type="button" value="Xóa giỏ hàng"></a>
    </div>
</div>