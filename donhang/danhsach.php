<?php
  $query_donhang = "select hoa_don.tong_tien_phai_tra as 'tong_tien_phai_tra',hoa_don.so_tien_khach_tra as 'so_tien_khach_tra',hoa_don.trang_thai as 'trang_thai',hoa_don.ngay_mua as 'ngay_mua',hoa_don.id as 'id_hoa_don', nhan_vien.ho_ten as 'ho_ten_nhan_vien', khach_hang.ho_ten as 'ho_ten_khach_hang' from hoa_don, nhan_vien, khach_hang  where nhan_vien.id = hoa_don.id_nhan_vien and khach_hang.id = hoa_don.id_khach_hang";
  $result_donhang = $connect->query($query_donhang);
?>
<?php
  if(isset($_GET['trang_thai_don'])){
      $trang_thai_don = $_GET['trang_thai_don'];
      $query_donhang = "select hoa_don.tong_tien_phai_tra as 'tong_tien_phai_tra',hoa_don.so_tien_khach_tra as 'so_tien_khach_tra', hoa_don.trang_thai as 'trang_thai',hoa_don.ngay_mua as 'ngay_mua',hoa_don.id as 'id_hoa_don', nhan_vien.ho_ten as 'ho_ten_nhan_vien', khach_hang.ho_ten as 'ho_ten_khach_hang' from hoa_don, nhan_vien, khach_hang  where nhan_vien.id = hoa_don.id_nhan_vien and khach_hang.id = hoa_don.id_khach_hang and hoa_don.trang_thai = $trang_thai_don";
    $result_donhang = $connect->query($query_donhang);
  }
?>
<?php
  if(isset($_GET['id_nhan_vien'])){
      $id_nhan_vien = $_GET['id_nhan_vien'];
      $query_donhang = "select hoa_don.tong_tien_phai_tra as 'tong_tien_phai_tra',hoa_don.so_tien_khach_tra as 'so_tien_khach_tra', hoa_don.trang_thai as 'trang_thai',hoa_don.ngay_mua as 'ngay_mua',hoa_don.id as 'id_hoa_don', nhan_vien.ho_ten as 'ho_ten_nhan_vien', khach_hang.ho_ten as 'ho_ten_khach_hang' from hoa_don, nhan_vien, khach_hang  where nhan_vien.id = hoa_don.id_nhan_vien and khach_hang.id = hoa_don.id_khach_hang and hoa_don.id_nhan_vien = $id_nhan_vien";
    $result_donhang = $connect->query($query_donhang);
  }
?>
<?php
  if(isset($_GET['id_khach_hang'])){
      $id_khach_hang = $_GET['id_khach_hang'];
      $query_donhang = "select hoa_don.tong_tien_phai_tra as 'tong_tien_phai_tra',hoa_don.so_tien_khach_tra as 'so_tien_khach_tra', hoa_don.trang_thai as 'trang_thai',hoa_don.ngay_mua as 'ngay_mua',hoa_don.id as 'id_hoa_don', nhan_vien.ho_ten as 'ho_ten_nhan_vien', khach_hang.ho_ten as 'ho_ten_khach_hang' from hoa_don, nhan_vien, khach_hang  where nhan_vien.id = hoa_don.id_nhan_vien and khach_hang.id = hoa_don.id_khach_hang and hoa_don.id_khach_hang = $id_khach_hang";
    $result_donhang = $connect->query($query_donhang);
  }
?>
<?php
  if(isset($_GET['thang'])){
      $thang = $_GET['thang'];
      $query_donhang = "select hoa_don.tong_tien_phai_tra as 'tong_tien_phai_tra', hoa_don.so_tien_khach_tra as 'so_tien_khach_tra', hoa_don.trang_thai as 'trang_thai',hoa_don.ngay_mua as 'ngay_mua',hoa_don.id as 'id_hoa_don', nhan_vien.ho_ten as 'ho_ten_nhan_vien', khach_hang.ho_ten as 'ho_ten_khach_hang' from hoa_don, nhan_vien, khach_hang  where nhan_vien.id = hoa_don.id_nhan_vien and khach_hang.id = hoa_don.id_khach_hang and month(ngay_mua)=7";
    $result_donhang = $connect->query($query_donhang);
  }
?>
<?php
  if(isset($_GET['id_hoa_don'])){
    $id_hoa_don = $_GET['id_hoa_don'];
    $query_delete_chi_tiet_hoa_don = "delete from chi_tiet_hoa_don where id_hoa_don = $id_hoa_don";
    $result_delete_chi_tiet_hoa_don = mysqli_query($connect, $query_delete_chi_tiet_hoa_don);

    $query_delete_hoa_don = "delete from hoa_don where id=$id_hoa_don";
    $result_delete_hoa_don = mysqli_query($connect, $query_delete_hoa_don);
  }
?>


<div class="content-wrapper">
  <h1 style="text-align:center">TẤT CẢ CÁC ĐƠN HÀNG</h1>
  <!--<section style="text-align:center;margin-bottom:10px;">
    <a href="./donhang/themdon.php" class="btn btn-primary">Thêm Đơn</a>
  </section>-->
  <section style="text-align:center;margin-bottom:10px;">
    <a href="?option=themdon" class="btn btn-primary">Thêm Đơn</a>
  </section>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>Tên Nhân Viên</th>
              <th>Tên Khách Hàng</th>
              <th>Khách Trả</th>
              <th>Ngày Mua</th>

              <th>Trạng Thái</th>
              <th>Hoạt Động</th>
          </tr>
      </thead>
      <?php
          $count=1;
          $so_tien_khach_tra=0;
          $tong_tien_don_hang=0;
          $so_tien_da_nhan = 0;
          foreach($result_donhang as $item):
      ?>
      <tbody>
          <tr>
              <td><?= $tong_so_don=$count++?></td>
              <td><?= $item['id_hoa_don']?></td>
              <td><?= $item['ho_ten_nhan_vien']?></td>
              <td><?= $item['ho_ten_khach_hang']?></td>
              <td><?= number_format($item['so_tien_khach_tra'],0,'.',',')?></td>
              <td><?= $item['ngay_mua']?></td>

              <td><?= $item['trang_thai']==0?'<a style="color:orange">ĐANG XỬ LÝ</a>':($item['trang_thai']==1?'<a style="color:red">CHƯA THANH TOÁN</a>':'<a style="color:blue">ĐÃ THANH TOÁN</a>')?></td>
              <td>
                  <a class="btn btn-success" href="?option=donhang_chitiet&id=<?= $item['id_hoa_don']?>">Chi Tiết</a>
                  <a class="btn btn-danger" href="?option=donhang&id_hoa_don=<?= $item['id_hoa_don']?>" style="display:<?= $item['trang_thai']==2?'':'none'?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa')">Xóa</a>
              </td>
          </tr>
      </tbody>
      <?php   $_SESSION['ten_nhan_vien'] = $item['ho_ten_nhan_vien']; $_SESSION['ten_khach_hang'] = $item['ho_ten_khach_hang']?>
        <?php

            $so_tien_da_nhan+=$item['so_tien_khach_tra'];
             if($item['so_tien_khach_tra'] > $item['tong_tien_phai_tra']){
                $so_tien_tra = $item['so_tien_khach_tra'] - $item['tong_tien_phai_tra'];
                $item['so_tien_khach_tra'] = $item['so_tien_khach_tra'] - $so_tien_tra;
            }
            else{
              $so_tien_tra = 0;
              $item['so_tien_khach_tra'] = $item['so_tien_khach_tra'];
            }
            if( $so_tien_tra > 0){
              $so_tien_tra = $so_tien_tra;
            }
            else{
              $so_tien_tra = 0;
            }
            $so_tien_khach_tra+=$item['so_tien_khach_tra'];

            $tong_tien_don_hang+=$item['tong_tien_phai_tra'];
        ?>
      <?php endforeach;?>
      <tr>
        <th colspan="7">Tổng Số Đơn</th>
        <td ><?= $tong_so_don ?></td>

      </tr>
      <tr>
        <th colspan="7">Tổng Tiền Hóa Đơn</th>
        <td ><?= number_format($tong_tien_don_hang,0,'.',',')?> Đ</td>

      </tr>
      <tr>
        <th colspan="7">Số Tiền Đã Nhận</th>
        <td ><?= number_format($so_tien_da_nhan,0,'.',',')?> Đ</td>

      </tr>
      <tr>
        <th colspan="7">Số Tiền Khách Dư</th>
        <td ><?= number_format($so_tien_tra,0,'.',',')?> Đ</td>

      </tr>
      <tr>
        <th colspan="7">Số Tiền Thực Tế Nhận</th>
        <td ><?= number_format($so_tien_khach_tra,0,'.',',')?> Đ</td>

      </tr>
      <tr>
        <th colspan="7">Số Tiền Khách Nợ</th>
        <td ><?= number_format($tong_tien_don_hang - $so_tien_khach_tra,0,'.',',')?> Đ</td>

      </tr>


    </table>
</div>
