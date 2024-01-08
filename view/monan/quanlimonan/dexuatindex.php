<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Danh sách đề xuất</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('view/assets/img/food background7.jpg');
            background-size: auto auto;
            /* background-repeat: no-repeat; */
        }
        h1 {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            font-size: 40px;
            color: black;
            background-color: rgba(251, 251, 251, 0.8);
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: rgba(51, 51, 51, 0.94);
            color: #fff;
            text-align: center;
        }
        tr
        {
            background-color: rgba(249, 249, 249, 0.94);
            font-family: 'Montserrat';
           
        }
        td.food-name {
            text-transform: uppercase; /* Viết in hoa tên món ăn */
        }
        a {
        display: block; 
        font-family: 'Montserrat'; 
        float: right;
        margin-right: 20px; 
        margin-top: 10px;
        margin-bottom: 30px; 
        text-decoration: none; 
        padding: 5px 10px; 
        background-color: red; 
        color: #fff; 
        border-radius: 5px; 
    }
    .new{
        background-color: rgba(0, 128, 0, 0.8); 
    }
    .exit{
        background-color: rgba(255, 0, 0, 0.8);
    }
    </style>
</head>
<body>
    
     
    <a href="https://kitchenpro1111.000webhostapp.com/?controller=quan_li" class="exit">THOÁT</a>
    <a href="https://kitchenpro1111.000webhostapp.com/?action=create&controller=mon-an" class="new">THÊM MỚI</a>
    <br> <br> <br>
    <h1>WELCOME BACK TO KITCHEN PRO FOOD SUGGESTION</h1>
    <form action="?action=storesuggestfood&controller=xemdexuatmonan" method="post" class="form" enctype="multipart/form-data">
    <table>
        <thead>
            <tr>
                <th>FOOD NAME SUGGESTED</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arr as $i => $dish) :?>
                <tr>
                    <td class="food-name" ><?php echo $dish['TenMonAn']; ?></td>
                    <td><?php echo $dish['MoTa']; ?></td>
                    <td class="image-cell"><?php echo $dish['HinhMinhHoa']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </form>
</body>

</html>
