<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $sql = "select * from nhap where id = $id";
  $result = mysqli_fetch_array($connect->query($sql));

  $id_hang = $result['id_hang_xe'];
  $query = "select name from hang_xe where id = $id_hang";
  $ten_hang = mysqli_fetch_array($connect->query($query));
?>
<div class="content-wrapper">
  <h1 style="text-align:center">Chi Tiết Sản Phẩm (<?=$result['ten_xe']?>)</h1>
  <section style="margin-bottom:10px;">
    <a href="?option=nhapxe" class="btn btn-secondary">Quay Lại</a>
  </section>
  <table class="table table-bordered">
      <tr>
          <td>Hãng Xe</td>
          <td><?=$ten_hang['name']?></td>
      </tr>
      <tr>
          <td>Tên Xe</td>
          <td><?=$result['ten_xe']?></td>
      </tr>
      <tr>
          <td>Màu Xe</td>
          <td><?=$result['mauxe']?></td>
      </tr>
      <tr>
          <td>Thông Số</td>
          <td><?=$result['thongso']?></td>
      </tr>
      <tr>
          <td>Giá</td>
          <td><?=number_format($result['gia'],0,'.',',')?>đ</td>
      </tr>
      <tr>
          <td>Số Lượng Nhập</td>
          <td><?=$result['so_luong']?></td>
      </tr>
      <tr>
          <td>Ảnh Sản Phẩm</td>
          <td>
            <img src="./images/<?=$result['images']?>" width="20%">
          </td>
      </tr>
      <tr>
          <td>Tổng Tiền Nhập</td>
          <td><?=number_format($result['gia'] * $result['so_luong'],0,'.',',')?>đ</td>
      </tr>
  </table>
</div>
