<?php
    if(isset($_SESSION['so_luong_xe'])){
      $so_luong_Xe = $_SESSION['so_luong_xe'];
?>

<div class="content-wrapper">
    <?php
      for($i=1; $i<=$so_luong_Xe; $i++){
    ?>
    <h2>Xe Thứ <?= $i?></h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Số Khung</label>
        <input type="text" class="form-control"  placeholder="Nhập số khung..." name = "so_khung"  id="exampleInputEmail1" aria-describedby="emailHelp" required value="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Số Máy</label>
        <input type="text" class="form-control"  placeholder="Nhập số máy..." name = "so_may"  id="exampleInputEmail1" aria-describedby="emailHelp" required value="">
      </div>
      <?php

          }
      ?>
      <button type="submit" class="btn btn-primary" name="click" >Thêm</button>
    </form>
    <?php






          $lay_id = "select id from xe order by id desc limit 1";
          $ketnoi = mysqli_query($connect, $lay_id);
          $id_nhap_moi = mysqli_fetch_array($ketnoi)['id'];
          if(isset($_POST['click'])){
              $so_khung[] = $_POST['so_khung'];
              $so_may = $_POST['so_may'];


              foreach($so_khung as $row ) {
                  echo "<script>alert('in ra số $row')</script>";
              }
             $insert = 'INSERT INTO chi_tiet_xe (so_khung) VALUES '.implode(',', $so_khung);
            mysqli_query($connect, $insert);

            $insert = "insert chi_tiet_xe(id_xe, so_khung, so_may) values('$id_nhap_moi', '$so_khung', '$so_may')";
              $result = mysqli_query($connect, $insert);
              echo "<script>window.location.href= '?option=nhapxe'</script>";

          }

      ?>
</div>


<?php
    }
?>

