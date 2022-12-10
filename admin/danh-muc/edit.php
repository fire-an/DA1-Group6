<?php
if(is_array($detailDm)){
    extract($detailDm);
}
?>
    <div class="form">
  
        <form action="index.php?act=updatedm" method="POST">
            <h2>Cập Nhật Danh Mục</h2>
            <p>Tên danh mục:</p>
            <input type="text" name="cname" autocomplete="off" value="<?=(isset($cname) && $cname != "") ? $cname : "Không tồn tại danh mục có mã là: $cid" ?>">
           

            <div class="btn-add">               
                <input type="hidden" name="cid" value="<?= $cid ?>">
                <input class="btn-hight" type="submit" name="btn-edit" value="Update">
                <input class="btn-hight" type="reset" value="Nhập Lại">
                <a href="index.php?act=listdm">  
                    <input class="btn-hight" type="button" value="Danh sách">
                </a>
            </div>

            
            <?php
            if(isset($thongbao) && $thongbao != ""){
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>