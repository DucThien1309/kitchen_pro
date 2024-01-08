<?php
// session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 3) {
    header("Location: ?controller=dang_nhap&role=3");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Đặt món</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .body {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-top: 20px;
        }

        .menu {
            flex: 1;
            background-color: #f2f2f2;
            padding: 20px;
            min-height: 100%;
        }

        .menu-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
        }

        .main {
            flex: 3;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            background-color: #e6e6e6;
        }

        .product {
            display: flex;
            width: 250px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .product-pic {
            flex: 1;
            background-color: #f2f2f2;
        }

        .product-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-content {
            flex: 1;
            padding: 20px;
        }

        .product-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            color: green;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .buy {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .buy:hover {
            background-color: darkgreen;
        }

        .footer {
            height: 50px;
            background-color: #f2f2f2;
            margin-top: 20px;
        }

        #total {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>KitChen Pro</h1>
        </div>
        <div class="body">
            <div class="main">
                <?php foreach ($arr as $each) : ?>
                    <form action="?controller=datmon&action=addcart" method="post">
                        <div class="product">
                            <div class="product-pic"><?php echo $each['HinhAnh']; ?></div>
                            <div class="product-content">
                                <div class="product-name"><?php echo $each['TenMonAn']; ?></div>
                                <div class="product-price"><?php echo $each['GiaMonAn']; ?></div>
                                <div>
                                    <input type="submit" value="Mua Hàng" name="addtocart">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $each['MaMon']; ?>" name="id">
                        <input type="hidden" value="<?php echo $each['TenMonAn']; ?>" name="tensp">
                        <input type="hidden" value="<?php echo $each['GiaMonAn']; ?>" name="giasp">
                        <input type="hidden" value="<?php echo $each['HinhAnh']; ?>" name="hinhanh">
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="footer"></div>
    </div>


</body>

</html>