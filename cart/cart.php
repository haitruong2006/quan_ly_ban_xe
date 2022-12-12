<style>
    table tr td input{
        margin-left: 5px;
        width: 100%;
    }
    .cart-content-right-button button:first-child a{
        background-color: #fff;

    }
    .cart-content-right-button button:first-child:hover a{
        background-color: #ddd;
    }
    .cart-content-right-button button:last-child a{
        background-color: black;
        color: #fff;
    }
    .cart-content-right-button button:last-child:hover a{
        background-color: #dddddd;
        color: black;
    }

</style>

<div class="content-wrapper">
  <div class="container">
        <div class="cart-content row">
        <?php
            if(!empty($_SESSION['cart'])){
        ?>
          <div class="cart-content-left">
          <?php
              if(isset($_SESSION['cart'])):
                //$ids="0";
                //foreach(array_keys($_SESSION['cart']) as $key)
                //$ids.=",".$key;

                //cần 2 đối số thứu nhất là dấu phẩy để phân cách giwuax các phần từ giữa mảng
                //thứu 2 là mảng là t lấy
                $ids = implode(',', array_keys($_SESSION['cart']));
                //$query="select * from products where id in($ids)";
                $query = "select * from xe where id in($ids)";
                $result = mysqli_query($connect, $query);
                //$result=$connect->query("select * from products where id in($ids)");
          ?>
          <table>
            <tr>
                <th>SẢN PHẨM</th>
                <th>TÊN SẢN PHẨM</th>
                <th>SL</th>
                <th>GIÁ</th>
                <th>XÓA</th>
            </tr>
            <?php
                $tongtiengiohang=0;
                $tongsanphamgiohang=0;
                foreach($result as $item):
            ?>
            <tr>

                <td>
                    <img src = "./images/<?= $item['images']?>">
                </td>
                <td>
                    <p><?= $item['ten_xe']?></p>
                </td>
                <td>
                     <?=$tongsanpham=$_SESSION['cart'][$item['id']]?>
                     <input type="button" value = "+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';">
                      <input type="button" value = "-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';">
                </td>
                <td>
                    <p><?= number_format($item['gia'],0,'.',',')?><sup>đ</sup></p>
                </td>
                <td>
                    <input type="button" value = "X" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';">
                </td>

            </tr>
            <?php  $tongtiensanpham = $tongsanpham * $item['gia']?>
            <?php $tongtiengiohang+=$tongtiensanpham?>
            <?php $tongsanphamgiohang+=$tongsanpham?>
            <?php
                endforeach;
            ?>

          </table>
          <?php
              else:
          ?>
                <section style = "text-align:center;color: orange;font-weight:bold;font-size:25px">GIỎ HÀNG TRỐNG</section>
          <?php
              endif;
          ?>
          </div>
          <?php
              }
          ?>
           <?php
              if(!empty($_SESSION['cart'])){
          ?>
          <div class="cart-content-right">
              <table>
                <tr>
                    <th colspan = "2">TỔNG TIỀN GIỎ HÀNG</th>
                </tr>
                <tr>
                    <td>TỔNG SẢN PHẨM</td>
                    <td><?= $tongsanphamgiohang?></td>
                </tr>
                <tr>
                    <td>TỔNG TIỀN HÀNG</td>
                    <td><p><?= number_format($tongtiengiohang,0,'.',',')?><sup>đ</sup></p></td>
                </tr>
                <tr>
                    <td>TẠM TÍNH</td>
                    <td><p style = "color: black; font-weight: bold;"><?= number_format($tongtiengiohang,0,'.',',')?><sup>đ</sup></p></td>
                </tr>
              </table>

            <div class="cart-content-right-button">
                  <button><a href="?option=themdon">TIẾP TỤC MUA SẮM</a></button>
                  <button><a href="?option=cart&action=order">THANH TOÁN</a></button>
            </div>
            <?php
                }
                else{
                    ?>
                    <div class="container">
                        <a style="color: red;font-size:30px; text-align:center">GIỎ HÀNG TRỐNG</a>
                    </div>

                    <?php
                }
            ?>
            <?php
                //gán biết cart cho cái mảng
                if(empty($_SESSION['cart'])){
                    $_SESSION['cart']=array();
                }
                if(isset($_GET['action'])){
                    $id=$_GET['id'];
                    switch($_GET['action']){
                        case'add':

                          if(array_key_exists($id, array_keys($_SESSION['cart']))){
                            $_SESSION['cart'][$id]++;
                          }
                          else{
                            $_SESSION['cart'][$id]=1;
                          }
                          //khi thực hiện xong thì trả về option cart để khi f5 k bị tăng giá trị lên
                          echo "<script>window.location.href='?option=cart'</script>";
                          break;

                            //nếu chưa có mã sản phẩm r thì cộng thêm 1 đơn vị không thì gán bằng 1

                        case'delete':
                            unset($_SESSION['cart'][$id]);
                            break;
                        case'update':
                            if($_GET['type'] == 'asc'){
                                $query_so_luong_sp = "select soluong_nhap, soluong_da_ban from xe  where id = $id";
                                $result_so_luong_sp = mysqli_query($connect, $query_so_luong_sp);

                                $so_luong_nhap = mysqli_fetch_array($result_so_luong_sp)['soluong_nhap'];
                                $so_luong_ban = mysqli_fetch_array($result_so_luong_sp)['soluong_da_ban'];

                                $so_luong_con = $so_luong_nhap - $so_luong_ban;

                                if($so_luong_con > $tongsanpham){
                                  $_SESSION['cart'][$id]++;
                                }
                                else{
                                  $tongsanpham = $tongsanpham;
                                  echo "<script>alert('Tổng sản phẩm trong khi chỉ còn $tongsanpham')</script>";
                                }
                                echo "<script>window.location.href='?option=cart'</script>";
                            }
                            else{
                                if($_SESSION['cart'][$id]>1){
                                    $_SESSION['cart'][$id]--;
                                    echo "<script>window.location.href='?option=cart'</script>";
                                }
                                else{
                                  echo "<script>alert('Vui lòng chọn số lượng lớn hơn hoặc bằng 1')</script>";
                                }
                            }
                            break;
                        case'order':
                            echo "<script>window.location.href='?option=order'</script>";
                            break;
                    }
                }
            ?>
          </div>
        </div>
</div>
</div>
