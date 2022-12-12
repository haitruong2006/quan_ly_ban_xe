<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $kiem_tra_xe = "select * from hoa_don where id_nhan_vien =$id";
        $result_kiem_tra_xe = mysqli_query($connect, $kiem_tra_xe);
        if(mysqli_num_rows($result_kiem_tra_xe) !=0){
          echo "<script>alert('Nhân viên này đã tồn tại đơn hàng không thể xóa')</script>";
          echo "<script>window.location.href='?option=nhanvien'</script>";
        }
        else{
          $xoa = "delete from nhan_vien where id='$id'";
          $result = mysqli_query($connect, $xoa);
          if($result == true){
            echo "<script>window.location.href=' ?option=nhanvien'</script>";
          }
          else{
            echo "<script>alert('Xóa không thành công')</script>";
          }
        }

    }
?>

<?php
    $query = "select * from nhan_vien";
    $result=$connect->query($query);
?>
<div class="content-wrapper">
  <h1 style="text-align:center">Quản Lý Nhân Viên</h1>

  <section style="text-align:center;margin-bottom:10px;">
    <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Thêm</a>
  </section>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>Họ Tên</th>
              <th>Email</th>
              <th>Số Điện Thoại</th>
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
                  <td><?= $item["email"]?></td>
                  <td>+84 <?= $item["so_dien_thoai"]?></td>
                  <td>
                    <a  class="btn btn-secondary"  href="?option=donhang&id_nhan_vien=<?= $item['id']?>">Đơn Hàng Đã Bán</a>  ||
                    <a  class="btn btn-warning"  href="?option=updatenhanvien&id=<?= $item['id']?>">Sửa</a>  ||
                    <a  class="btn btn-danger" href="?option=nhanvien&id=<?=$item['id']?>"> Xóa</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <form action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ Và Tên</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đầy đủ...." name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input required name = "email" type="email" class="form-control" id="exampleInputPassword1" placeholder="email.....">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                    <input required type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="số điện thoại....." name="sodienthoai">
                  </div>
                  <button type="submit" class="btn btn-primary" name="click" >Thêm</button>
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
                            $sql="insert nhan_vien(ho_ten, email, so_dien_thoai) values('$name','$email','$telephone')";
                            $ket_qua_kiem_tra = mysqli_query($connect, $sql) or die("sai");
                            if($ket_qua_kiem_tra == true){
                                echo "<script>window.location.href='?option=nhanvien'</script>";
                            }
                            else{
                                echo "thêm thất bại";
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



