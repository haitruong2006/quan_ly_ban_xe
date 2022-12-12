<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $kiem_tra = "select * from chi_tiet_hoa_don where id_xe=$id";
        $result_kiem_tra = mysqli_query($connect, $kiem_tra);
        if(mysqli_num_rows($result_kiem_tra)!=0){
          echo "<script>alert('Xe này đã năm trong đơn hàng k thể xóa')</script>";
          echo "<script>window.location.href='?option=xe'</script>";
        }
        else{
          $xoa = "delete from xe where id='$id'";
          $result = mysqli_query($connect, $xoa);
          if($result == true){
            echo "<script>window.location.href=' ?option=xe'</script>";
          }
          else{
            echo "<script>alert('Xóa Thất Bại')</script>";
          }
        }

      }
?>
<?php
    $query = "select * from xe";
    $result=$connect->query($query);
?>
<?php
    if(isset($_GET['id_hang'])){
      $id_hang = $_GET['id_hang'];
      $query = "select * from xe where id_hang='$id_hang'";
      $result=$connect->query($query);
    }

?>
<div class="content-wrapper">

  <h1 style="text-align:center">Tất Cả Sản Phẩm</h1>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>ID Hãng</th>
              <th>Tên Xe</th>
              <th>Số Lượng Trong Kho</th>
              <th>Hoạt Động</th>
          </tr>
      </thead>
      <tbody>
          <?php $count=1;?>
          <?php foreach($result as $item):?>
              <tr class="">
                  <td><?=$count++?></td>
                  <td><?= $item["id"]?></td>
                  <td><?= $item["id_hang"]?></td>
                  <td><?= $item["ten_xe"]?></td>
                  <td><?= $item["soluong_nhap"] - $item["soluong_da_ban"]?></td>
                  <td>
                    <a class="btn btn-success" href="?option=detailxe&id=<?=$item['id']?>">Chi Tiết </a> ||
                    <a class="btn btn-warning" href="?option=updatexe&id=<?= $item['id']?>">Sửa </a> ||
                    <a  class="btn btn-danger" href="?option=xe&id=<?=$item['id']?>"> Xóa</a>
                  </td>
              </tr>
          <?php
            endforeach;
          ?>
      </tbody>
  </table>



</div>


