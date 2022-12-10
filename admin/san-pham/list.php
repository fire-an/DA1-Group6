<div class="flex">
    <div class="header listsp">
        <div class="title-small">
            <div class="icon-menu">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
            <p>Sản phẩm</p>
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
            for ($i = 0; $i < sizeof($soLuongSp); $i++) {
                $sum++;
            }
            ?>
            <label for="">Số lượng sản phẩm đang có: <span><?= $sum ?></span> </label> <br> <br>
            <input type="text" name="nameFind" value="<?= isset($namePr) ? $namePr : "" ?>" placeholder="Nhập tên sản phẩm muốn tìm">
            <button type="submit" name="btn-findPr">Tìm kiếm</button>
        </form>

    </div>
    <div class="table-manager listsp">
        <table border="1">
            <h2>Quản lý sản phẩm</h2>
            <div class="form listsp">
                <select name="" id="" class="selection listsp">
                    <option value="" hidden>Tìm Theo</option>
                    <option value="">Theo A - Z</option>
                    <option value="">Theo Z - A</option>
                    <option value="">Số lượng thấp đến cao</option>
                </select>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm không?')" href=""><button class="btn-see accountClient btn-deleteAll" disabled>Xóa tất cả</button></a>
                <button id="Allproduct" style="padding: 11px 10px; border-radius: 5px;">Chọn tất cả</button>
                <form action="index.php?act=listsp" method="post">
                    <select name="iddm" id="" class="selection one">
                        <option value="0" selected>Tất Cả</option>
                        <?php foreach ($listdm as $value) : ?>
                            <option value="<?= $value['cid'] ?>" <?= ($iddm == $value['cid']) ? "selected" : "" ?>><?= $value['cname'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="submit" name="btn-finDm" class="btn-see find">Tìm theo danh mục</button>
                </form>
                <a href="index.php?act=addsp"><button class="btn-see"><i class="fa-solid fa-plus"></i>Thêm mới</button></a>
            </div>
            <div class="btn-list">
                <ul class="menu-list">

                </ul>
            </div>
            <?php if (isset($thongbao)) : ?>
                <div class="alert alert-success">
                    <?= $thongbao ?>
                </div>
            <?php endif ?>

            <tr>
                <th><input type="checkbox" id="checkBoxAll"></th>
                <th>STT</th>
                <th class="idProduct">Mã sản phẩm</th>
                <th class="nameProduct">Tên sản phẩm</th>
                <th>Ảnh</th>
                <th class="nameCategory">Tên danh mục</th>
                <th class="priceProduct">Giá Ban Đầu</th>


                <th>Trạng Thái</th>
                <th>Thao tác</th>
            </tr>

            <?php
            $id = 0;
            foreach ($p_list as $sp) {
                extract($sp);
                $id++;
                $imagePath = "../assets/uploads/" . $sp['image'];
                if (is_file($imagePath)) {
                    $hinh = "<img src='" . $imagePath . "' alt='' width='150px' height='150px'>";
                } else {
                    $hinh = "<h3>Không có hình ảnh</h3>";
                }
            ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?php echo $id ?></td>
                    <td>SP00<?= $pid ?></td>
                    <td><?php echo $sp['pname'] ?></td>
                    <td>
                        <?php echo $hinh ?>
                    </td>
                    <td><?php echo $sp['cname'] ?></td>
                    <td><?php echo $sp['price'] ?>Vnđ</td>


                    <td>
                        <?php
                        if ($sp['brand'] == 0) {
                            echo "Còn hàng";
                        } else {
                            echo "Hết hàng";
                        }
                        ?>

                    </td>


                    <td>
                        <div class="btn listsp">
                            <a href="index.php?act=suasp&pid=<?= $pid ?>"><button class="repair">Sửa</button></a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa <?= $pname ?> không?')" href="index.php?act=xoasp&pid=<?= $pid ?>"><button class="delete">Xóa</button></a>
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