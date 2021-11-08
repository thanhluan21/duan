<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng Bài 7</title>
</head>
<?php
if(isset($_POST['submit']))
{

    $nam = $_POST['dl'];
    $mang_can = array("Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỷ","Canh","Tân","Nhâm");
    $mang_chi = array("Hợi","Tý","Sửu","Dần","Mão","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất");
    $mang_hinh = array("hoi.jpg","ty.jpg","suu.jpg","dan.jpg","mao.jpg","thin.jpg","ran.jpg","ngo.jpg","mui.jpg","than.jpg","dau.jpg","tuat.jpg");
    if(is_numeric($nam))
    {
        $nam = $nam - 3;
        $can = $nam % 10;
        $chi = $nam % 12;
        $al = $mang_can[$can];
        $al .= " ".$mang_chi[$chi];
        $h = $mang_hinh[$chi];
    }
    else
    {
        $al = "Năm dương lịch không hợp lệ";
        $h = "fail.jpg";
    }
}
?>
<body>
    <form method="POST" action="Bai7.php">
        <center>
            <table bgcolor="#66CC33">
                <tr bgcolor="#33CC66">
                    <td colspan = 3><center><h2 style="color:white">TÍNH NĂM ÂM LỊCH</h2></center></td>
                </tr>
                <tr>
                    <td><center>Năm dương lịch</center></td>
                    <td></td>
                    <td><center>Năm âm lịch</center></td>
                </tr>
                <tr>
                    <td><input size=20px required name="dl" type="text" value="<?php if(isset($_POST['dl'])) echo $_POST['dl']; ?>"></td>
                    <td><center><input name="submit" type="submit" value="=>"></center></td>
                    <td><input size=25px readonly type="text" value="<?php if(isset($al)) echo $al; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php if(isset($h)) echo '<img src="HinhB7/'.$h.'">';?></td>
                    <td></td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>