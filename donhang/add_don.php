<div class="content-wrapper">
    <div class="cartegory-right-content row">
        <?php
        $connect=mysqli_connect("localhost","root","","quan_ly_ban_xe");
        $query="select * from xe";
        $result_xe = mysqli_query($connect, $query);
        ?>
        <?php foreach($result_xe as $item):?>
        <div class="cartegory-right-content-item">
          <img src = "./images/<?= $item['images']?>" width="100px">
          <h1><?= $item['ten_xe']?></h1>
          <p><?= number_format($item['gia'],0,'.',',')?><sup>đ</sup></p>
          <input type = "button" value = "Thêm vào giỏ hàng" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';">
        </div>
        <?php endforeach;?>
    </div>
    <div class="cartegory-right-bottom row">
        <div class="cartegory-right-bottom-item">
          <p>Hiển Thị 2 <span>|</span> 4 Sản Phẩm</p>
        </div>
        <div class="cartegory-right-bottom-item">
          <p><span>&#171;</span>1 2 3 4<span>&#187;</span>Trang Cuối</p>
        </div>
    </div>
</div>

