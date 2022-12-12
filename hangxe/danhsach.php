<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query_xe = "select * from xe where id_hang = $id";
        $result_xe = mysqli_query($connect, $query_xe);
        if(mysqli_num_rows($result_xe)!=0){
          echo "<script>alert('Hãng này đã tồn tại xe không thể xóa')</script>";
        }
        else{
          $xoa = "delete from hang_xe where id='$id'";
          $result = mysqli_query($connect, $xoa);
          if($result == true){
            echo "<script>window.location.href=' ?option=hangxe'</script>";
          }
          else{
            echo "<script>alert('Xóa không thành công')</script>";
          }
        }

      }
?>
<?php
    $query = "select * from hang_xe";
    $result=$connect->query($query);
?>
<div class="content-wrapper">
  <h1 style="text-align:center">HÃNG SẢN XUẤT</h1>
  <section style="text-align:center;margin-bottom:10px;">
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm</a>
  </section>

  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>Tên Hãng</th>
              <th>Hoạt Động</th>
          </tr>
      </thead>
      <tbody>
          <?php $count=1;?>
          <?php foreach($result as $item):?>
              <tr class="">
                  <td><?=$count++?></td>
                  <td><?= $item["id"]?></td>
                  <td><?= $item["name"]?></td>
                  <td>
                    <a class="btn btn-warning" href="?option=updatehangxe&id=<?=$item['id']?>" >Sửa </a> ||

                   <!-- <a class="btn btn-warning" href="" data-toggle="modal" data-target="#myModalsua<?= $item["id"]?>sua"  >Sửa </a>-->
                    <a  class="btn btn-danger" href="?option=hangxe&id=<?=$item['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa')"> Xóa</a>
                  </td>

              </tr>


          <?php
            endforeach;
          ?>
      </tbody>
  </table>

<!--------------thêm----------------------->
<div class="container">
<?php
    if(isset($_POST['click'])){
      $name = $_POST['name'];

      $kiemtra = "select * from hang_xe where name='$name'";
      $result_kiemtra = mysqli_query($connect, $kiemtra);
      if(mysqli_num_rows($result_kiemtra)!=0){
        echo "<script>alert('Hãng này đã tồn tại')</script>";
      }
      else{
          $sql="insert hang_xe( name) values('$name')";
          $ket_qua_kiem_tra = mysqli_query($connect, $sql) or die("sai");
          if($ket_qua_kiem_tra == true){
            echo "<script>window.location.href=' ?option=hangxe'</script>";
          }
          else{
            echo "Thêm không thành công";
          }
      }

    }
?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm Hãng Xe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

          <form action="" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên </label>
                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên hãng xe...." name="name" >
              </div>
              <button type="submit" class="btn btn-primary" name="click" >Thêm</button>

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

