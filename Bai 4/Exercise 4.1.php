<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tính toán dãy số</title>
</head>

<body>
<?php 
$tong = $tong_chan = $tong_le = 0;
$tich = 1;
$error = "";

if (isset($_POST["so_dau"]) && isset($_POST["so_cuoi"]))
{
    $so_dau = intval($_POST["so_dau"]);
    $so_cuoi = intval($_POST["so_cuoi"]);
    
    if ($so_dau <= $so_cuoi) {
        for ($i = $so_dau; $i <= $so_cuoi; $i++) {
            $tong += $i;
            
            if ($i % 2 == 0) {
                $tong_chan += $i;
            } else {
                $tong_le += $i;
            }
            
            if ($tich < PHP_INT_MAX / abs($i)) {
                $tich *= $i;
            }
        }
    } else {
        $error = "Số bắt đầu phải nhỏ hơn hoặc bằng số kết thúc";
        $tong = $tong_chan = $tong_le = 0;
        $tich = 1;
    }
}

?>
<form method="post">
<table width="728" border="1">
<tr>
<td width="122">&nbsp;</td>
<td width="76">Số bắt đầu</td>
<td width="169">
    <label for="textfield"></label>
    <input type="number" name="so_dau" id="textfield" value="<?php echo isset($_POST['so_dau']) ? htmlspecialchars($_POST['so_dau']) : ''; ?>" />
</td>
<td width="152">Số kết thúc</td>
<td width="175">
    <label for="textfield2"></label>
    <input type="number" name="so_cuoi" id="textfield2" value="<?php echo isset($_POST['so_cuoi']) ? htmlspecialchars($_POST['so_cuoi']) : ''; ?>" />
</td>
</tr>
<?php if (!empty($error)): ?>
<tr>
    <td colspan="5" style="color: red;"><?php echo htmlspecialchars($error); ?></td>
</tr>
<?php endif; ?>
<tr>
<td colspan="5">Kết quả</td>
</tr>
<tr>
<td>Tổng các số</td>
<td colspan="4">
    <label for="textfield4"></label>
    <input type="text" name="tong" id="textfield4" value="<?php echo $tong; ?>" readonly />
</td>
</tr>
<tr>
<td>Tích các số</td>
<td colspan="4">
    <label for="textfield5"></label>
    <input type="text" name="tich" id="textfield5" value="<?php echo ($tich == 1 && isset($_POST['so_dau'])) ? 'Quá lớn' : $tich; ?>" readonly />
</td>
</tr>
<tr>
<td>Tổng các số chẵn</td>
<td colspan="4">
    <label for="textfield6"></label>
    <input type="text" name="tong_chan" id="textfield6" value="<?php echo $tong_chan; ?>" readonly />
</td>
</tr>
<tr>
<td>Tổng các số lẻ</td>
<td colspan="4">
    <label for="textfield7"></label>
    <input type="text" name="tong_le" id="textfield7" value="<?php echo $tong_le; ?>" readonly />
</td>
</tr>
<tr>
<td colspan="5"><input type="submit" name="button" id="button" value="Tính toán" /></td>
</tr>
</table>
</form>
</body>
</html>