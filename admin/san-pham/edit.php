<?php
    if(is_array($detailSp)){
        extract($detailSp);
       
    }
    $imagePath = "../imageProduct/".$image;
    if(is_file($imagePath)){
        $hinh = "<img src='".$imagePath."' alt='' width='150px' height='150px'>";
    }else{
        $hinh = "<h3>Không có hình ảnh</h3>";
    }
?>
<div class="form form-2">
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
        <h2>Cập nhật Sản Phẩm</h2>
        <input type="hidden" name="pid" value="<?= $pid ?>">
        <div class="columnProduct1">
            <p>Tên sản phẩm:</p>
            <input type="text" name="nameProduct" autocomplete="off" value="<?= $pname ?>">
        </div>
      
        <div class="columnProduct2">
            <p>Số lượng sản phẩm:</p>
            <input type="number" name="amountProduct" autocomplete="off" value="<?= $quantity ?>">
        </div>

        <div class="columnProduct3">
            <p>Giá sản phẩm:</p>
            <input type="text" name="priceProduct" autocomplete="off" value="<?= $price ?>">
        </div>

        <div class="columnProduct4">
            <p>Giá đã giảm:</p>
            <input type="text" name="discountProduct" autocomplete="off" value="<?= $discount ?>">
        </div>

        <div class="columnProduct5">
            <p>Danh mục sản phẩm:</p>
            <select name="catProduct" id="">
                <?php foreach($listdm as $value): ?>
                   
                <?php endforeach ?>
                <?php foreach ($listdm as $i => $v) { ?>
                            <option value="<?php echo $v['cid'] ?>" <?php echo ($v['cid'] == $detailSp['cid']) ? 'selected' : '' ?>>
                                <?php echo $v['cname'] ?></option>
                        <?php } ?>
            </select>
        </div>

        <div class="columnProduct6">
            <p>Trạng thái sản phẩm:</p>
            <!-- <input type="text" name="statusProduct" autocomplete="off" value=""> -->
            <select name="statusProduct" id="">
                <option value="89" hidden>Chọn trạng thái sản phẩm</option>
                <option value="0" <?= $detailSp['brand']==0 ? "selected" : "" ?> >Còn hàng</option>
                <option value="1" <?= $detailSp['brand']!=0 ? "selected" : "" ?>  >Hết hàng</option>
            </select>
        </div>
        
        <div class="columnProduct7">
            <p>Ảnh sản phẩm:</p>
            <div class="input-image">
                <input type="file" name="imageProduct">
                <input type="hidden" name="imageProduct" value="<?= $image ?>">
                <div class="img-update">
                    <?= $hinh ?>
                </div>
            </div>
        </div>

        <div class="columnProduct8">
            <p>Mô tả sản phẩm:</p>
            <textarea name="description" id="" cols="55" rows="7"><?= $description ?></textarea>
        </div>

        <div class="btn-add">
            <button type="submit" name="btn-edit-sp">Cập nhật</button>
            <input class="btn-hight" type="reset" value="Nhập Lại">
            <a href="index.php?act=listsp">
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