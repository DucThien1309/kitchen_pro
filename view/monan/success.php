<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('view/assets/img/food background7.jpg');
            background-size: auto auto;
        }
        h1 {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            font-style: italic; 
            text-align: center;
            font-size: 40px;
            color: white;
            padding-top: 50px;
            padding-bottom: 20px;
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
            background-color: rgba(51, 51, 51, 0.92);
            color: #fff;
            text-align: center;
        }
        tr
        {
            background-color: rgba(249, 249, 249, 0.92);
            font-family: 'Dancing Script', cursive;
           
        }
        td.food-name {
            text-transform: uppercase; /* Viết in hoa tên món ăn */
        }
        a {
        display: block; 
        font-family: 'Dancing Script', cursive; 
        float: right;
        margin-right: 20px; 
        margin-top: 10px;
        margin-bottom: 30px; 
        text-decoration: none; 
        padding: 10px 15px; 
        background-color: red; 
        color: #fff; 
        border-radius: 5px; 
    }
    .new{
        background-color: green; 
    }
    </style>
</head>
<body>
    <a href="?controller=nhan_vien">BACK</a>
     <h1>VIEW ALL YOUR SUGGESSTION</h1>
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
</body>

</html>
