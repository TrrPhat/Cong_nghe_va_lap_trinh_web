<?php
include("inc/connect.inc");

if (isset($_GET['lop'])) {
    $lop = $_GET['lop'];
    $sql = "SELECT masv, hoten, lop, diachi FROM sinhvien WHERE lop='$lop'";
    $rs = mysqli_query($con, $sql);

    $str = "<table border='1' cellpadding='5' cellspacing='0'>";
    $str .= "<tr class='hd'><th>Mã SV</th><th>Họ tên</th><th>Lớp</th><th>Địa chỉ</th></tr>";

    while ($row = mysqli_fetch_assoc($rs)) {
        $str .= "<tr>
                    <td>{$row['masv']}</td>
                    <td>{$row['hoten']}</td>
                    <td>{$row['lop']}</td>
                    <td>{$row['diachi']}</td>
                </tr>";
    }

    $str .= "</table>";
    echo $str;
}
?>
