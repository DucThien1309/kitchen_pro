<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
    
    <style>
        body {
            font-family: 'Roboto', serif;
            font-size: 19px;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #FEAF39; 
            color: #ffffff; 
            padding: 20px; 
            text-align: center;
            margin-bottom: 30px; 
            font-family: 'Dancing Script', cursive; 
        }

        h1 {
            font-size: 2.5em; 
            margin-bottom: 10px; 
        }


        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; 
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        th,
        td {
            
            border: 1px solid #dddddd;
            padding: 15px; 
            text-align: center;
        }
        th {
            font-family: 'Dancing Script', cursive;
            background-color: #FEAF39;
            color: #ffffff;
            text-transform: uppercase;
        }
    
        tr:nth-child(even) {
            
            background-color: #f2f2f2; 
        }
        tr.category-header {
            background-color: #3498db;
            color: #ffffff;
        }
        tr:hover {
            background-color: #f5f5f5; 
        }
        .dishname
        {
            text-transform: uppercase;
        }

        /*Css cho nút thêm mới món ăn */
            a.newdish {
            text-decoration: none;
            padding: 12px 24px;
            background-color: rgba(255, 105, 0, 1); 
            border: 2px solid rgba(255, 105, 0, 1);
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            text-align: center;
            color: #fff;
            font-weight: bold;
            margin-left: 10px;
            margin-bottom: 20px;
            font-family: 'Times New Roman', serif; 
            font-size: 18px;
        }

        a.newdish:hover {
            background-color: rgba(255, 105, 0, 0.8); 
            color: #2c3e50; 
        }
        /* Hết Css cho nút thêm mới món ăn */

        /* Css cho các thẻ a */
        a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #FEAF39;
            border: 2px solid #FEAF39;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            text-align: center;
            color: #fff;
            font-weight: bold;
            margin-bottom: 20px;
        }
        a:hover {
        background-color: rgba(254, 175, 57, 0.8); 
        color: #2c3e50; 
        }
        a.category {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #FEAF39;
            border: 2px solid #FEAF39;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            text-align: center;
            color: #fff;
            font-weight: bold;
            margin: 0 10px; 
        }
        a.category:hover {
            background-color: rgba(254, 175, 57, 0.8);
            color: #2c3e50;
        }
        .category-contain
        {
            text-align: center;
            margin-bottom: 20px;
        }
        header {
            position: relative;
        }
        .exit {
            position: absolute;
            top: 10px; 
            right: 10px; 
            font-size: 14px;
            padding: 5px 10px;
            background-color: rgba(255, 105, 0, 1);
            color: #fff; 
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .exit:hover {
            background-color: rgba(255, 105, 0, 0.8);
        }
    </style>

</head>
<body>
    
    <header>
        <a href="https://kitchenpro1111.000webhostapp.com/?controller=quan_li" class="exit">THOÁT</a>
        <h1>WELCOME BACK TO KITCHEN PRO FOOD MANAGEMENT</h1>
    </header>
    <!--nút thêm mới món ăn-->
    <a class="newdish" href="?action=create&controller=mon-an">Add New Dish</a>
    <!-- hết nút thêm mới món ăn-->

    <!--nút phân loại món ăn-->
    <div class="category-contain">
        <a class="category" href="?category=tat-ca&controller=mon-an">Tất Cả</a>
        <a class="category" href="?category=mon-xao&controller=mon-an">Món Xào</a>
        <a class="category" href="?category=mon-kho&controller=mon-an">Món Kho</a>
        <a class="category" href="?category=mon-chien&controller=mon-an">Món Chiên</a>
        <a class="category" href="?category=mon-canh&controller=mon-an">Món Canh</a>
        <a class="category" href="?category=nuoc-uong&controller=mon-an">Nước Uống</a>
        <a class="category" href="?category=mon-com&controller=mon-an">Món Cơm</a>
        <a class="category" href="?category=trang-mieng&controller=mon-an">Tráng Miệng</a>
        <a class="category" href="?category=trai-cay&controller=mon-an">Trái Cây</a>
        <a class="category" href="?category=mon-chay&controller=mon-an">Món Chay</a>
    </div>
    <!--bảng hiển thị món ăn-->
    <table>
        <tr>
            <th>Order ID</th>
            <th>Dish Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($arr as $i => $dish): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td class="dishname"><?php echo $dish['TenMonAn']; ?></td>
                <td><?php echo $dish['HinhAnh']; ?></td>
                <td><?php echo $dish['MoTaMonAn']; ?></td>
                <td><?php echo $dish['GiaMonAn']; ?></td>
                <!--nút chỉnh sửa món ăn-->
                <td>
                    <a href="?action=edit&maMon=<?php echo $dish['MaMon']; ?>&controller=mon-an">Edit</a>
                </td>
                <!--nút xóa món ăn-->
                <td>
                    <a href="javascript:void(0);" onclick="confirmAndDelete('<?php echo $dish['MaMon']; ?>')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

<!--xác nhận xóa món ăn-->
<script>
    function confirmAndDelete(maMon) {
        var result = confirm("Are you sure you want to delete this dish?");
        if (result) {
           
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                   
                    console.log(xhr.responseText);
                   
                    window.location.reload();
                }
            };
            xhr.open("GET", "?action=delete&maMon=" + maMon + "&controller=mon-an", true);
            xhr.send();
        }
    }
</script>
  <!--hết code xác nhận xóa món ăn-->

</html>
