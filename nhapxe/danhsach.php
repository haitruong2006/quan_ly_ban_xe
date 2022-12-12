<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $xoa = "delete from nhap where id='$id'";
        $result = mysqli_query($connect, $xoa);
        if($result == true){
          echo "<script>window.location.href=' ?option=nhapxe'</script>";
        }
        else{
          echo "<script>alert('Xóa không thành công')</script>";
        }


      }
?>
<?php
    $query = "select * from nhap";
    $result=$connect->query($query);
?>
<?php
    if(isset($_GET['id_hang'])){
      $id_hang = $_GET['id_hang'];
      $query = "select * from nhap where id_hang_xe='$id_hang'";
      $result=$connect->query($query);
    }

?>
<?php
    if(isset($_GET['thang'])){
      $thang = $_GET['thang'];
      $query = "select * from nhap where  month(ngay_nhap)= $thang";
      $result=$connect->query($query);
    }

?>

<div class="content-wrapper">

  <h1 style="text-align:center">Tất Cả Sản Phẩm Nhập</h1>
  <section style="text-align:center;margin-bottom:10px;">
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm</a>
  </section>

  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>ID Hãng</th>
              <th>Tên Xe</th>
              <th>Ngày Nhập</th>
              <th>SL</th>
              <th>Giá</th>

              <th>Hoạt Động</th>
          </tr>
      </thead>
      <tbody>
          <?php $count=1;$tongsoluongsanpham=0;$tongtiennhap=0?>
          <?php foreach($result as $item):?>
              <tr class="">
                  <td><?=$tongsp= $count++?></td>
                  <td><?= $item["id"]?></td>
                  <td><?= $item["id_hang_xe"]?></td>
                  <td><?= $item["ten_xe"]?></td>
                  <td><?= $item["ngay_nhap"]?></td>
                  <td><?= $soluongsanpham=$item["so_luong"]?></td>
                  <td><?= $gia = number_format($item['gia'],0,'.',',')?> VND</td>

                  <td>
                    <a class="btn btn-success" href="?option=detailnhapxe&id=<?=$item['id']?>">Chi Tiết </a> ||
                    <a  class="btn btn-danger" href="?option=nhapxe&id=<?=$item['id']?>"> Xóa</a>
                  </td>

              </tr>
              <?php $tongsoluongsanpham+=$soluongsanpham?>
              <?php $tongtiensanpham = $item['so_luong']*$item['gia']?>

              <?php $tongtiennhap+=$tongtiensanpham?>
          <?php
            endforeach;
          ?>
      </tbody>
      <tr>
        <th colspan="7">Tổng Số Xe Nhập</th>
        <td ><?= $tongsp?></td>

      </tr>
      <tr>
        <th colspan="7">Tổng Số Lượng Xe</th>
        <td ><?= $tongsoluongsanpham?></td>

      </tr>
      <tr>
        <th colspan="7">Tổng số lượng sản phẩm nhập</th>
        <td ><?= number_format($tongtiennhap,0,'.',',')?> VND</td>

      </tr>
  </table>


<!--------------thêm----------------------->
<div class="container">

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Phiếu Nhập Xe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

          <form action="" method="post" enctype = "multipart/form-data">
            <?php
                $sql = "select * from hang_xe";
                $result = mysqli_query($connect, $sql);
            ?>

              <div class="form-group">
                <label for="exampleInputEmail1" >Hãng Xe</label>

                <select class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hangxe">
                  <?php
                      foreach($result as $item):
                  ?>
                  <option value="<?= $item['id']?>"><?= $item['name']?></option>
                  <?php endforeach; ?>
                </select>

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tên Xe</label>
                <input type="name" class="form-control"  placeholder="Nhập tên đầy đủ của xe..." name = "name"  id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php if(isset($_POST['name'])) echo $_POST['name']?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Màu</label>
                <input type="text" class="form-control"  placeholder="Nhập màu xe..." name = "mau" required value="<?php if(isset($_POST['mau'])) echo $_POST['mau']?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="number" class="form-control"  placeholder="Nhập giá..." name = "gia" required value="<?php if(isset($_POST['gia'])) echo $_POST['gia']?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Số Lượng</label>
                <input type="number" class="form-control"  placeholder="Nhập số lượng..." name = "soluong" required value="1" >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Thông Số</label>
                <textarea class="form-control" rows="3" name="thongso" ><?php if(isset($_POST['thongso'])) echo $_POST['thongso']?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <input required type="file" name="image" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Ngày Nhập</label>
                <input required type="date" name="ngaynhap" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary" name="click" >Thêm</button>
              <?php
                 if(isset($_POST['click'])){
                   $hangxe = $_POST['hangxe'];
                    $name = $_POST['name'];
                    $mau = $_POST['mau'];
                    $gia = $_POST['gia'];
                    $soluong = $_POST['soluong'];
                    $thongso = $_POST['thongso'];
                    $ngaynhap = $_POST['ngaynhap'];
                    $imageName=$_FILES['image']['name'];
                    $imageTemp=$_FILES['image']['tmp_name'];
                    $store = "./images/";
                    $exp3=substr($imageName, strlen($imageName) - 3);//123.jpg thì lấy sau dấu chấm
                    $exp4=substr($imageName, strlen($imageName) - 4);
                    if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
                      //$imageName=time().'_'.$imageName;
                          move_uploaded_file($imageTemp,$store.$imageName);
                          $kiem_tra_ten_xe = "select * from nhap where ten_xe = '$name' and mauxe='$mau' and gia='$gia'";
                          $result_kiem_tra_ten_xe = mysqli_query($connect, $kiem_tra_ten_xe);
                          if(mysqli_num_rows($result_kiem_tra_ten_xe)!=0){
                              $update_so_luong_xe = "update nhap set so_luong = so_luong + $soluong where ten_xe = '$name'";
                              $result_update_so_luong_xe = mysqli_query($connect, $update_so_luong_xe);
                          }
                          else{
                            $insert_xe="insert nhap(id_hang_xe, ten_xe, mauxe, thongso, gia, so_luong, images, ngay_nhap) values('$hangxe','$name', '$mau', '$thongso', '$gia', '$soluong', '$imageName', '$ngaynhap')";
                            $result_xe = $connect->query($insert_xe);
                          }
                          //echo "<script>window.location.href=' ?option=nhapxe'</script>";
                    }
                    $lay_id = "select id from nhap order by id desc limit 1";
                    $ketnoi = mysqli_query($connect, $lay_id);
                    $id_nhap_moi = mysqli_fetch_array($ketnoi)['id'];

                    $query_ten_xe_bang_xe = "select * from xe where ten_xe = '$name' and mau_xe = '$mau' and gia = '$gia'";
                    $result_ten_xe_bang_xe = mysqli_query($connect, $query_ten_xe_bang_xe);

                    if(mysqli_num_rows($result_ten_xe_bang_xe)!=0){
                        $update_so_luong_xe_bang_xe = "update xe set soluong_nhap = soluong_nhap + $soluong where ten_xe = '$name'";
                        $result_update_so_luong_xe_bang_xe = mysqli_query($connect, $update_so_luong_xe_bang_xe);
                    }
                    else{
                      $insert_xe_moi = "insert xe(id_nhap, id_hang, ten_xe, mau_xe, thongso, gia, soluong_nhap ,images) values('$id_nhap_moi','$hangxe', '$name', '$mau', '$thongso', '$gia', '$soluong' ,'$imageName')";
                      $kiemtra_xe_moi = mysqli_query($connect, $insert_xe_moi);

                    }
                    // $_SESSION['so_luong_xe'] = $soluong;
                     echo "<script>window.location.href= '?option=nhapxe'</script>";
                  }

              ?>




          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
<!----------------hết thêm------------------------>


</div>


