<style>
  select{
    width: 100%;
    height:35px;
  }
  .delivery-content-left-button input{
         height: 35px;
     }
</style>

<div class="content-wrapper">
<section class = "delivery">

        <div class="container">
            <div class="delivery-content row">
                <div class="delivery-content-left">
                  <form action="" method="post">
                    <div class="delivery-content-left-input-bottom">
                        <label>Họ Tên Khách Hàng<span style = "color: red">*</span></label>

                        <select name="id_khach_hang" id="">
                              <?php
                                  $ten_khach_hang = mysqli_query($connect, "select * from khach_hang");
                                  foreach($ten_khach_hang as $item):
                              ?>
                              <option value="<?=$item['id']?>"><?= $item['id']?>  <?= $item['ho_ten']?></option>
                              <?php endforeach;?>
                        </select>

                    </div>
                    <div class="delivery-content-left-input-bottom">
                        <label>Họ Tên Nhân Viên<span style = "color: red">*</span></label>

                        <select name="id_nhan_vien" id="">
                              <?php
                                  $ten_nhan_vien = mysqli_query($connect, "select * from nhan_vien");
                                  foreach($ten_nhan_vien as $item):
                              ?>
                              <option value="<?=$item['id']?>"><?= $item['id']?>  <?= $item['ho_ten']?></option>
                              <?php endforeach;?>
                        </select>

                    </div>
                    <div class="delivery-content-left-input-bottom">
                      <section>
                          <label>Số Tiền Khách Trả<span style = "color: red">*</span></label>
                          <input type = "number" name = "so_tien_khach_tra" value = "" required min="1"/>
                      </section>
                    </div>
                    <div class="delivery-content-left-input-bottom">
                        <label>Ngày Mua<span style = "color: red">*</span></label>

                        <input type = "date" name = "ngay_mua" value = "" required />

                    </div>
                    <div class="delivery-content-left-button row">
                        <a href = "?option=cart"><span>&#171;</span><p>Quay lại giỏ hàng</p></a>
                        <section>
                            <input type="submit" value = "thanh toan don hang" name="click">
                        </section>
                    </div>
                </div>


                <div class="delivery-content-right row">
                    <?php
                        if(isset($_SESSION['cart'])):
                            //$ids="0";
                            //foreach(array_keys($_SESSION['cart']) as $key)
                            //$ids.=",".$key;

                            //cần 2 đối số thứu nhất là dấu phẩy để phân cách giwuax các phần từ giữa mảng
                            //thứu 2 là mảng là t lấy
                            $ids = implode(',', array_keys($_SESSION['cart']));
                            $query="select * from xe where id in($ids)";
                            $result=$connect->query($query);
                    ?>
                    <table>
                        <tr>
                            <th>TÊN SẢN PHẨM</th>

                            <th>SL</th>
                            <th>Giá</th>
                            <th>THÀNH TIỀN</th>
                        </tr>
                        <?php
                            $tongtienthanhtoan=0;
                            foreach($result as $item):
                        ?>
                        <tr>
                            <td><?= $item['ten_xe']?></td>

                            <td><?=$tongsanpham=$_SESSION['cart'][$item['id']]?></td>
                            <td><?= number_format($item['gia'],0,'.',',')?></td>
                            <td><p><?= number_format($tongsanpham * $item['gia'],0,'.',',')?><sup>đ</sup></p></td>
                        </tr>
                        <?php  $tong_tien_san_pham = $tongsanpham * $item['gia']?>
                        <?php  $tongtienthanhtoan+=$tong_tien_san_pham?>
                        <?php
                            endforeach;
                        ?>
                        <tr>
                            <td style = "font-weight: bold;" colspan="3">Tổng tiền thanh toán</td>
                            <td style = "font-weight: bold;"><p><?= number_format($tongtienthanhtoan,0,'.',',')?><sup>đ</sup></p></td>
                        </tr>
                    </table>
                    <?php
                        endif;

                    ?>
                </div>
                    <?php
                      if(isset($_POST["click"])){
                        $id_khach_hang = $_POST['id_khach_hang'];
                        $id_nhan_vien = $_POST['id_nhan_vien'];
                        $ngay_mua = $_POST['ngay_mua'];
                        $so_tien_khach_tra = $_POST['so_tien_khach_tra'];
                        $truyvan = "insert hoa_don(id_nhan_vien,id_khach_hang,ngay_mua,so_tien_khach_tra,tong_tien_phai_tra) values('$id_nhan_vien','$id_khach_hang', '$ngay_mua','$so_tien_khach_tra', '$tongtienthanhtoan')";
                        // $connect->query($truyvan);
                         mysqli_query($connect, $truyvan);
                         //mã đơn hàng mứi đặt
                         //lấy một bản ghi chính là cái dữ liệu mới được chèn vào mới nhất
                         $query="select id from hoa_don order by id desc limit 1";
                         $ketnoi = mysqli_query($connect, $query);
                         $id_hoa_don = mysqli_fetch_array($ketnoi)['id'];
                        foreach($_SESSION['cart'] as $key=>$value){
                          $productid=$key;
                          $number=$value;

                          $query="select gia from xe where id='$key'";
                          $ketnoi = mysqli_query($connect, $query);
                          $price = mysqli_fetch_array($ketnoi)['gia'];
                          $query="insert chi_tiet_hoa_don values($id_hoa_don,$productid,$number,$price)";
                          mysqli_query($connect, $query);
                          $_query_update_xe = "update xe set soluong_ban = $number, soluong_conlai = soluong_nhap - soluong_ban where id=$productid";
                          $update_xe = mysqli_query($connect, $_query_update_xe);
                        }
                        unset($_SESSION['cart']);
                        echo "<script>window.location.href='?option=home'</script>";
                      }
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>
