<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $sql = "select * from xe where id = $id";
  $ketnoi = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($ketnoi);
  $id_hang  = $result['id_hang'];
  $query_ten_hang = "select * from hang_xe where id=$id_hang";
  $result_ten_hang = mysqli_fetch_array($connect->query($query_ten_hang));
?>

<div class="content-wrapper">
<section style="margin-bottom:10px;margin-top:10px">
    <a href="?option=xe" class="btn btn-secondary">Quay Lại</a>
  </section>
  <form action="" method="post" enctype = "multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên Hãng</label>
      <input type="name" class="form-control"  placeholder="Nhập tên nhân viên..." name = "id_hang" value="<?= $result_ten_hang['name']?>" readonly="true">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Tên Xe</label>
      <input type="text" class="form-control"  placeholder="Nhập tên xe..." name = "name" value="<?=$result['ten_xe']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Màu Xe</label>
      <input type="text" class="form-control"  placeholder="Nhập màu xe..." name = "mau" value="<?=$result['mau_xe']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Giá</label>
      <input type="number" class="form-control"  placeholder="Nhập giá.." name = "gia" value="<?=$result['gia']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Số Lượng</label>
      <input type="number" class="form-control"  placeholder="Nhập số lượng trong kho..." name = "soluong" value="<?=$result['soluong_nhap'] - $result['soluong_da_ban'] ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Thông Số</label>
      <textarea class="form-control" rows="3" name="thongso" ><?= $result['thongso']?></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Ảnh SP</label>
      <img src="./images/<?= $result['images']?>" width="20%">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Chọn Ảnh Mới</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" name = "click">Cập Nhập</button>
    <?php
        if(isset($_POST['click'])){
          $name = $_POST['name'];

         $mau = $_POST['mau'];
          $gia = $_POST['gia'];
          $soluong = $_POST['soluong'];
          $thongso = $_POST['thongso'];



          $imageName=$_FILES['image']['name'];
          $imageTemp=$_FILES['image']['tmp_name'];
          $store = "./images/";
          $exp3=substr($imageName, strlen($imageName) - 3);//123.jpg thì lấy sau dấu chấm
          $exp4=substr($imageName, strlen($imageName) - 4);

          if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
            move_uploaded_file($imageTemp,$store.$imageName);
            $query = "update xe set ten_xe ='$name', mau_xe = '$mau', gia='$gia', thongso = '$thongso', images = '$imageName' where id='$id'";
            $ketqua = mysqli_query($connect, $query);
            echo "<script>alert('Cập Nhập Thành Công')</script>";
            echo "<script>window.location.href= '?option=updatexe&id=$id'</script>";


          }else{
            echo "<script>alert('File đã chọn không phải file ảnh')</script>";
          }
          if(empty($imageName)){
              $imageName=$result['image'];
              move_uploaded_file($imageTemp,$store.$imageName);
            $query = "update xe set ten_xe ='$name', mau_xe = '$mau', gia='$gia', thongso = '$thongso', images = '$imageName' where id='$id'";
            $ketqua = mysqli_query($connect, $query);
            echo "<script>alert('Cập Nhập Thành Công')</script>";
            echo "<script>window.location.href= '?option=updatexe&id=$id'</script>";
          }

        }
    ?>
  </form>

</div>

