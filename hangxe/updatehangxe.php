<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $sql = "select * from hang_xe where id = $id";
  $ketnoi = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($ketnoi);
?>

<div class="content-wrapper">
<section style="margin-bottom:10px;margin-top:10px">
    <a href="?option=hangxe" class="btn btn-secondary">Quay Lại</a>
  </section>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên Hãng Xe</label>
      <input required type="name" class="form-control"  placeholder="Nhập tên hãng..." name = "name" value="<?=$result['name']?>">
    </div>
    <button type="submit" class="btn btn-primary" name = "click">Cập Nhập</button>
    <?php
  if(isset($_POST['click'])){
    $name = $_POST['name'];
    $sql1 = "select * from hang_xe where name = '$name'";
    $ketnoi1 = mysqli_query($connect, $sql1);
    if(mysqli_num_rows($ketnoi1)!=0){
      echo "<script>alert('đã tồn tại tên này')</script>";
    }
    else{
        $query = "update hang_xe set name = '$name' where id = $id";
        mysqli_query($connect, $query);
        echo "<script>window.location.href= ' ?option=hangxe'</script>";
    }
  }
?>
  </form>

</div>

