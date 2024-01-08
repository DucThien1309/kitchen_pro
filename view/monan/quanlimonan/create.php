<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Tạo món ăn</title>
    <style>
       body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('view/assets/img/food background17.jpg');
            background-size: auto auto;
            /* background-repeat: no-repeat; */
            margin: 0;
            padding: 0;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 93.65vh;
        }

        .form {
            width: 500px; 
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: rgba(245, 245, 245, 0.93);
            height: 450px; 
        }

        h2 {
        color: #FEAF39; 
        background-color: rgba(251, 251, 251, 0.9);
        font-family: 'Montserrat', 'san-serif' ; 
        text-align: center;
        font-size: 50px;
        
        }

        label {
            font-family: 'Montserrat', 'san-serif'; 
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button[type="reset"] 
        {
            display: inline-block;
            width: 48%;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 17px;
            font-weight: bold;
        }

        button[type="submit"]
        {
            display: inline-block;
            width: 48%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 17px;
            font-weight: bold;
        }

        button[type="submit"]:hover
        {
            background-color: #45a049;
        }
        button[type="reset"]:hover {
            background-color:  #f45a49;
        }
    </style>
</head>
<body>

<h2>Welcome Back Manager!! Please add new dish</h2>

<!--Form hiển thị bảng thêm mới món ăn-->
<form action="?action=storenewdish&controller=mon-an" method="post" class="form" enctype="multipart/form-data">
    <label for="TenMonAn">Mời nhập tên món ăn</label>
    <input type="text" id="TenMonAn" name="TenMonAn" required>
    <label for="HinhAnh">Mời chọn hình ảnh món ăn</label>
    <input type="file" id="HinhAnh" name="HinhAnh" accept="image/*" required>
    <label for="MoTaMonAn">Mời nhập mô tả món ăn</label>
    <input type="text" id="MoTaMonAn" name="MoTaMonAn" required>
    <label for="GiaMonAn">Mời nhập giá món ăn</label>
    <input type="text" id="GiaMonAn" name="GiaMonAn" required>
    <label for="MaLoaiMonAn">Mời chọn loại món ăn</label>
    <select id="MaLoaiMonAn" name="MaLoaiMonAn" required>
        <?php foreach ($arr2 as $each2): ?>
            <option value="<?php echo $each2['MaLoaiMonAn']; ?>">
                <?php echo $each2['MaLoaiMonAn'] . ' - ' . $each2['TenLoaiMonAn']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="submit" value="submit">THÊM MỚI</button>
    <button type="reset" name="reset" value="reset" onclick="confirmAndGoToHomePage()">THOÁT</button>
</form>

</body>
<!--Nhấn nút Thoát quay trở về trang chủ-->
<script>
function confirmAndGoToHomePage() {
    var confirmExit = confirm("Bạn có chắc chắn muốn thoát?");
    if (confirmExit) {
        // Nếu người dùng xác nhận thực hiện thoát
        window.location.href = 'https://kitchenpro1111.000webhostapp.com/?controller=mon-an&role=1';
    }
}
</script>

</html>
