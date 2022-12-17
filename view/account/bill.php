<?php

?>
<div class="container mx-auto">
    <div class="">
        <div class="">
            <div>
                <h2 class="my-3 text-[28px] font-bold">ĐƠN HÀNG CỦA TÔI</h2>
                <?php

                foreach ($bills as $bill) {
                    extract($bill);
                    $status = get_ttdh($b_status);
                    $products = load_products_cart($bid);
                ?>
                    <div class="border">
                        <p>Mã đơn: PO-<?= $bid ?></p>
                        <p>Ngày mua hàng: <?= $b_date ?></p>
                        <p>Trạng thái đơn hàng: <?= $status ?></p>
                        <?php
                        foreach ($products as $product) {
                            extract($product);
                        ?>
                            <div><?= $name ?> x <?= $quantity ?></div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>