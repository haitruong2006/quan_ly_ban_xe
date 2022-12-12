<?php
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $kiem_tra_hoa_don = "select * from hoa_don where id_khach_hang = '$id'";
    $result_kiem_tra_hoa_don = mysqli_query($connect, $kiem_tra_hoa_don);
    if(mysqli_num_rows($result_kiem_tra_hoa_don) !=0){
      echo "<script>alert('Khách Hàng Này Đã Có Đơn Hàng Không Thể Xóa')</script>";
      echo"<script>window.location.href='?option=khachhang'</script>";
    }
    else{
      $xoa = "delete from khach_hang where id='$id'";
      $result = mysqli_query($connect, $xoa);
    }

}
?>
<?php
    $query = "select * from khach_hang";
    $result=$connect->query($query);
?>
<div class="content-wrapper">
  <h1 style="text-align:center">QUẢN LÝ KHÁCH HÀNG KHÁCH HÀNG</h1>
  <section style="text-align:center;margin-bottom:10px;">
      <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Thêm</a>
  </section>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>Họ Tên</th>
              <th>SĐT</th>


              <th>Trạng Thái</th>
              <th>Hoạt Động</th>
          </tr>
      </thead>
      <tbody>
          <?php $count=1;?>
          <?php foreach($result as $item):?>
              <tr class="">
                  <td><?=$count++?></td>
                  <td><?= $item["id"]?></td>
                  <td><?= $item["ho_ten"]?></td>
                  <td>+84 <?= $item["so_dien_thoai"]?></td>


                  <td><?= $item['status']==1?'<a style="color:blue">ĐANG KÍCH HOẠT</a>':'<a style="color:red">ĐÃ KHÓA</a>' ?></td>
                  <td>
                    <a class="btn btn-secondary" href="?option=donhang&id_khach_hang=<?=$item['id']?>">ĐH</a> ||
                    <a class="btn btn-warning" href="?option=updatekhachhang&id=<?=$item['id']?>">Sửa </a> ||
                    <a  class="btn btn-danger" href="?option=khachhang&id=<?=$item['id']?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa')"> Xóa</a>
                  </td>
              </tr>
          <?php
            endforeach;
          ?>
      </tbody>
  </table>

<!--------------thêm----------------------->
<div class="container">

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm Khách Hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

          <form action="" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Họ Và Tên</label>
                <input type="name" class="form-control"  placeholder="Nhập đầy đủ họ tên..." name = "name"  id="exampleInputEmail1" aria-describedby="emailHelp" required>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Số Điện Thoại</label>
                  <input type="number" class="form-control"  placeholder="Nhập số điện thoại..." name = "phone" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ngày Sinh</label>
                  <input type="date" class="form-control"  placeholder="Nhập đầy đủ họ tên..." name = "ngaysinh" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Địa Chỉ</label>
                  <textarea class="form-control" rows="3" name="diachi" required ></textarea>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" value="1" checked >
                  <label class="form-check-label" for="exampleRadios1">
                    Kích Hoạt &nbsp &nbsp &nbsp &nbsp
                  </label>

                  <input class="form-check-input" type="radio" name="status" value="2">
                  <label class="form-check-label" for="exampleRadios1">
                    Không Kích Hoạt
                  </label>
              </div>
              <button type="submit" class="btn btn-primary" name="click" >Thêm</button>
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
                      $sql="insert khach_hang( ho_ten, dia_chi,so_dien_thoai, ngay_sinh, status) values('$name','$diachi','$telephone','$ngaysinh','$status')";
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

