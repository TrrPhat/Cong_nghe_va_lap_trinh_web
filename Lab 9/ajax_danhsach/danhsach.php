<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ajax - Danh sách sinh viên theo lớp</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<style>
body {font-size: 11pt;}
div {padding: 3px 5px; font: normal 13pt Arial;}
table {background-color: #eaeaea; border-collapse: collapse;}
td, th {font: normal 11pt Arial; border: 1px solid gray; padding: 5px;}
.hd {background-color: navy; color: white;}
</style>

<script>
function sendajax() {
    var lop = document.getElementById("lop").value;
    var objds = document.getElementById("ds");

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            objds.innerHTML = xml.responseText;
        }
    }
    xml.open("GET", "ds.php?lop=" + lop, true);
    xml.send();
}
</script>
</head>

<body>
<h3>In danh sách sinh viên theo từng lớp</h3>

<?php
include("inc/connect.inc");

function initClass($conn) {
    $sql = "SELECT DISTINCT lop FROM sinhvien ORDER BY lop";
    $rs = mysqli_query($conn, $sql);
    $str = "Chọn lớp: <select id='lop' onchange='sendajax();'>";
    $str .= "<option value=''>-- Chọn lớp --</option>";
    while ($row = mysqli_fetch_assoc($rs)) {
        $str .= "<option value='{$row['lop']}'>{$row['lop']}</option>";
    }
    $str .= "</select>";
    echo $str;
}

initClass($con);
?>

<hr>
<div id="ds">Danh sách sinh viên sẽ hiển thị ở đây...</div>

</body>
</html>
