<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Danh Sách Nguyên Liệu</title>
    <style>
        /* Định dạng nút "Xóa" và "Sửa" */
        td.actions {
            text-align: center;
            /* Căn giữa nút bấm trong cột */
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
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

        /* Định dạng cho div chứa nút "Tìm kiếm" */
        /* Định dạng cho ô tìm kiếm */
        .timkiem {
            text-align: right;
            /* Căn chỉnh tất cả nội dung bên phải */
        }

        .timkiem input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 50px;
            width: 300px;
        }

        .timkiem input[type="submit"] {
            background-color: #FEAF39;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            height: 63px;
            width: 100px;
        }

        .timkiem input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="danhsach">
        <h2 style="text-align: center; color: #FEAF39;">Danh Sách Nguyên Liệu</h2>
        <a class="button" href="index.php?controller=nguyen-lieu&action=add">Thêm</a>
        <a class="button" href="index.php">Về Trang Chủ</a>
        <div class="timkiem">
            <form action="" method="GET">
                <table width="100%">
                    <tr>
                        <input type="hidden" name="controller" value="nguyen-lieu">
                        <td><input type="text" name="tukhoa" placeholder="Nhập nguyên liệu cần tìm"></td>
                        <td style="width: 100px;"><input type="submit" value="Tìm kiếm"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="tim-kiem">
            </form>
        </div>
        <table width="100%" border="1">
            <thead style="background-color: #333;color: #fff;">
                <tr style="height: 50px;">
                    <td align="center"><strong>STT </strong></td>
                    <td align="center"><strong>Tên Nguyên Liệu</strong></td>
                    <td align="center"><strong>Giá Nguyên Liệu</strong></td>
                    <td align="center"><strong>Đơn Vị Tính</strong></td>
                    <td align="center"><strong>Mô Tả Nguyên Liệu</strong></td>
                    <td align="center"><strong>Hành Động</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                foreach ($data as $value) {
                ?>
                    <tr style="height: 40px;">
                        <td align="center"><?php echo $stt; ?></td>
                        <td align="center"><?php echo $value['TenNguyenLieu']; ?></td>
                        <td align="center">
                            <?php
                            $gia = $value['GiaNguyenLieu'];
                            $formattedGia = number_format($gia, 0, '.', ','); // Định dạng giá với dấu phẩy sau mỗi 3 số
                            echo $formattedGia . ' VNĐ';
                            ?>
                        </td>
                        <td align="center"><?php echo $value['DonViTinh']; ?></td>
                        <td align="center"><?php echo $value['MoTaNguyenLieu']; ?></td>
                        <td class="actions">
                            <a onclick="return confirm('Bạn có chắc muốn xóa nguyên liệu không?')" href="index.php?controller=nguyen-lieu&action=delete&id=<?php echo $value['MaNguyenLieu']; ?>" class="button" style="background-color: #f53141;">Xóa</a>
                            <a href="index.php?controller=nguyen-lieu&action=edit&id=<?php echo $value['MaNguyenLieu']; ?>" class="button">Sửa</a>
                        </td>

                    </tr>
                <?php
                    $stt++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>