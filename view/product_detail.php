   <!-- Showcase -->
   <?php
    extract($product);
    ?>
   <div class="breadcrumb-content container mx-auto mt-10">
       <div class="">
           <div class="">
               <div class="">
                   <a href="index.php" title="Quay trở về trang chủ">Trang chủ</a>

                   <span aria-hidden="true">/</span>

                   <a href="index.php?act=sanpham&cid=<?= $cid ?>" title=""><?= $cname ?></a>

                   <span aria-hidden="true">/</span>
                   <span class="font-bold"><?= $pname ?></span>
               </div>
           </div>
       </div>
   </div>
   <section class="section-a container mx-auto">
       <div class="grid grid-cols-3 gap-10">
           <div class="product-gallery ">
               <div class="product-image">
                   <img class="active w-[400px]" src="<?= $image ?>" />
               </div>
               <ul class="image-list grid grid-cols-4">
                   <li class="image-item">
                       <img src="<?= $image ?>" />
                   </li>
                   <li class="image-item">
                       <img src="<?= $image ?>" />
                   </li>
                   <li class="image-item">
                       <img src="<?= $image ?>" />
                   </li>
                   <li class="image-item">
                       <img src="<?= $image ?>" />
                   </li>
                   <!-- <li class="image-item">
                       <img src="https://resource.logitechg.com/w_692,c_limit,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/gaming/en/products/g203/g203-gallery-5.png?v=1" />
                   </li> -->
               </ul>
           </div>
           <div class="product_parameters col-span-2">
               <h1><?= $pname ?></h1>
               <p>
                   <b>Thông tin chung:</b> <br />
                   <b>Nhà Sản Xuất:</b> <?= $brand ?><br />
                   <b>Tình Trạng:</b> Mới 100% - Fullbox<br />
                   <b>Bảo hành:</b> <?= $warranty ?> <br />
                   <b>Led:</b> <span style="color: #c0392b">R</span>
                   <span style="color: #00ff00">G</span>
                   <span style="color: #0000ff">B</span> <br />
               </p>
               <p>Giá sản phẩm: <?= $price ?> VND</p>
               <!-- <p>Giá KM: <b style="color: #ff1900">400,000₫</b></p> -->
               <form action="index.php?act=addtocart" method="post">
                   <div class="soluong">
                       <div class="sl">Số Lượng</div>
                       <div class="sl__right">



                       </div>
                   </div>
                   <div class="ttsp">
                       <div class="ttsp__left">
                           <div class="flex items-center">
                               <input class="minus is-form" onclick="tru()" type="button" value="-" />
                               <input aria-label="quantity" id="textbox" class="input-qty" name="quantity" max="Số tối đa" min="Số tối thiểu" name="" type="text" value="1" />
                               <input class="plus is-form" onclick="cong()" type="button" value="+" />
                           </div>

                           <input type="hidden" name="pid" value=<?= $pid ?>>
                           <input type="hidden" name="pname" value=<?= $pname ?>>
                           <input type="hidden" name="price" value=<?= $price ?>>
                           <input type="hidden" name="image" value=<?= $image ?>>
                           <button class="mt-5"><input name="addtocart" type="submit" value="Thêm vào giỏ hàng"></button>
                       </div>

                   </div>
               </form>
           </div>
       </div>
   </section>
   <!-- <article class="container">
       <table class="customers">
           <tr>
               <th>Thương hiệu</th>
               <th>Logitech</th>
           </tr>
           <tr>
               <td>Tên sản phẩm</td>
               <td>Logitech G102 Lightsync RGB</td>
           </tr>
           <tr>
               <td>Thiết kế</td>
               <td>Đối xứng - Ambidextrous</td>
           </tr>
           <tr>
               <td>Mắt đọc</td>
               <td>Mercury Sensor</td>
           </tr>
           <tr>
               <td>Điểm ảnh trên 1 inch (DPI)</td>
               <td>8000</td>
           </tr>
           <tr>
               <td>IPS</td>
               <td>200</td>
           </tr>
           <tr>
               <td>Gia tốc</td>
               <td>30g</td>
           </tr>
           <tr>
               <td>Tần số phản hồi</td>
               <td>1000Hz</td>
           </tr>
           <tr>
               <td>Chất liệu vỏ</td>
               <td>Nhựa ABS</td>
           </tr>
           <tr>
               <td>Màu sắc</td>
               <td>Đen</td>
           </tr>
           <tr>
               <td>Số lượng nút bấm</td>
               <td>6</td>
           </tr>
           <tr>
               <td>Phần mềm</td>
               <td>Logitech G-Hub</td>
           </tr>
       </table>
   </article> -->
   <!-- Gallery -->
   <!-- <section class="container section-c">
       <div class="gallery">
           <h4>NHỮNG TÍNH NĂNG CHÍNH</h4>
           <div class="grid">
               <img src="https://resource.logitechg.com/w_1024,c_limit,q_auto,f_auto,dpr_auto/d_transparent.gif/content/dam/gaming/en/products/g203/g203-feature-1.png?v=1" alt="" />
               <div class="text">
                   <h2>HIỆU QUẢ ĐẲNG CẤP CHƠI GAME</h2>
                   <p>
                       G102 báo cáo ở tốc độ 1.000 lần mỗi giây, nhanh hơn gấp 8 lần so
                       với chuột tiêu chuẩn. Điều này có nghĩa là khi nhấp hay di chuyển
                       chuột, phản ứng trên màn hình gần như tức thời.
                   </p>
               </div>
           </div>
           <div class="grid">
               <div class="text">
                   <h2>THIẾT KẾ CỔ ĐIỂN</h2>
                   <p>
                       G102 được lấy cảm hứng từ thiết kế huyền thoại của Chuột chơi game
                       G100S của Logitech. Được các game thủ trên khắp thế giới yêu thích
                       và là món đồ ưa chuộng của những người chơi thể thao điện tử
                       chuyên nghiệp, đó là thiết kế cổ điển mà chúng tôi đã chế tạo lại
                       và tối ưu hóa từ trong ra ngoài để có trọng lượng nhẹ, bền bỉ và
                       thoải mái.
                   </p>
               </div>
               <div class="picture">
                   <img src="https://resource.logitechg.com/w_1024,c_limit,q_auto,f_auto,dpr_auto/d_transparent.gif/content/dam/gaming/en/products/g203/g203-feature-2.png?v=1" alt="" />
               </div>
           </div>
           <div class="grid">
               <div class="picture">
                   <img src="https://resource.logitechg.com/w_1024,c_limit,q_auto,f_auto,dpr_auto/d_transparent.gif/content/dam/gaming/en/products/g203/g203-feature-3.png?v=1" alt="" />
               </div>
               <div class="text">
                   <h2>CẢM BIẾN CẤP ĐỘ CHƠI GAME</h2>
                   <p>
                       Chơi hết khả năng với con chuột đem lại 200 tới 8.000 DPI cho độ
                       chính xác, tốc độ theo dõi và độ ổn định tuyệt vời. Bạn sẽ có
                       quyền điều khiển nâng cao bất kể kiểu chơi của mình
                   </p>
               </div>
           </div>
           <div class="grid">
               <div class="text">
                   <h2>LIGHTSYNC RGB</h2>
                   <p>
                       Công nghệ LIGHTSYNC cung cấp khả năng chiếu sáng RGB thế hệ mới,
                       đồng bộ hóa ánh sáng và các cấu hình trò chơi với nội dung của
                       bạn. Tùy chỉnh từ toàn bộ quang phổ gồm gần 16,8 triệu màu và đồng
                       bộ hóa hiệu ứng và hình chiếu sáng động với thiết bị Logitech G
                       của bạn. Tùy chỉnh nhanh chóng và dễ dàng bằng Logitech G HUB.
                   </p>
               </div>
               <div class="picture">
                   <img src="https://resource.logitechg.com/w_1024,c_limit,q_auto,f_auto,dpr_auto/d_transparent.gif/content/dam/gaming/en/products/g203/g203-feature-6.png?v=1" alt="" />
               </div>
           </div>
       </div>
   </section> -->