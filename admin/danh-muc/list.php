<div class="flex">
<div class="header listdm">
    <div class="title-small">
        <div class="icon-menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </div>
        <p>Danh mục</p>
    </div>
    <div class="name-setting-admin">
        <p><i class="fa-solid fa-caret-down"></i></p>
    </div>
</div>
<div class="find-pr-cat listdm">
    <form action="">
        <?php 
            $sum = 0;
            for($i = 0; $i < sizeof($listdm); $i++){
                $sum++;
            }
        ?>

        <label for="">Số lượng danh mục hiện có: <span><?= $sum ?></span> </label> <br> <br>
        <input type="text" placeholder="Tìm kiếm danh mục">
        <button>Tìm kiếm</button> <br> <br>
    </form>

</div>
<div class="table-manager listdm">
    <table border="1">
        <h2>Quản lí danh mục</h2>
        <div class="form-one">
            <button class="btn-see">Xem tất cả danh mục</button>
            <select name="" id="" class="selection one">
                <option value="0" hidden>------- Danh mục -------</option>
                <?php foreach($listdm as $value): ?>
                    <option value="<?= $value['cid'] ?>"><?= $value['cname'] ?></option>
                <?php endforeach ?>
            </select>
            <a href="index.php?act=adddm"><button class="btn-see"><i class="fa-solid fa-plus"></i>Thêm mới</button></a>
        </div>
        <?php if(isset($thongbao)): ?>
            <div class="alert alert-success">
                <?= $thongbao ?>
            </div>
        <?php endif ?>
        <tr>
            <th><input type="checkbox"></th>
            <th>STT</th>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach($listdm as $index => $value): ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?= $index+1 ?></td>
                <td>DM00<?= $value['cid'] ?></td>
                <td><?= $value['cname'] ?></td>
                <td>
                    <div class="form">
                        <a href="index.php?act=suadm&cid=<?= $value['cid'] ?>"><button class="repair listdm">Sửa</button></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục <?= $value['cname'] ?> không?')" href="index.php?act=xoadm&cid=<?= $value['cid'] ?>"><button class="delete" >Xóa</button></a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <div class="btn-list">

    </div>
</div>
</div>
<style>
    .container {
    max-width: 1600px;
    margin: 0 auto;
    display: flex;
    justify-content: space-around;
}
</style>