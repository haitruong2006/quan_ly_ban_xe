<!--
=========================================================
* Material Dashboard 2 - v3.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="foderadmin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="foderadmin/assets/img/favicon.png">
  <title>
    ADMIN LL
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="foderadmin/assets/css/material-dashboard.css?v=3.0.3" rel="stylesheet" />


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">



  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="/foderlogin/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<style>
  .badge-success {
    color: #fff;
    background-color: #28a745;
  }

  .badge-dark {
    color: #fff;
    background-color: #343a40;
  }

  .badge-warning {
    color: #212529;
    background-color: #ffc107;
  }
</style>
<?php
if (!isset($_SESSION['taikhoanadmin'])) {
  header("Location: login.php");
}


?>

<body class="g-sidenav-show  bg-gray-200">
  <?php include 'header.php' ?>




  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content " style="width:590px;">

        <div class="modal-body">


          <div class="card mb-1" style="width:550px; Max-height:530px;">
            <div class="card-header">

              Thêm Loại xe
            </div>
            <?php
            if (isset($_POST['themxe'])) {
              if (!isset($_POST['loaixe'])) {

                //$mota= $_POST['motathietbi'];
                //$adddanhmuc = $ketnoi->Addthietbi($namethiettbi,$mota);



            ?>
                <script>
                  alert('Vui lòng chọn loại xe');
                </script>
                <?php

              } else {
                $loaixe = $_POST['loaixe'];
                $bienso = $_POST['bienso'];
                $price = $_POST['price'];
                $capnhathinhanh = $_FILES['myFile'];
                $tenfile = $capnhathinhanh['name'];

                move_uploaded_file($capnhathinhanh['tmp_name'], './foderadmin/imagecar/' . $tenfile);
                $addxe = $ketnoi->Addxe($bienso, $loaixe, $price, $tenfile);


                if ($addxe) {
                ?>
                  <script>
                    alert("Thêm loại xe thành công");
                    //setTimeout(window.location.replace("./loaixe.php"), 800);
                  </script>
            <?php
                }
              }
            }

            ?>
            <div class="card-body">

              <form action="" method="post" enctype="multipart/form-data">

                <div class="input-group input-group-outline">
                  <label class="form-label">Biển số xe</label>
                  <input type="text" name="bienso" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">

                </div>


                <div class="input-group input-group-outline" style="margin-top:20px;">
                  <label class="form-label">Giá/Ngày</label>
                  <input type="number" name="price" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">

                </div>

                <div style="margin-top:20px;margin-bottom:20px; border: 1px solid #DADADA  ; border-radius:10px;" style="z-index: 1;">

                  <input type="file" name="myFile" class="form-control">

                </div>

                <select class="form-control selectpicker" name="loaixe" data-live-search="true">
                  <option selected disabled>Loại xe</option>
                  <?php $listloaixe = $ketnoi->Listloaixe();
                  while ($row = mysqli_fetch_assoc($listloaixe)) {

                  ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['loai_xe'] ?><i> <?php echo $row['doi_xe'] ?></i></option>

                  <?php } ?>
                </select>






                <button type="submit" class="btn btn-primary" name="themxe" style=" margin-top:10px; width:490px;">
                  Thêm
                </button>

              </form>


            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
  
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">

        <div class="card mb-4">
          <div class="card-header" style="display:flex;">
            <i class="fas fa-table me-1"></i>
            Danh sách xe
            <button type="button" class="btn btn-primary"  style="margin-left:800px; margin-bottom:4px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Thêm xe
  </button>

          </div>
          
          <div class="card-body">
            <?php
            $xe = $ketnoi->Listxe();
            ?>

            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Biển số </th>
                  <th>Loại xe</th>
                  <th>Đời xe</th>
                  <th>Giá/Ngày</th>
                  <th>Hình ảnh</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                  <th>Tác vụ</th>
                </tr>
              </thead>

              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($xe)) {


                ?>
                  <tr <?php if ($row['status'] == 3) {
                        echo 'style="background-color: #DADADA;"';
                      } ?>>
                    <td><?php echo $row['id']  ?></td>
                    <td style="color:#8A2BE2; "><i><?php echo $row['plate_car'] ?></i></td>
                    <td><?php echo $row['loai_xe'] ?></td>
                    <td><?php echo $row['doi_xe'] ?></td>

                    <td><?php echo $row['price'] . ".000 đ" ?></td>
                    <td><img src="./foderadmin/imagecar/<?php echo $row['image'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>" style="Min-width:60px; Max-width:60px; Min-height:40px; Max-height:40px; border-radius:10px; cursor:pointer;" /></td>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" style="margin-right:550px;">

                        <div class="modal-body">
                          <img src="./foderadmin/imagecar/<?php echo $row['image'] ?>" style="border-radius:20px; Min-width:600px; Max-width:600px; Min-height:400px; Max-height:400px;" alt="">
                        </div>


                      </div>
                    </div>
                    <td><?php if ($row['status'] == 1) {

                        ?><span class="badge badge-success text-uppercase">SẲN SÀNG</span><?php } ?> <?php if ($row['status'] == 2) {

                                                                                                      ?> <span class="badge badge-warning text-uppercase">ĐANG VẬN HÀNH</span><?php } ?> <?php if ($row['status'] == 3) {




                                                                                                                                                                                          ?><span class="badge badge-dark text-uppercase">BẢO HÀNH</span> </a> <?php   } ?></td>
                    <td>
                      <?php if ($row['status'] == 3) {

                      ?><a href="./doitrangthai.php?tinhtrang=3&id=<?php echo $row['id'] ?>"><button class="btn btn-primary" style="padding:5px; width:85px;" name="baohanhxong">Xong</button></a><?php }
                                                                                                                                                                                                if ($row['status'] == 1) {
                                                                                                                                                                                                  ?> <a href="./doitrangthai.php?tinhtrang=1&id=<?php echo $row['id'] ?>"><button class="btn btn-dark" style="padding:5px;" name="dembaohanh">Bảo hành</button></a><?php } ?>
                      <button class="btn btn-info" style="padding:5px; width:85px;" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>xem" name="baohanhxong">Xem</button>
                    </td>
                    <td>
                      <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>sua">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                      </a> <a href="./delete.php?idxe=<?php echo $row['id'] ?>" style="margin-left:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                      </a>

                    </td>

                  </tr>

                  <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>sua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content " style="width:590px;">

                        <div class="modal-body">


                          <div class="card mb-1" style="width:550px; Max-height:530px;">
                            <div class="card-header">

                              Cập nhật xe
                            </div>
                            <?php
                            if (isset($_POST['suaa' . $row['id']])) {

                              $loaixe = $_POST['loaixee'];
                              $bienso = $_POST['biensoo'];
                              $price = $_POST['pricee'];
                              $id = $row['id'];
                              $capnhathinhanh = $_FILES['myFilee'];
                              $tenfile = $capnhathinhanh['name'];
                              if (!$tenfile) {
                                $updatexe = $ketnoi->Updatexe($bienso, $loaixe, $price, $id);
                                if (isset($updatexe)) {


                            ?>
                                  <script>
                                    alert("Cập nhật xe thành công");
                                    //setTimeout(window.location.replace("./loaixe.php"), 800);
                                    window.location.replace("./xe.php");
                                  </script>
                                <?php
                                }
                              } else {
                                move_uploaded_file($capnhathinhanh['tmp_name'], './foderadmin/imagecar/' . $tenfile);
                                $updatexeimg = $ketnoi->Updatexe_img($bienso, $loaixe, $price, $tenfile, $id);
                                if (isset($updatexeimg)) {


                                ?>
                                  <script>
                                    alert("Cập nhật xe thành công");
                                    //setTimeout(window.location.replace("./loaixe.php"), 800);
                                    window.location.replace("xe.php");
                                  </script>
                            <?php
                                }
                              }
                            }

                            ?>
                            <div class="card-body">

                              <form action="" method="post" enctype="multipart/form-data">
                                <div class="input-group input-group-outline">

                                  <input type="text" name="biensoo" class="form-control" value="<?php if (isset($row['plate_car'])) {
                                                                                                  echo $row['plate_car'];
                                                                                                } ?>" onfocus="focused(this)" required onfocusout="defocused(this)">

                                </div>
                                <div class="input-group input-group-outline" style="margin-top:20px;">

                                  <input type="number" name="pricee" value="<?php if (isset($row['price'])) {
                                                                              echo $row['price'];
                                                                            } ?>" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">

                                </div>
                                <div style="margin-top:20px;margin-bottom:20px; border: 1px solid #DADADA  ; margin-bottom:20px; border-radius:10px; ">

                                  <input type="file" name="myFilee" class="form-control">

                                </div>


                                <select class="form-select" name="loaixee" required style="border: 1px solid red  ; ">
                                  <option selected disabled>Loại xe</option>

                                  <?php $listloaixe = $ketnoi->Listloaixe();
                                  while ($row1 = mysqli_fetch_assoc($listloaixe)) {

                                  ?>
                                    <option value="<?php echo $row1['id'] ?>" <?php if ($row1['id'] == $row['loaixe_id']) {
                                                                                echo 'selected';
                                                                              } ?>><?php echo $row1['loai_xe'] ?><i> <?php echo $row1['doi_xe'] ?></i></option>

                                  <?php } ?>
                                </select>

                                <button type="submit" class="btn btn-primary" name="suaa<?php echo $row['id'] ?>" style=" margin-top:10px; width:490px;">
                                  Lưu
                                </button>

                              </form>


                            </div>
                          </div>


                        </div>

                      </div>
                    </div>
                  </div>










                  <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>xem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết: <i style="color:red;"><?php if (isset($row['plate_car'])) {
                                                                                                                      echo $row['plate_car'];
                                                                                                                    } ?></i> </h5>
                          <button type="button" style="background-color:black;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <Label>Danh mục:</Label>
                          <label for=""><?php if (isset($row['name-category'])) {
                                          echo $row['name-category'];
                                        } ?></label>
                          <br>
                          <Label>Loại xe:</Label>
                          <label for=""><?php if (isset($row['loai_xe'])) {
                                          echo $row['loai_xe'];
                                        } ?></label>
                          <br>
                          <Label>Đời xe:</Label>
                          <label for=""><?php if (isset($row['doi_xe'])) {
                                          echo $row['doi_xe'];
                                        } ?></label>
                          <br>
                          <Label>Thiết bị xe:</Label>
                          <label for=""><?php if (isset($row['thietbi'])) {
                                          echo $row['thietbi'];
                                        } ?>(<?php if (isset($row['description_thietbi'])) {
                                                echo $row['description_thietbi'];
                                              } ?>)</label>
                          <br>
                          <Label>Giá thuê theo ngày:</Label>
                          <label for=""><?php if (isset($row['price'])) {
                                          echo $row['price'] . '.000 đ/Ngày';
                                        } ?></label>
                          <br>
                          <Label>Trạng thái xe:</Label>
                          <label for=""><?php if ($row['status'] == 1) {
                                          echo "Bình thường";
                                        } elseif ($row['status'] == 2) {
                                          echo "Đang vận hành";
                                        } else {
                                          echo "Đang bảo hành";
                                        } ?></label>

                        </div>

                      </div>
                    </div>
                  </div>


                <?php } ?>

              </tbody>
            </table>


          </div>
        </div>
      </div>
    </main>

  </div>




  <!-- Modal -->









  <?php include 'footer.php' ?>
  </div>
  </main>

  <?php include 'doipass.php' ?>


  <!--   Core JS Files   -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


  <script src="foderadmin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="foderadmin/assets/js/plugins/smooth-scrollbar.min.js"></script>


  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="foderadmin/assets/js/material-dashboard.min.js?v=3.0.3"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="./foderlogin/js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="./foderlogin/js/datatables-simple-demo.js"></script>
</body>

</html>