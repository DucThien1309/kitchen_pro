<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>QUẢN LÝ NGUYÊN LIỆU</title>
        <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
        <style>
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
                        background-color: #007bff;
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

                .back-button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #fff;
                        text-decoration: none;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                }

                /* Hover effect */
                .back-button:hover {
                        background-color: #0056b3;
                }
        </style>
</head>

<body>
        <div class="quanlinguyenlieu">
                <form id="form1" name="form1" method="post" action="">
                        <table width="700" border="1" align="center">
                                <tr class="header-row">
                                        <td height="100" colspan="2" align="center">
                                                <h3>QUẢN LÝ NGUYÊN LIỆU</h3< /td>
                                </tr>
                                <tr>
                                        <td class="left-column"><label for="TenNguyenLieu">Tên </label></td>
                                        <td class="right-column">
                                                <input name="ten" value="<?php echo $dataID['TenNguyenLieu'] ?>" type="text" id="TenNguyenLieu" placeholder="Nhập tên nguyên liệu" />
                                        </td>
                                </tr>
                                <tr>
                                        <td class="left-column"><label for="GiaNguyenLieu">Giá </label></td>
                                        <td class="right-column">
                                                <input name="gia" value="<?php echo $dataID['GiaNguyenLieu'] ?>" type="text" id="GiaNguyenLieu" placeholder="Nhập giá nguyên liệu" />
                                        </td>
                                </tr>
                                <tr>
                                        <td class="left-column"><label for="DonViTinh">Đơn vị tính</label></td>
                                        <td class="right-column">
                                                <input name="donvitinh" value="<?php echo $dataID['DonViTinh'] ?>" type="text" id="DonViTinh" placeholder="Nhập đơn vị tính nguyên liệu" />
                                        </td>
                                </tr>
                                <tr>
                                        <td class="left-column"><label for="MoTaNguyenLieu">Mô tả</label></td>
                                        <td class="right-column">
                                                <textarea name="mota" id="MoTaNguyenLieu" rows="5" placeholder="Nhập mô tả nguyên liệu"><?php echo $dataID['MoTaNguyenLieu'] ?></textarea>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2" align="center">
                                                <input onclick="return confirm('Bạn có chắc muốn sửa nguyên liệu không ?')" type="submit" name="update_nl" id="update_nl" value="Cập Nhật Nguyên Liệu" />
                                        </td>
                                </tr>

                        </table>
                        <a href="javascript:history.go(-1)" class="back-button">Back</a>
                </form>
        </div>
</body>

</html>