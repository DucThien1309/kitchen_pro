<?php 
    $tong_tien = $_GET["tong_tien"] ?? "0";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon -->
        <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="view/vnpay/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="view/vnpay/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="view/vnpay/assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>
        <?php require_once("view/vnpay/config.php"); ?>        
            <br>
            <a class="btn btn-default" style="margin-left: 20px; height: 35px" href="?controller=nhan_vien">Trở về trang chủ</a>
        <div class="container" style="border: 5px solid #FEA116">
        <h3 style="text-align: center; color: #FEA116">Tạo mới đơn hàng</h3>
            <div class="table-responsive">
                <form action="?controller=nhan_vien&action=tao_hoa_don&role=3" id="frmCreateOrder" method="post">        
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="<?php echo $tong_tien;?>" />
                    </div>
                     <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group">
                       <!-- <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>-->
                       <!--<input type="radio" Checked="True" id="bankCode" name="bankCode" value="">-->
                       <!--<label for="bankCode">Cổng thanh toán VNPAYQR</label><br>-->
                       
                       <h5>Chuyển hướng sang phương thức tại site của đơn vị kết nối</h5>
                       <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR" disabled>
                       <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR - Đang cập nhật ...</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="VNBANK" Checked="True">
                       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="INTCARD" disabled>
                       <label for="bankCode">Thanh toán qua thẻ quốc tế - Đang cập nhật ...</label><br>
                       
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                         
                    </div>
                    <button type="submit" class="btn btn-default" href>Thanh toán</button>
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2020</p>
            </footer>
        </div>  
    </body>
    <script>
        $("#amount").bind('keyup mouseup', function () {
             alert("Vui lòng thanh toán đúng tổng tiền bạn nợ bếp ăn. Nếu muốn thanh toán từng phần thì bạn cần liên hệ trực tiếp quản lý bếp!!!"); 
               $("#amount").val(<?php echo $tong_tien ?>);
        });
    </script>
</html>

