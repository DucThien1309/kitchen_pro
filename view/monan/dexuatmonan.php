<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Đề xuất món ăn</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    /* background-color: #f4f4f4; */
    background-image: url("view/assets/img/food background13.jpg");
    background-size: auto auto;
    margin: 0;
    padding: 0;
}

.form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: rgba(250, 255, 255, 0.94); 
    box-shadow: 3px 2px 10px rgba(0, 0, 0, 0.7);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    text-align: center;
    padding: 15px;
}

input[type="text"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="file"] {
    margin-bottom: 15px;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}
h1
{
    text-align: center;
    font-family: "Montserrat";
    text-shadow: 2px 2px 2px;
    color: Green;
}
a {
        text-decoration: none;
        color:  rgba(255, 80, 0, 0.8);
        font-size: 20px;
        font-weight: bold;
        padding: 5px;
        text-shadow: 1px;
        border-radius: 10px;
        background-color: #F9D0B2;
    }


    </style>
</head>
<body>
<a href="?controller=nhan_vien">BACK</a>
<h1>WELCOME CUSTOMER TO FOOD SUGGESTION</h1>
<form id ="orderForm" action="?action=store&controller=dexuatmonan" method="post" class="form" enctype="multipart/form-data">
    <label for="TenMonAn">MỜI NHẬP TÊN MÓN ĂN</label>
    <input type="text" id="TenMonAn" name="TenMonAn">

    <label for="HinhMinhHoa">MỜI CHỌN HÌNH ẢNH MÓN ĂN</label>
    <input type="file" id="HinhMinhHoa" name="HinhMinhHoa" accept="image/*"   >

    <label for="MoTa">MỜI NHẬP MÔ TẢ MÓN ĂN</label>
    <input type="text" id="MoTa" name="MoTa">

    <button type="submit" name="submit" value="submit">ĐỀ XUẤT</button>
</form>

</body>



</html>
