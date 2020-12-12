<?php
	if(isset($_POST["tinhtoan"])) 
	{
        $a = $_POST["a"];
        $b = $_POST["b"];
        $pheptinh = $_POST['phep-tinh'];
        if(empty($a) || !is_numeric($a) || empty($b) || !is_numeric($b) || empty($pheptinh))
        {
            if(empty($a) || !is_numeric($a)) 
            {
                $err_a = "Không được để trống và phải nhập số";
            } 
            if(empty($b) || !is_numeric($b)) 
            {
                $err_b = "Không được để trống và phải nhập số";
            } 
            if(empty($pheptinh)) {
                $err_pt = "Phải chọn phép tính";
            }
        } 		
		else 
		{	
            switch($pheptinh) 
            {
                case "cong":
                    $kq = $a + $b;
                    break;
                case "tru":
                    $kq = $a - $b;
                    break;
                case "nhan":
                    $kq = $a * $b;
                    break;
                case "chia":
                    $kq = $a / $b;
                    break;
                default:
                    $kq = "Phép tính không hợp lệ";
            }
		}
	}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Máy tính cá nhân</title>
</head>
<body>
	<form method="POST" action="tinhtoan.php">
		<table border="1" cellpadding="10">
			<caption style="background-color: green; padding: 5px 0; color: #fff;">Máy tính cá nhân đơn giản</caption>
			<tr>
				<td>Nhập số thứ nhất:</td>
				<td>
					<input type="text" name="a" value="<?php echo isset($_POST["a"]) ? $a : ""; ?>">
					<div style="color: red;"><?php echo isset($err_a) ? $err_a : ""; ?></div>
				</td>
			</tr>
            <tr>
				<td>Nhập số thứ nhất:</td>
				<td>
					<input type="text" name="b" value="<?php echo isset($_POST["b"]) ? $b : ""; ?>">
					<div style="color: red;"><?php echo isset($err_b) ? $err_b : ""; ?></div>
				</td>
			</tr>
            <tr>
				<td>Phép tính:</td>
				<td>
					<input type="radio" name="phep-tinh" value="cong" <?php echo $_POST["phep-tinh"] == "cong" ? "checked" : ""; ?>> Cộng
					<input type="radio" name="phep-tinh" value="tru" <?php echo $_POST["phep-tinh"] == "tru" ? "checked" : ""; ?>> Trừ
					<input type="radio" name="phep-tinh" value="nhan" <?php echo $_POST["phep-tinh"] == "nhan" ? "checked" : ""; ?>> Nhân
					<input type="radio" name="phep-tinh" value="chia" <?php echo $_POST["phep-tinh"] == "chia" ? "checked" : ""; ?>> Chia		
                    <div style="color: red;"><?php echo isset($err_pt) ? $err_pt : ""; ?></div>			
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="tinhtoan" value="Tính toán"></td>
				<td><input type="text" disabled name="kq" value="<?php echo isset($kq) ? $kq : ""; ?>"></td>
			</tr>
		</table>
	</form>
</body>
</html>
