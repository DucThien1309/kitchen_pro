<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Shopping Cart</title>
    <style>
        * {
             box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            /* background-image: url('view/assets/img/food background10.jpg'); */
            /* background-size: cover;
            background-repeat: no-repeat;    */
            margin: 0;
            padding: 0;
            position: relative;
        }
        body, h1, h2, h3, p, div {
            margin: 0;
        }
        h1 {
        color: #FEAF39; 
        font-family: 'Montsserat';
        text-shadow: 1px 1px 1px;
        text-align: center;
        font-size: 50px;
        padding: 50px;
        
        }
        .foodname
        {
            font-style: italic; 
            text-align: center;
            text-transform: uppercase;

        }
        .foodimage img {
            border-radius: 10px;
        }
        .quantity, 
        .price, .tt, .totalvalue
        {
            font-family: 'Typewriter', cursive; 
        }
        .total
        {
            font-weight: bold;
        }
        .del
        {
            background-color: rgba(255, 105, 0, 1); 
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0.5, 0.5, 0.8);
        }

        th,
        td {
            text-align: center;
            padding: 15px;
        }

        th {
            /* font-family: 'Dancing Script', cursive;  */
            background-color: #FEAF39;
            color: white;
            font-size: 15px;
            text-transform: uppercase;
        }
        hr
        {
            text-align: center;
            width: 85%;
            color: gray;
        }
        
        /* CSS CHO CÁC NÚT */
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #FEAF39;
            border: none;
            border-radius: 10px;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        a:hover {
            background-color: #FEAF39;
        }
        

       /* CSS CHO NÚT SỐ LƯỢNG */
        /* Style for quantity buttons */
        .quantity-btn {
            background-color: rgba(255, 105, 0, 1);
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            margin: 0 5px;
            display: inline-block; 
        }

        .quantity-btn:hover {
            background-color: #FEAF39;
        }

        
        .quantity input {
            width: 40px;
            text-align: center;
            border: none;
            font-size: 17px;
            margin: 0 5px;
        }

        /* CSS CÁC NÚT CHỨC NĂNG */
        .exit {
            position: absolute; 
            top: 10px;
            right: 10px;
            background-color: red;
            padding: 5px 10px;
            border: none;
            border-radius: 5px; 
            color: white;
            text-decoration: none;
            font-size: 14px; 
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .exit:hover {
            background-color: rgba(255, 0, 0, 0.7);
        }
        .continue {
            /* position: fixed; */
            top: 10px;
            left: 10px;
            background-color: rgba(255, 105, 0, 1);
            padding: 10px 20px; 
            border: none;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .continue:hover {
            background-color:rgba(255, 105, 0, 0.8);
        }
        .order{
            position: absolute; 
            right: 50px;
            background-color: #FEAF39;
            padding: 15px 20px;
            border: none;
            border-radius: 20px; 
            color: white;
            text-decoration: none;
            font-size: 14px; 
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .order:hover
        {
            background-color:rgba(255, 105, 0, 0.8);
        }

        .delall
        {
            background-color: rgba(255, 80, 0, 1);
            padding: 10px 20px; 
            border: none;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .delall:hover
        {
            background-color:rgba(255, 80, 0, 0.5);
        }
        

    </style>
</head>

<body>
    <h1>WELCOME CUSTOMER TO SHOPPING CART</h1>
    <!--Thoát giỏ hàng-->
    <a href="?controller=nhan_vien&action=exit" 
    class="exit" onclick="return confirm('Việc thoát sẽ xóa toàn bộ giỏ hàng! Bạn có chắc muốn thoát?')">THOÁT</a>

    <!--Tiếp tục mua hàng-->
    <a href="?controller=nhan_vien&action=datmon" class="continue">TIẾP TỤC MUA HÀNG</a>

    <!--Đặt hàng-->
    <a href="?controller=nhan_vien&action=order" class="order" 
    onclick="return confirm('Hãy đảm bảo số lượng và tổng tiền trong giỏ là chính xác bạn nhé!')">ĐẶT HÀNG</a>

    <!--Xóa giỏ hàng-->
    <a href="?controller=nhan_vien&action=delcart" class="delall"
    onclick="return confirm('Việc này sẽ xóa toàn bộ món ăn trong giỏ hàng, bạn có chắc muốn tiếp tục!')">XÓA GIỎ HÀNG</a>

    <!--Form lấy thông tin giỏ hàng qua trang đơn hàng-->
    <form action="?controller=nhan_vien&action=order" method="post">
    <?php
   if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
    echo '<table>
    <tr>
        <th>STT</th>
        <th>Tên món ăn</th>
        <th>Hình ảnh món ăn</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Hành động</th>
    </tr>';
    $i = 0;
    $tong = 0;
    // print_r($_SESSION['giohang']);
    // echo '<input type="hidden" name="ngayNhanMon" value="' . $_SESSION['giohang'][0][5] . '">';
    foreach ($_SESSION['giohang'] as $key => $value) {
        // Kiểm tra nếu mảng có đủ phần tử
        if (count($value) >= 5) {
            $tt = floatval($value[2]) * floatval($value[4]); // Tính toán giá trị mới của thành tiền
            $tong += $tt;
            $_SESSION['giohang'][$key][6] = $tt; // Lưu giá trị mới vào mảng 
            echo '<tr>
            <td>' . ($i + 1) . '</td>
            <td class="foodname">' . $value[1] . '</td>
            <td class="foodimage"><img src="view/assets/img/' . $value[3] . '" height="100px" width="100px" alt=""></td>
            <td class="price" data-unit-price="' . $value[2] . '">' . $value[2] . '</td>
            <td class="quantity">
                <div class="quantity-btn" onclick="changeQuantity(' . $i . ', -1)">-</div>
                <input type="text" class="quantity" name="sl" value="' . $value[4] . '" readonly>
                <input type="hidden" name="quantity" value="' . $value[4] . '">
                <div class="quantity-btn" onclick="changeQuantity(' . $i . ', 1)">+</div>
            </td>
            <td class="tt" >' . $tt . '
            <input type="hidden" name="item_total" value="' . $tt . '">
            </td>
            <td><a class="del" href="?controller=datmon&action=delcart&i=' . $i . '">Xóa</a></td>
            </tr>';
            echo '<tr><td colspan="7"><hr></td></tr>';
            $i++;
        }
    }
    echo '<tr>
    <td class="total" colspan="5" >TỔNG GIÁ TRỊ ĐƠN HÀNG CỦA BẠN:</td><td  class="totalvalue" id="totalOrderValue" >' . $tong . '
    <input type="hidden" name="order_total" value="' . $tong . '"></td><td></td>
    </tr>';
    echo '</table>';
}
    ?>

    <!-- <input type="submit" name="order" value="Proceed to Order"> -->
    </form>
</body>

<script>
    // hàm cập nhật số lượng và tính tổng thành tiền
    function changeQuantity(index, amount) {
        // lấy giá trị của quantity
        var currentQuantityInput = document.getElementsByName('sl')[index];
        // đổi thành kiểu int
        var currentQuantity = parseInt(currentQuantityInput.value);
        // tính ố lượng mới bằng cách + hoặc - 
        var newQuantity = currentQuantity + amount;
        // Kiểm tra số lượng không được nhỏ hơn 1
        if (newQuantity < 1) {
            newQuantity = 1;
        }
        // Cập nhật giá trị số lượng
        currentQuantityInput.value = newQuantity;
        // Lấy giá trị đơn giá từ data attribute
        var unitPrice = parseFloat(document.getElementsByClassName('price')[index].getAttribute('data-unit-price')) || 0;
        // Tính toán giá trị mới của thành tiền
        var newTotal = (newQuantity * unitPrice);
        // Cập nhật giá trị mới của thành tiền
        var ttElements = document.getElementsByClassName('tt');
        ttElements[index].textContent = newTotal;
        // Cập nhật tổng giá trị đơn hàng
        updateOverallTotalOrderValue();
    }
    // hàm tính lại tổng tiền phải trả
    function updateOverallTotalOrderValue() {
        var total = 0;
        var ttElements = document.getElementsByClassName('tt');
        for (var i = 0; i < ttElements.length; i++) {
            total += parseFloat(ttElements[i].textContent) || 0;
        }
        // Cập nhật cột tổng giá trị đơn hàng
        document.getElementById('totalOrderValue').textContent = total;
    }
    // cập nhật lại giỏ hàng
</script>


</html>