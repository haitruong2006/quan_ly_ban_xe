<?php
  if(isset($_POST['click'])){
    $name = $_POST['name'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $telephone = $_POST['phone'];
    $status = $_POST['status'];
    if (!preg_match ("/^[0-9]*$/",$telephone))
    {
        echo  "<script>alert('Vui lòng nhập số')</script>";
    }
    else{
        $sql="update khach_hang set ho_ten = '$name', dia_chi = '$diachi', so_dien_thoai = '$telephone', ngay_sinh = '$ngaysinh', status = '$status' where id =".$_GET['id'];
        $ket_qua_kiem_tra = mysqli_query($connect, $sql) or die("sai");
        if($ket_qua_kiem_tra == true){

          echo "<script>window.location.href=' ?option=khachhang'</script>";
        }
        else{
            echo "<script>alert('Thêm Thất Bại');</script>";
        }
    }
  }
?>
<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from khach_hang where id = $id";
    $ketqua = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($ketqua);
  }
?>
<div class="content-wrapper">
<section style="margin-bottom:10px;margin-top:10px">
    <a href="?option=khachhang" class="btn btn-secondary">Quay Lại</a>
  </section>
  <h1 style="text-align:center">Update Khách Hàng</h1>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Họ Và Tên</label>
      <input type="name" class="form-control"  placeholder="Nhập đầy đủ họ tên..." name = "name"  required value="<?=$result['ho_ten']?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Số Điện Thoại</label>
      <input type="number" class="form-control"  placeholder="Nhập số điện thoại..." name = "phone" required value="0<?=$result['so_dien_thoai']?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Ngày Sinh</label>
      <input type="date" class="form-control"  placeholder="Nhập đầy đủ họ tên..." name = "ngaysinh" required value="<?=$result['ngay_sinh']?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Địa Chỉ</label>
      <textarea class="form-control" rows="3" name="diachi" required > <?=$result['dia_chi']?> </textarea>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="status" value="1" <?=$result['status']==1?'checked':''?> >
      <label class="form-check-label" for="exampleRadios1">
        Kích Hoạt &nbsp &nbsp &nbsp &nbsp
      </label>

      <input class="form-check-input" type="radio" name="status" value="2" <?=$result['status']==2?'checked':''?> >
      <label class="form-check-label" for="exampleRadios1">
        Không Kích Hoạt
      </label>
    </div>
    <button type="submit" class="btn btn-primary" name = "click">Update</button>

  </form>

</div>
