<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Sửa món ăn</title>
    <style>
       body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('view/assets/img/food background16.jpg');
            background-size: auto auto;
            /* background-repeat: no-repeat; */
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: auto;
        }
        .form {
            width: 450px; 
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: rgba(245, 245, 245, 0.92);
            height: auto; 
        }

        h2 {
        color: #FEAF39; 
        font-family: 'Montserrat', 'san-serif';
        background-color: rgba(251, 251, 251, 0.8);
        text-align: center;
        text-shadow: 2px 2px;
        font-size: 40px;
        margin-top: 10px;
        }

        label {
            font-family: 'Montserrat', 'san-serif'; 
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .image-preview {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
<h2>WELCOME MANAGER TO FOOD EDIT </h2>
    <form action="?action=update&controller=mon-an" method="post" class="form" enctype="multipart/form-data">
        <input type="hidden" name="MaMon" value="<?php echo $each['MaMon'] ?>">
        <label for="TenMonAn">Tên món ăn</label>
        <input type="text" id="TenMonAn" name="TenMonAn" value="<?php echo $each['TenMonAn'] ?>">
        <label for="HinhAnh">Hình ảnh món ăn</label>
        <img src="view/assets/img/<?php echo $each['HinhAnh'] ?>" id="image-preview" alt="Hình ảnh món ăn" class="image-preview">
        <input type="file" id="HinhAnh" name="HinhAnh" onchange="previewImage(event)">
        <label for="MoTaMonAn">Mô tả món ăn</label>
        <input type="text" id="MoTaMonAn" name="MoTaMonAn" value="<?php echo $each['MoTaMonAn'] ?>">
        <label for="GiaMonAn">Giá món ăn</label>
        <input type="text" id="GiaMonAn" name="GiaMonAn" value="<?php echo $each['GiaMonAn'] ?>">
        <label for="MaLoaiMonAn">Loại món ăn</label>
        <select id="MaLoaiMonAn" name="MaLoaiMonAn" required>
        <?php foreach ($arr2 as $each2): ?>
            <option value="<?php echo $each2['MaLoaiMonAn']; ?>">
                <?php echo $each2['MaLoaiMonAn'] . ' - ' . $each2['TenLoaiMonAn']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <button type="submit" name="submit" onclick="confirmAndGoToHomePageAfterEdit()">SỬA</button>
        <button type="reset" name="reset" value="reset" onclick="confirmAndGoToHomePage()">QUAY LẠI</button>
    </form>

</body>
<!--Nhấn nút Thoát quay trở về trang chủ-->
<script>
function confirmAndGoToHomePage() {
    var confirmExit = confirm("Bạn muốn hủy chỉnh sửa và thoát?");
    if (confirmExit) {
        // Nếu người dùng xác nhận thực hiện thoát
        window.location.href = 'https://kitchenpro1111.000webhostapp.com/?controller=mon-an&role=1';
    }
}
function confirmAndGoToHomePageAfterEdit() {
    var confirmExit = confirm("Bạn đồng ý sửa đổi món ăn này?");
    if (confirmExit) {
        // Nếu người dùng xác nhận
        window.location.href = 'https://kitchenpro1111.000webhostapp.com/?controller=mon-an&role=1';
    }
}
</script>
<!-- JavaScript để xem trước hình ảnh -->
<script>
function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var img = document.getElementById('image-preview');
        img.src = reader.result;
    };
    reader.readAsDataURL(input.files[0]);
}
</script>

</html>
