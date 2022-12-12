<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_hoa_don = "select * from hoa_don where id=$id";
    $hoa_don = mysqli_fetch_array($connect->query($query_hoa_don));

    $id_khach_hang = $hoa_don['id_khach_hang'];
    $query_khach_hang = "select * from khach_hang where id=$id_khach_hang";
    $khach_hang = mysqli_fetch_array($connect->query($query_khach_hang));

    $id_nhan_vien = $hoa_don['id_nhan_vien'];
    $query_nhan_vien = "select * from nhan_vien where id=$id_nhan_vien";
    $nhan_vien = mysqli_fetch_array($connect->query($query_nhan_vien));

    $query_san_pham = "select b.so_luong,b.gia,c.ten_xe,c.images from hoa_don a join chi_tiet_hoa_don b on a.id=b.id_hoa_don join xe c on b.id_xe=c.id where a.id=".$hoa_don['id'];
    $hoa_don_chi_tiet = mysqli_query($connect, $query_san_pham);
?>

<div class="content-wrapper">
  <h1 style="text-align:center">CHI TIẾT ĐƠN HÀNG <br>(Mã Đơn Hàng: <?= $id?> Ngày Đặt: <?= $hoa_don['ngay_mua']?>)</h1>
  <h2>THÔNG TIN NGƯỜI ĐẶT</h2>
  <table class="table table-bordered">
      <tr>
        <th>ID</th>
        <td><?= $khach_hang['id']?></td>
      </tr>
      <tr>
        <th>Họ Tên</th>
        <td><?= $khach_hang['ho_ten']?></td>
      </tr>
      <tr>
        <th>Số Điện Thoại</th>
        <td>0<?= $khach_hang['so_dien_thoai']?></td>
      </tr>
      <tr>
        <th>Ngày Sinh</th>
        <td><?= $khach_hang['ngay_sinh']?></td>
      </tr>
      <tr>
        <th>Địa Chỉ</th>
        <td><?= $khach_hang['dia_chi']?></td>
      </tr>
  </table>
  <h2>THÔNG TIN NGƯỜI BÁN</h2>
  <table class="table table-bordered">
      <tr>
        <th>ID</th>
        <td><?= $nhan_vien['id']?></td>
      </tr>
      <tr>
        <th>Họ Tên</th>
        <td><?= $nhan_vien['ho_ten']?></td>
      </tr>
      <tr>
        <th>Số Điện Thoại</th>
        <td>0<?= $nhan_vien['so_dien_thoai']?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?= $nhan_vien['email']?></td>
      </tr>
  </table>
  <form action="" method="post" >
      <h2>THÔNG TIN SẢN PHẨM</h2>
      <table class="table table-bordered">
        <tr>
          <th>STT</th>
          <th>Tên Sản Phẩm</th>
          <th>Ảnh</th>
          <th>Giá</th>
          <th>Số Lượng</th>
          <th>Tổng Tiền Sản Phẩm</th>
        </tr>
        <?php $count=1; $tongsoluongsanpham=0; $tongtiengiohang=0; foreach($hoa_don_chi_tiet as $item): ?>
          <tr>
            <td><?= $count++?></td>
            <td><?= $item['ten_xe']?></td>
            <td style="width:20%"><img src="./images/<?= $item['images']?>" width="50%"></td>
            <td><?= number_format($item['gia'],0, '.',',')?> VND</td>
            <th><?= $soluongsanpham=$item["so_luong"]?></th>
            <th><?= number_format($item['gia'] * $item['so_luong'],0,'.',',')?> VND</th>
          </tr>
          <?php $tongsoluongsanpham+=$soluongsanpham?>

        <?php endforeach;?>
        <tr>
          <td colspan="5">Tổng số sản phẩm</td>
          <th><?= $tongsoluongsanpham?></th>
        </tr>
        <tr>
          <td colspan="5">Tổng Tiền Phải Thanh Toán</td>
          <th><?= number_format($hoa_don['tong_tien_phai_tra'],0,'.',',')?> VND</th>
        </tr>
        <tr>
          <td colspan="5">Số Tiền Khách Đã Trả</td>
          <th><?= number_format($hoa_don['so_tien_khach_tra'],0,'.',',')?> VND</th>
        </tr>
        <?php
           if($hoa_don['tong_tien_phai_tra'] > $hoa_don['so_tien_khach_tra']){
              $so_tien_no = $hoa_don['tong_tien_phai_tra'] - $hoa_don['so_tien_khach_tra'];
           }
           else{
            $so_tien_no = 0;
           }

           if($hoa_don['so_tien_khach_tra'] > $hoa_don['tong_tien_phai_tra']){
            $so_tien_khach_du = $hoa_don['so_tien_khach_tra'] - $hoa_don['tong_tien_phai_tra'];
           }
           else{
            $so_tien_khach_du=0;
           }
        ?>
        <tr>
          <td colspan="5">Số Tiền Khách Còn Nợ</td>
          <th><?= number_format($so_tien_no,0,'.',',')?> VND</th>
        </tr>
        <tr>
          <td colspan="5">Tiền Dư Của Khách</td>
          <th><?= number_format($so_tien_khach_du,0,'.',',')?> VND</th>
        </tr>
      </table>
      <h2>TRẠNG THÁI ĐƠN HÀNG</h2>
      <p style="display: <?= $hoa_don['trang_thai']==2 || $hoa_don['trang_thai']==1 ?'none':''?>">
        <input type="radio" name="status" value="0" <?= $hoa_don['trang_thai']==0?'checked':''?>/> Chờ Xử Lý

      </p>
      <p style="display: <?= $hoa_don['trang_thai']==2?'none':''?>">
        <input type="radio" name="status" value="1" <?= $hoa_don['trang_thai']==1?'checked':''?>/> Chưa Thanh Toán Đầy Đủ

      </p>
      <p >
        <input type="radio" name="status" value="2" <?= $hoa_don['trang_thai']==2 ?'checked':''?>/> Đã Thanh Toán

      </p>
      <section class="button">
            <input  type="submit" value="Cập Nhập" name="click">
      </section>
      <?php
        if(isset($_POST['click'])){
          $status = $_POST['status'];
          if($so_tien_no > 0){
              if($status==1){
                $query_update_no = "update hoa_don set trang_thai = '$status' where id=".$hoa_don['id'];
                $id_hoa_don = $hoa_don['id'];
                $result_update_no = mysqli_query($connect, $query_update_no);
                echo "<script>alert('Đã Cập Nhập Thành Công')</script>";
                echo "<script>window.location.href=' ?option=donhang_chitiet&id=$id_hoa_don'</script>";
              }
              else{
                echo "<script>alert('Đơn Hàng này Chưa Thanh Toán Đủ Tiền Không Thể Hoàn Thành')</script>";
              }

          }
          else{
            if($status==2){
              $query_update = "update hoa_don set trang_thai = '$status' where id=".$hoa_don['id'];
              $id_hoa_don = $hoa_don['id'];
              $result_update = mysqli_query($connect, $query_update);
              //echo "<script>window.location.href=' ?option=donhang'</script>";
              echo "<script>alert('Đã Cập Nhập Thành Công')</script>";
              echo "<script>window.location.href=' ?option=donhang_chitiet&id=$id_hoa_don'</script>";
            }
            else{
              echo "<script>alert('Đơn Hàng Đã Thanh Toán Đầy Đủ Tiền Vui Lòng Cập Nhập Hoàn Thành Đơn')</script>";
            }

          }

        }
      ?>
  </form>
</div>
<?php
}
?>
