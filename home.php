 <?php
    $khachhang = mysqli_num_rows($connect->query("select * from khach_hang"));
    $soluong = mysqli_num_rows($connect->query("select id from xe"));
    $hoa_don = mysqli_num_rows($connect->query("select id from hoa_don where month(ngay_mua)=7"));

    $tong_thu = mysqli_query($connect, "select * from hoa_don where month(ngay_mua)=7");
    $tongtienthuduoc=0;
    foreach($tong_thu as $item){

        if($item['so_tien_khach_tra'] > $item['tong_tien_phai_tra']){
            $so_tien_nhan_duoc = $item['so_tien_khach_tra'] - $item['tong_tien_phai_tra'];
            $so_tien_thu = $item['so_tien_khach_tra'] - $so_tien_nhan_duoc;
        }
        else{
            $so_tien_thu = $item['so_tien_khach_tra'];
        }
        $tongtienthuduoc+=$so_tien_thu;
    }

    $sql_don = "select * from hoa_don order by id desc limit 1";
    $result_donhang = mysqli_query($connect, $sql_don);



 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $hoa_don?></h3>

                <p>Đơn Hàng Mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?option=donhang&thang=6" class="small-box-footer">Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= number_format($tongtienthuduoc, 0, '.',',')?></h3>

                <p>Tổng Doanh Thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?option=donhang&thang=6" class="small-box-footer" >Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$khachhang?></h3>

                <p>Khách Hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?option=khachhang" class="small-box-footer">Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$soluong?></h3>

                <p>Sản Phẩm Trong Kho</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?option=xe" class="small-box-footer">Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


        <h1 style="text-align:center">ĐƠN HÀNG MỚI NHẤT</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên Nhân Viên</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Mua</th>
                    <th>Trạng Thái</th>
                    <th>Hoạt Động</th>
                </tr>
            </thead>
            <?php
                $count=1;
                foreach($result_donhang as $item):

                $ten_nhan_vien = mysqli_fetch_array($connect->query("select * from nhan_vien where id=".$item['id_nhan_vien']));
                $ten_khach_hang = mysqli_fetch_array($connect->query("select * from khach_hang where id=".$item['id_khach_hang']));
            ?>
            <tbody>
                <tr>
                    <td><?= $count++?></td>
                    <td><?= $item['id']?></td>
                    <td><?= $ten_nhan_vien['ho_ten']?></td>
                    <td><?= $ten_khach_hang['ho_ten']?></td>
                    <td><?= $item['ngay_mua']?></td>
                    <td><?= $item['trang_thai']==0?'<a style="color:orange">ĐANG XỬ LÝ</a>':($item['trang_thai']==1?'<a style="color:red">CHƯA THANH TOÁN ĐẦY ĐỦ</a>':'<a style="color:blue">ĐÃ THANH TOÁN</a>')?></td>
                    <td>
                      <a href="?option=donhang_chitiet&id=<?= $item['id']?>" class="btn btn-success">Chi Tiết</a>
                    </td>
                </tr>
            </tbody>

            <?php endforeach;?>
        </table>


      <?php
          $query_nhan_vien_ban_chay = "SELECT *, COUNT(id_nhan_vien) FROM hoa_don GROUP BY id_nhan_vien ORDER BY COUNT(id_nhan_vien) DESC LIMIT 1";
          $result_nhan_vien_ban_chay = mysqli_query($connect, $query_nhan_vien_ban_chay);
      ?>

        <h1 style="text-align:center">NHÂN VIÊN BÁN NHIỀU ĐƠN NHẤT</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="table-success">
                    <th>STT</th>
                    <th>Số Đơn Bán Được</th>
                    <th>ID nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Hoạt Động</th>
                </tr>
            </thead>
            <?php
                $count=1;
                foreach($result_nhan_vien_ban_chay as $item):

                $query_id_nhan_vien = mysqli_num_rows($connect->query("select * from hoa_don where id_nhan_vien=".$item['id_nhan_vien']));


                $query_ten_nhan_vien = mysqli_fetch_array($connect->query("select * from nhan_vien where id=".$item['id_nhan_vien']));
            ?>
            <tbody>
                <tr>
                    <td><?= $count++?></td>
                    <td><?= $query_id_nhan_vien?></td>
                    <td><?= $item['id_nhan_vien']?></td>
                    <td><?= $query_ten_nhan_vien['ho_ten']?></td>
                    <td><?= $query_ten_nhan_vien['email']?></td>
                    <td>0<?= $query_ten_nhan_vien['so_dien_thoai']?></td>
                    <td>
                      <a href="?option=donhang&id_nhan_vien=<?= $ten_nhan_vien['id']?>" class="btn btn-success">Chi Tiết</a>
                    </td>
                </tr>
            </tbody>

            <?php endforeach;?>
        </table>


        <?php
          $query_khach_hang = "SELECT *, COUNT(id_khach_hang) FROM hoa_don GROUP BY id_khach_hang ORDER BY COUNT(id_khach_hang) DESC LIMIT 1";
          $result_khach_hang = mysqli_query($connect,$query_khach_hang);
        ?>
        <h1 style="text-align:center">KHÁCH HÀNG CÓ NHIỀU ĐƠN NHẤT</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="table-warning">
                    <th>STT</th>
                    <th>Đơn Đã Mua</th>
                    <th>ID Khách Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Hoạt Động</th>
                </tr>
            </thead>
            <?php
                $count=1;
                foreach($result_khach_hang as $item):

                $query_id_khach_hang = mysqli_num_rows($connect->query("select * from hoa_don where id_khach_hang=".$item['id_khach_hang']));

                $ten_khach_hang = "select * from khach_hang where id=".$item['id_khach_hang'];
                $result_ten_khach_hang = mysqli_fetch_array($connect->query($ten_khach_hang));

                $id_khach_hang = $item['id_khach_hang'];
            ?>
            <tbody>
                <tr>
                    <td><?= $count++?></td>
                    <td><?= $query_id_khach_hang?></td>
                    <td><?= $item['id_khach_hang']?></td>
                    <td><?= $result_ten_khach_hang['ho_ten']?></td>
                    <td><?= $result_ten_khach_hang['dia_chi']?></td>
                    <td>0<?= $result_ten_khach_hang['so_dien_thoai']?></td>
                    <td>
                      <a class="btn btn-success" href="?option=donhang&id_khach_hang=<?= $id_khach_hang?>">Chi Tiết</a>
                    </td>
                </tr>
            </tbody>

            <?php endforeach;?>
        </table>



  </div>
  <!-- /.content-wrapper -->
