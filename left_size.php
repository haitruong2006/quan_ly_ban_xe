<?php
  $allsanpham = mysqli_num_rows($connect->query("select * from xe"));
  $yamaha = mysqli_num_rows($connect->query("select * from xe where id_hang = 1"));
  $sizuki = mysqli_num_rows($connect->query("select * from xe where id_hang = 2"));
  $honda = mysqli_num_rows($connect->query("select * from xe where id_hang = 3"));
  $sym = mysqli_num_rows($connect->query("select * from xe where id_hang = 4"));

  $allsanpham_nhap = mysqli_num_rows($connect->query("select * from nhap"));
  $yamaha_nhap = mysqli_num_rows($connect->query("select * from nhap where id_hang_xe = 1"));
  $sizuki_nhap = mysqli_num_rows($connect->query("select * from nhap where id_hang_xe = 2"));
  $honda_nhap = mysqli_num_rows($connect->query("select * from nhap where id_hang_xe = 3"));
  $sym_nhap = mysqli_num_rows($connect->query("select * from nhap where id_hang_xe = 4"));

  $allsanpham_hoa_don = mysqli_num_rows($connect->query("select * from hoa_don"));
  $hoa_don_0 = mysqli_num_rows($connect->query("select * from hoa_don where trang_thai = 0"));
  $hoa_don_1= mysqli_num_rows($connect->query("select * from hoa_don where trang_thai = 1"));
  $hoa_don_2 = mysqli_num_rows($connect->query("select * from hoa_don where trang_thai = 2"));
?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" href="?option=home">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?option=home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->

  </nav>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?option=home" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" href="?option=home">
      <span class="brand-text font-weight-light" >Quản Lý Bán Xe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/2.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="?option=home" class="d-block">Ngô Văn Hải Trường</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="?option=home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>

          <li class="nav-item">
            <a href = "?option=hangxe" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Hãng Xe

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href = "?option=nhanvien" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Nhân Viên

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href = "?option=khachhang" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Khách Hàng

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sản Phẩm
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="?option=xe" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả sản phẩm</p>[<span style="color:red"><?=$allsanpham?></span>]

                </a>
              </li>
              <li class="nav-item">
                <a href="?option=xe&id_hang=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng Yamaha [<span style="color:red"><?=$yamaha?></span>]
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=xe&id_hang=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng Suzuki [<span style="color:red"><?=$sizuki?></span>]
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=xe&id_hang=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng Honda [<span style="color:red"><?=$honda?></span>]
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=xe&id_hang=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng SYM  [<span style="color:red"><?=$sym                                                                                                                                               ?></span>]
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Quản Lý Nhập Xe
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?option=nhapxe" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Tất cả sản phẩm [<span style="color:red"><?=$allsanpham_nhap?></span>]

                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=nhapxe&id_hang=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng Yamaha [<span style="color:red"><?=$yamaha_nhap?></span>]
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=nhapxe&id_hang=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng Suzuki [<span style="color:red"><?=$sizuki_nhap?></span>]
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=nhapxe&id_hang=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng Honda [<span style="color:red"><?=$honda_nhap?></span>]
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?option=nhapxe&id_hang=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hãng SYM  [<span style="color:red"><?=$sym_nhap                                                                                                                                               ?></span>]
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Quản Lý Đơn Hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?option=donhang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Tất Cả Đơn Hàng [<span style="color:red"><?=$allsanpham_hoa_don?></span>]

                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?option=donhang&trang_thai_don=0" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Chưa Xử Lý[<span style="color:red"><?=$hoa_don_0?></span>]
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?option=donhang&trang_thai_don=1" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Chưa Thanh Toán [<span style="color:red"><?=$hoa_don_1?></span>]
                    </p>
                  </a>

                </li>
                <li class="nav-item">
                  <a href="?option=donhang&trang_thai_don=2" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Đã Thanh Toán [<span style="color:red"><?=$hoa_don_2?></span>]
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?option=donhang&trang_thai_don=1" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      ĐH Theo Nhân Viên
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="?option=donhang&id_nhan_vien=1" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Nguyễn Thành Ý</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?option=donhang&id_nhan_vien=2" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Nguyễn Văn Thành</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?option=donhang&id_nhan_vien=17" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Thái Văn Nhật</p>
                      </a>
                    </li>
                  </ul>
                </li>
            </ul>
          </li>

          <?php
            //sản phẩm nhập trong tháng;
            $san_pham_nhap_trong_thang = mysqli_num_rows($connect->query("SELECT * FROM `nhap` WHERE month(ngay_nhap)= 7"));
            $hoa_don_ban_trong_thang = mysqli_num_rows($connect->query("select * from hoa_don where month(ngay_mua)=7"));
          ?>

          <li class="nav-header">Quản Lý Doanh Thu</li>
          <li class="nav-item">
            <a href="?option=nhapxe&thang=7" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Xe Nhập Trong Tháng
                <span class="badge badge-info right"><?= $san_pham_nhap_trong_thang?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?option=donhang&thang=7" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Tiền Bán Trong Tháng
                <span class="badge badge-info right"><?= $hoa_don_ban_trong_thang?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Đăng Xuất
              </p>
            </a>
          </li>






        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <?php
    if(isset($_GET['option'])){
      switch($_GET['option']){
        case'home':
          include"home.php";
          break;
        case'hangxe':
          include"hangxe/danhsach.php";
          break;
        case'addhangxe':
          include"hangxe/addhangxe.php";
          break;
        case'updatehangxe':
          include"hangxe/updatehangxe.php";
          break;
        case'khachhang':
          include"khach_hang/danhsach.php";
          break;
        case'addkhachhang':
          include"khach_hang/them.php";
          break;
        case'updatekhachhang':
          include"khach_hang/updatekhachhang.php";
          break;
        case'xe':
          include"xe/danhsach.php";
          break;
        case'detailxe':
          include"xe/detailxe.php";
          break;
        case'updatexe':
          include"xe/updatexe.php";
          break;
        case'nhanvien':
          include"nhanvien/danhsach.php";
          break;
        case'updatenhanvien':
          include"nhanvien/updatenhanvien.php";
          break;
        case'nhapxe':
          include"nhapxe/danhsach.php";
          break;
        case'chi_tiet_nhap':
          include"nhapxe/nhap_chi_tiet.php";
          break;
        case'detailnhapxe':
          include"nhapxe/detail.php";
          break;
        case'donhang':
          include"donhang/danhsach.php";
          break;
        case'donhang_chitiet':
          include"donhang/donhang_chitiet.php";
          break;
        case'themdon':
          include"donhang/add_don.php";
          break;
        case'cart':
          include"cart/cart.php";
          break;
        case'order':
          include"order/order.php";
          break;
      }
    }
    else{
        include"home.php";
    }
  ?>


</div>
<!-- ./wrapper -->
