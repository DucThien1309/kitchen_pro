<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <link rel="stylesheet" href="/View/nguyenlieu/style.css">
    <title>Quản Lí Nguyên Liệu</title>
    <style>
        a.button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            /* Kích thước nút bấm */
            background-color: #FEAF39;
            /* Màu nền của nút */
            color: #fff;
            /* Màu chữ của nút */
            text-decoration: none;
            /* Bỏ gạch chân mặc định cho liên kết */
            border: none;
            border-radius: 5px;
            /* Bo tròn góc của nút */
            margin: 5px;
            /* Khoảng cách giữa các nút bấm */
        }

        /* Định dạng nút "Xóa" và "Sửa" khi di chuột qua */
        a.button:hover {
            background-color: #0056b3;
            /* Màu nền khi di chuột qua */
        }

        /* Định dạng tiêu đề */
        h3 {
            color: #fff;
            /* Màu chữ tiêu đề */
        }

        /* Định dạng background của dòng tiêu đề */
        tr.header-row {
            background-color: #333;
        }

        /* Định dạng ô input và textarea */
        input[type="text"],
        textarea {
            width: 98%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px 0;
        }

        /* Định dạng nút "Thêm Nguyên Liệu" */
        input[type="submit"] {
            background-color: #FEAF39;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Định dạng nút "Thêm Nguyên Liệu" khi di chuột qua */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Định dạng cột trái (label) */
        td.left-column {
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
            padding: 5px;
            width: 10%;
        }

        /* Định dạng cột phải (input và textarea) */
        td.right-column {
            padding: 5px;
        }

        /* Định dạng table */
        table {
            width: 100%;
        }

        /* Định dạng border cho table */
        table,
        th,
        td {
            border: 2px solid #333;
            border-collapse: collapse;
        }

        /* Định dạng header của table */
        th {
            background-color: #333;
            color: #fff;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="quanlinguyenlieu">
        <form id="form1" name="form1" method="post" action="">
            <table width="700" border="1" align="center">
                <tr class="header-row">
                    <td height="100" colspan="2" align="center">
                        <h3>QUẢN LÝ NGUYÊN LIỆU</h3>
                    </td>
                </tr>
                <tr>
                    <td class="left-column"><label for="TenNguyenLieu">Tên </label></td>
                    <td class="right-column">
                        <input name="ten" type="text" id="TenNguyenLieu" placeholder="Nhập tên nguyên liệu" />
                    </td>
                </tr>
                <tr>
                    <td class="left-column"><label for="GiaNguyenLieu">Giá </label></td>
                    <td class="right-column">
                        <input name="gia" type="text" id="GiaNguyenLieu" placeholder="Nhập giá nguyên liệu" />
                    </td>
                </tr>
                <tr>
                    <td class="left-column"><label for="DonViTinh">Đơn vị tính</label></td>
                    <td class="right-column">
                        <input name="donvitinh" type="text" id="DonViTinh" placeholder="Nhập đơn vị tính nguyên liệu" />
                    </td>
                </tr>
                <tr>
                    <td class="left-column"><label for="MoTaNguyenLieu">Mô tả</label></td>
                    <td class="right-column">
                        <textarea name="mota" id="MoTaNguyenLieu" rows="5" placeholder="Nhập mô tả nguyên liệu"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="add_nl" id="add_nl" value="Thêm Nguyên Liệu" />
                    </td>
                </tr>

            </table>
            <a class="button" href="index.php?controller=nguyen-lieu">Danh Sách</a>
        </form>
    </div>
</body>

</html>