<div class="flex">
    <div class="header listsp">
        <div class="title-small">
            <div class="icon-menu">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
            <p>Đơn hàng</p>
        </div>
        <div class="name-setting-admin">
            <p><i class="fa-solid fa-caret-down"></i></p>
            <ul class="nav">
                <li><a href="">Đăng Xuất</a></li>
            </ul>
        </div>
    </div>
    <div class="find-pr-cat listsp">
        <form action="index.php?act=listsp" method="post">
            <?php
            $sum = 0;
            for ($i = 0; $i < sizeof($soLuongDh); $i++) {
                $sum++;
            }
            ?>
            <label for="">Đơn hàng đang có: <span><?= $sum ?></span> </label> <br> <br>
            <input type="text" name="nameFind" value="<?= isset($namePr) ? $namePr : "" ?>" placeholder="Nhập tên sản phẩm muốn tìm">
            <button type="submit" name="btn-findPr">Tìm kiếm</button>
        </form>

    </div>
    <div class="table-manager listsp">
        <table border="1">
            <h2>Quản lý Đơn Hàng</h2>
            <div class="form listsp">
                <select name="" id="" class="selection listsp">
                    <option value="" hidden>Tìm Theo</option>
                    <option value="">Theo A - Z</option>
                    <option value="">Theo Z - A</option>
                    <option value="">Số lượng thấp đến cao</option>
                </select>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm không?')" href=""><button class="btn-see accountClient btn-deleteAll" disabled>Xóa tất cả</button></a>
                <button id="Allproduct" style="padding: 11px 10px; border-radius: 5px;">Chọn tất cả</button>
                </form>
            </div>

            <?php if (isset($thongbao)) : ?>
                <div class="alert alert-success">
                    <?= $thongbao ?>
                </div>
            <?php endif ?>
            <tr>
                <th><input type="checkbox" id="checkBoxAll"></th>
                <th>STT</th>
                <th class="idProduct">Mã Khách Hàng</th>
                <th class="nameProduct">Tên Sản Phẩm</th>
                <th>Số lượng</th>
                <th class="nameCategory">Giá trị</th>
                <th class="priceProduct">Tình trạng đơn hàng</th>
                <th class="priceProduct">Ngày đặt hàng</th>
                <th>Thao tác</th>
            </tr>

            <?php
            $listbill = loadAll_bill();
           
            $id = 0;
            foreach ($listbill as $sp) {
                extract($sp);
                $id++;
                $kh = $sp["bname"] . '<br>
                ' . $sp["b_total_price"];
                $count = loadAll_cart_count($sp["bid"]);
                $ttdh = get_ttdh($sp['b_status']);
            ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?= $id ?></td>
                    <td>KH00<?= $uid ?></td>
                    <td><?php echo $sp['bname'] ?></td>
                    <td>
                        <?php echo $count ?>
                    </td>
                    <td><?php echo $sp['b_total_price'] ?></td>
                    <td>
                    <?php
                    if ($ttdh == 0) {
                        echo $ttdh;
                    }elseif($ttdh == 1){
                        echo $ttdh;
                    }elseif($ttdh == 2){
                        echo $ttdh;
                    }elseif($ttdh == 3){
                        echo $ttdh;
                    }else{
                        echo $ttdh;
                    }
                    ?>
                    </td>
                    <td><?php echo $sp['b_date'] ?></td>
                    <td>
                        <div class="btn listsp">
                            <a href="index.php?act=suabill&bid=<?= $bid ?>"><button class="repair">Sửa</button></a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa <?= $pname ?> không?')" href="index.php?act=xoabill&bid=<?= $bid ?>"><button class="delete">Xóa</button></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <script>
            const chooseInputAll = document.getElementsByTagName('input');
            const btnRemove = document.querySelectorAll('.delete');
            const btnRemoveAll = document.querySelector('.btn-deleteAll');
            const allProduct = document.querySelector('#Allproduct');
            let flag = 0;
            allProduct.addEventListener('click', function() {
                flag++;
                if (flag % 2 != 0) {
                    for (let i = 1; i < chooseInputAll.length; i++) {
                        chooseInputAll[i].checked = true;
                        btnRemoveAll.disabled = false;
                        // btnRemove.disabled = false;
                        for (let j = 0; j < btnRemove.length; j++) {
                            if (i - 1 == j) {
                                btnRemove[j].disabled = false;
                            }
                        }
                    }
                } else {
                    for (let i = 1; i < chooseInputAll.length; i++) {
                        chooseInputAll[i].checked = false;
                        btnRemoveAll.disabled = true;
                        // btnRemove.disabled = true;
                        for (let j = 0; j < btnRemove.length; j++) {
                            btnRemove[j].disabled = true;
                        }
                    }
                }
            });
            chooseInputAll[1].addEventListener('change', function() {
                if (chooseInputAll[1].checked == true) {
                    for (let i = 2; i < chooseInputAll.length; i++) {
                        chooseInputAll[i].checked = true;
                        btnRemoveAll.disabled = false;
                        for (let j = 0; j < btnRemove.length; j++) {
                            if (i - 2 == j) {
                                btnRemove[j].disabled = false;
                            }
                        }
                    }
                } else {
                    for (let i = 2; i < chooseInputAll.length; i++) {
                        chooseInputAll[i].checked = false;
                        btnRemoveAll.disabled = true;
                        for (let j = 0; j < btnRemove.length; j++) {
                            btnRemove[j].disabled = true;
                        }
                    }
                }
            });

            for (let i = 2; i < chooseInputAll.length; i++) {
                chooseInputAll[i].addEventListener('change', function() {
                    if (chooseInputAll[i].checked == true) {
                        for (let j = 0; j < btnRemove.length; j++) {
                            if (i - 2 == j) {
                                btnRemove[j].disabled = false;
                            }
                        }
                    } else {
                        for (let j = 0; j < btnRemove.length; j++) {
                            btnRemove[j].disabled = true;
                        }
                    }
                });
            }
        </script>
    </div>
</div>
<style>
    .container {
        max-width: 1600px;
        margin: 0 auto;
        display: flex;
        justify-content: flex-end;
    }
</style>