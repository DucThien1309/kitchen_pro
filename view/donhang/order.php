<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Đặt hàng</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f8f9fa;
}
.container
{
 width: 800px;
 height: auto;   
 margin: 0 auto;
 box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
 border: 2px solid #FEAF39;
 border-radius: 8px;
 padding: 30px;
 background-color: #ffffff;
}
hr
{
    border: 1px solid #FEC97A;
    text-align: center;
    width: 80%;
}

h2 {
    color: #FEAF39; 
    font-family: 'Dancing Script'; 
    text-align: center;
    font-size: 40px;
    padding: 5px;
}
h3, .h3
{
    font-weight: 100px;
    font-family: 'Roboto Mono'; 
    text-align: center;
    padding: 10px;
    font-size: 15px;
}
/* Thêm class cho ngày đặt món và ngày nhận món */
.date-input-container {
    text-align: center;
}

.input-date {
    max-width: 250px;
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    display: inline-block; /* Để có thể sử dụng text-align */
}

/* Thêm border-radius cho ngày nhận món */
#ngayNhanMon {
    border-radius: 5px;
}

/* Định dạng ngày đặt món và ngày nhận món */
.container label.h3 {
    display: block;
    margin-bottom: 5px;
}

.container hr {
    border: 1px solid #FEAF39;
    text-align: center;
    width: 80%;
    margin-top: 20px;
    margin-bottom: 20px;
}

/* Thêm padding cho ngày nhận món để tạo khoảng cách với các phần khác */
#ngayNhanMon {
    padding: 8px;
}

.button {
    margin-top: 20px;
    text-align: center;
}



h4 {
    color: #FEAF39; 
    font-family: 'Roboto'; 
    text-align: center;
    font-size: 25px;
    padding: 5px;
}

label {
    font-weight: bold;
}

input {
    padding: 8px;
    margin-bottom: 10px;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}
td
{
    text-transform: uppercase;
}
td, image
{
    border-radius: 20px;
}

th {
    text-align: center;
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e0e0e0;
}

.button {
    margin-top: 20px;
}

button, .delete {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
}

.delete {
    background-color: #f44336;
}
a
{
    text-decoration: none;
}
textarea {
        width: 80%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-sizing: border-box;
        text-align: center;
    }
.notes
{
    
    margin-top: 25px;
    color: #FEAF39;
    font-weight: bold;
    text-align: center;
}

</style>

<body>
    <?php   
    // print_r($_SESSION['giohang']);
    if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0)
    {
        // if ($_REQUEST['order']) {
        //     if (isset($_POST['sl']) && isset($_POST['item_total']))
        //     {
        //         // Lấy giá trị số lượng và thành tiền từ $_POST
        //         $quantity = $_POST['sl'];
        //         $itemTotal = $_POST['item_total'];
        //         echo  $quantity;
       
        $tong = 0;
        echo '<h2>THÔNG TIN ĐƠN HÀNG</h2>';
        echo '<div class="container">';
        echo '<form action="?controller=datmon&action=store" method="post">';
        echo '<h3>HỌ VÀ TÊN NGƯỜI ĐẶT: <i>' .$_SESSION['name'] .'</i></h3>'; 
        echo '<hr>';
        echo '<h3>MÃ NHÂN VIÊN: <i>' .$_SESSION['id'] .'</i></h3>';
        echo '<hr>';
        echo '<div class="date-input-container">';
        echo '<label for="ngayDat" class="h3">NGÀY ĐẶT MÓN: </label>';
        echo '<input class="h3 input-date"  type="date" id="ngayDat" name="ngayDatMon" value="' . date('Y-m-d') . '" onchange="validateDate()" ><br><br>';
        echo '</div>';
        echo '<hr>';
        echo '<div class="date-input-container">';
        echo '<label for="ngayNhanMon" class="h3">VUI LÒNG CHỌN NGÀY NHẬN MÓN: </label>';
        // echo '<input class="h3 input-date" type="date" id="ngayNhanMon" name="ngayNhanMon" required onchange="validateDate()" ><br><br>';
        echo '<input class="h3 input-date"  type="date" id="ngayDat" name="ngayNhanMon" value="' . date("Y-m-d", strtotime($_SESSION['giohang'][0][5])) . '" onchange="validateDate()" ><br><br>';
        echo '</div>';        
        echo '<hr>';
        echo '<div class="date-input-container">';
        echo '<textarea id="ghiChu" name="ghiChu" rows="4" placeholder="Nếu có gì cần nhắn nhủ với đầu bếp thì ghi vào đây nhé!!"></textarea><br>';
        echo '</div>';
        echo '<hr>';

        echo '<h4>DANH SÁCH CÁC MÓN ĂN ĐÃ ĐẶT</h4>';
        echo '<table>
            <tr>
                <th>STT</th>
                <th>TÊN MÓN ĂN</th>
                <th>HÌNH ẢNH</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
            </tr>';
        $i = 1;
        foreach ($_SESSION['giohang'] as $value) {
            echo '<tr>
                <td>' . $i . '</td>
                <td>' . $value[1] . '</td>
                <td class="image"><img  height="100px" width="100px" src="view/assets/img/' . $value[3] . '"</td>
                <td>' . $value[4]  . '</td>
                <td>' . $value[6] . '</td>
            </tr>';
            $tong += $value[6];
            $i++;
        }
        echo '<tr>
            <td colspan="4">Tổng giá trị đơn hàng:</td>
            <td>' . $tong . '</td>
            <input type="hidden" name="tongGiaTri" value="' . $tong . '">.
        </tr>';
        echo '</table>';
        echo '<div class="notes">';
        echo 'Vui lòng kiểm tra kĩ đơn hàng trước khi đặt';
        echo "</div>";
        echo '<div class="button">';
        echo '<button type="submit" class="confirm" name="submit" value="submit" onclick = return("đặt hàng thành công!!")>Đặt hàng</button>';
        echo '<a class="delete" href="?controller=datmon&action=delcart" onclick="return confirm(\'Việc này sẽ hủy đơn hàng đồng thời xóa toàn bộ hàng trong giỏ! Bạn muốn tiếp tục?\')">HỦY ĐƠN HÀNG</a>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
    }
    else 
        {
            echo 'Giỏ hàng trống.';
        }
    ?>

</body>
<script>
function validateDate() {
    var ngayDatInput = document.getElementById('ngayDat');
    var ngayNhanMonInput = document.getElementById('ngayNhanMon');
    
    // Parse input values as dates
    var ngayDat = new Date(ngayDatInput.value);
    var ngayNhanMon = new Date(ngayNhanMonInput.value);
    var currentDate = new Date();

    // Calculate the difference in hours
    var timeDiff = Math.abs(ngayNhanMon - ngayDat) / 36e5;

    // Check conditions for Ngay Dat
    if (ngayDat < currentDate || ngayDatInput.value === '' || timeDiff < 24) {
        alert('Ngày đặt món phải sau hoặc bằng ngày hiện tại và trước 24 giờ trước khi nhận món!!! Vui lòng chọn lại!');
        ngayDatInput.value = currentDate.toISOString().split('T')[0];
        return;
    }

    // Check conditions for Ngay Nhan Mon
    if (ngayNhanMon <= ngayDat || ngayNhanMon < currentDate || ngayNhanMonInput.value === '' || timeDiff < 24) {
        alert('Ngày nhận món phải sau ngày đặt món, sau ngày hiện tại và ít nhất là 24 giờ sau ngày đặt món!!');
        ngayNhanMonInput.value = '';  // Reset giá trị ngày nhận món
        return;
    }
}






</script>


</html>