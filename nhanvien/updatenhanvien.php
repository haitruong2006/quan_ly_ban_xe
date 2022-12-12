<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $sql = "select * from nhan_vien where id = $id";
  $ketnoi = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($ketnoi);
?>

<div class="content-wrapper">
<section style="margin-bottom:10px;margin-top:10px">
    <a href="?option=nhanvien" class="btn btn-secondary">Quay Lại</a>
  </section>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên Nhân Viên</label>
      <input type="name" class="form-control"  placeholder="Nhập tên nhân viên..." name = "name" value="<?=$result['ho_ten']?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control"  placeholder="Nhập email..." name = "email" value="<?=$result['email']?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Số Điện Thoại</label>
      <input type="phone" class="form-control"  placeholder="Nhập số điện thoại..." name = "sodienthoai" value="0<?=$result['so_dien_thoai']?>">
    </div>
    <button type="submit" class="btn btn-primary" name = "click">Cập Nhập</button>
    <?php
  if(isset($_POST['click'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['sodienthoai'];
    if (!preg_match ("/^[0-9]*$/",$telephone))
    {
        echo  "không được";
    }
    else{
         $sql="update nhan_vien set  ho_ten = '$name', email= '$email', so_dien_thoai = '$telephone'  where id = $id";
         $ket_qua_kiem_tra = mysqli_query($connect, $sql) or die("sai");
         if($ket_qua_kiem_tra == true){
             echo "<script>window.location.href='?option=nhanvien'</script>";
         }
         else{
             echo "Cập nhập thất bại";
         }
    }
  }
?>
  </form>

</div>

