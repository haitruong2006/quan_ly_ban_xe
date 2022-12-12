<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Amin-Quản lý thư viện</title>
        <link href="css1/site.css" rel="stylesheet" /> -->
         <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="quanlysach.php">Quản Lý Thư Viện</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="quanlysach.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản Lý Thông Tin Sách
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản Lý Nhân Viên
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Quản Lý Thông Tin Mượn Trả
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="index-phieumuon.php" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Phiếu Mượn Trả
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                       
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Chi Tiết Phiếu Mượn
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    
                                </nav>
                                
                            </div>
                            <a class="nav-link" href="quanlysach.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản Lý Thông Tin Bạn Đọc
                            </a>
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <div class="container form-text">
    <div class="row">
        <div class="col-sm-12">
            <h1>Thêm Phiếu Mượn Trả</h1>
        </div>
        <div class="col-sm-12">
            <!-- Form Thêm sản phẩm -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Tên sản phẩm -->
                <div class="form-group">
                    <label for="txtname">Mã Phiếu</label>
                    <input class="form-control" type="text" id="txtprice" name="MAPHIEU" placeholder = "Mã Phiếu" value = "<?php if(isset($_POST['MAPHIEU'])) echo $_POST['MAPHIEU']?>">
                </div>
                <!-- Mô tả sản phẩm -->
                <div class="form-group">
                    <label for="txtdesc">Mã Nhân Viên</label>
                    <select class="form-control" id="txtname" type="text" name="MANHANVIEN" placeholder = "Mã Phiếu">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "quanlythuvien") or die("thất bại");
                    $hoi_sql = "SELECT *from nhanvien ";
                    $a=mysqli_query($conn,$hoi_sql);
                    
                    while($row = mysqli_fetch_array($a))
                    {
                        ?>
                    <option class="form-control" id="txtname" type="text" name="MANHANVIEN" placeholder = "Mã Nhân Viên" value="<?php echo $rows["MANHANVIEN"] ?>"><?php echo $row['MANHANVIEN'] ?></option>;
                   									
                    	
                    <?php } ?>
                    </select>
                <!-- Số lượng sản phẩm -->
                <div class="form-group">
                    <label for="txtquantity">Mã Độc giả</label>
                    <select class="form-control" id="txtname" type="text" name="MADOCGIA" placeholder = "Mã Độc Giả">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "quanlythuvien") or die("thất bại");
                    $hoi_sql = "SELECT *from thethuvien ";
                    $a=mysqli_query($conn,$hoi_sql);
                    
                    while($row = mysqli_fetch_array($a))
                    {
                        ?>
                    <option class="form-control" id="txtname" type="text" name="MADOCGIA" placeholder = "Mã Độc Giả" value="<?php echo $rows["MADOCGIA"] ?>"><?php echo $row['MADOCGIA'] ?></option>;
                   									
                    	
                    <?php } ?>
                    </select>
                </div>
                <!-- Giá sản phẩm -->
                <label for="txtname">Mã sách</label>
                    <select class="form-control" id="txtname" type="text" name="MASACH" placeholder = "Mã Phiếu">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "quanlythuvien") or die("thất bại");
                    $hoi_sql = "SELECT *from sach ";
                    $a=mysqli_query($conn,$hoi_sql);
                    
                    while($row = mysqli_fetch_array($a))
                    {
                        ?>
                    <option class="form-control" id="txtname" type="text" name="MASACH" placeholder = "Mã Phiếu" value="<?php echo $rows["MASACH"] ?>"><?php echo $row['MASACH'] ?></option>;
                   									
                    	
                    <?php } ?>
                    </select>
                <!-- Loại sản phẩm -->
                <div class="form-group">
                    <label for="txtprice">Số Lượng</label>
                    <input min="0" class="form-control" type="number" id="txtprice" name="SOLUONG" placeholder = "Số lượng" value = "<?php if(isset($_POST['SOLUONG'])) echo $_POST['SOLUONG']?>">
                </div>
                <div class="form-group">
                    <label for="txtprice">Ngày Mượn</label>
                    <input class="form-control" type="date" id="txtprice" name="NGAYMUON" placeholder = "Năm phát hành" value = "<?php if(isset($_POST['NGAYMUON'])) echo $_POST['NGAYMUON']?>">
                </div>
                <div class="form-group">
                    <label for="txtprice">Ngày Hẹn trả</label>
                    <input class="form-control" type="date" id="txtprice" name="NGAYHENTRA" placeholder = "Năm phát hành" value = "<?php if(isset($_POST['NGAYHENTRA'])) echo $_POST['NGAYHENTRA']?>">
                </div>
                <div class="form-group">
                    <label for="txtprice">Tình trạng</label>
                    <input min="0" class="form-control" type="textr" id="txtprice" name="TINHTRANG" placeholder = "Số lượng" value = "<?php if(isset($_POST['TINHTRANG'])) echo $_POST['TINHTRANG']?>">
                </div>
               
                
                <button type="submit" class="btn btn-primary" name="btnsubmit">Xong</button>
                <?php
                        if(isset($_POST['btnsubmit'])){
                            $MAPHIEU = $_POST['MAPHIEU'];
                            $MANHANVIEN= $_POST['MANHANVIEN'];
                            $MADOCGIA = $_POST['MADOCGIA'];
                            $MASACH = $_POST['MASACH'];
                            $SOLUONG = $_POST['SOLUONG'];
                            $NGAYMUON=$_POST['NGAYMUON'];
                            $NGAYHENTRA=$_POST['NGAYHENTRA'];
                            $TINHTRANG=$_POST['TINHTRANG'];
                            $conn = mysqli_connect("localhost", "root", "", "quanlythuvien") or die("thất bại");
                            $hoi_sql = "SELECT * from phieumuontra WHERE MAPHIEU = '$MAPHIEU'";
                            $hoi_ketqua = mysqli_query($conn, $hoi_sql);
                            $dem = mysqli_num_rows($hoi_ketqua);
                            if($dem > 0){
                                echo "<br>Mã Phiếu Đã Tồn Tại !";
                            }
                            else{
                                if($MASACH == '' || $MADOCGIA == ''|| $MAPHIEU==  ''|| $MANHANVIEN==  '' ){
                                    echo "Vui lòng nhập đầy đủ thông tin người đăng kí thẻ độc giả";
                                }
                                else{
                                    $sql = "INSERT INTO phieumuontra VALUES ('$MAPHIEU', '$MANHANVIEN', '$MADOCGIA','$MASACH','$SOLUONG','$NGAYMUON','$NGAYHENTRA','$TINHTRANG')";
                                    $ketqua = mysqli_query($conn, $sql);
                                    if($ketqua == true){
                                        
                                        echo '<a href="index-phieumuon.php">Thêm sách thành công! Quay lại trang chủ</a>';
                                    } 
                                    else{
                                        echo "Thêm thất bại";
                                    } 
                                }
                               
                            }
                        }
                    ?>
            </form>
        </div>
    </div>
</div>
            </form>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; By Hoang Hung -Hoang Tho</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
