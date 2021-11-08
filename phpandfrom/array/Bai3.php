<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bai3</title>
    <style>
        .box{
            border-width: 2px ;
            border-style:solid;
            border-color: black;
        }
        
    </style>
</head>
<?php
function tao_mang($n,&$arr){
    for($i = 0;$i<$n;$i++){
        $arr[$i] = rand(0,20);
    }
}
function GTLN($arr)
{
    $m=0;
    foreach($arr as $i) if($i > $m) $m = $i;
    return $m;
}
function GTNN($arr)
{
    $m=100;
    foreach($arr as $i) if($i < $m) $m = $i;
    return $m;
}
if(isset($_POST['submit']))
{
    $N = $_POST['n'];
    $arr = [];
    if(is_numeric($N))
    {
        tao_mang($N,$arr);
        $Arr = implode(" ",$arr);
        $tong = array_sum($arr);
        $max = GTLN($arr);
        $min = GTNN($arr);
    }
    else $Arr = $N." không phải sô, vui lòng nhập lại";
}
?>
<body>
    <form method="POST" action="Bai3.php">
        <center>
        <table class="box" bgcolor="#FF00FF">
            <tr bgcolor="#99FF66">
                <td colspan=2><center><h2 style="color:white">PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2></center></td>
            </tr>
            <tr bgcolor="#66FF66">
                <td>Nhập số phần tử:</td>
                <td><input size=30px name="n" type="text" value="<?php if(isset($N)) echo $N; ?>" required ></td>
            </tr>
            <tr bgcolor="#00FF00">
                <td></td>
                <td><input  name="submit" value="Phát sinh và tính toán" type="submit" ></td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td><input readonly size=40px type="text" value="<?php if(isset($_POST['submit'])) echo $Arr; ?>"></td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng:</td>
                <td><input readonly type="text" value="<?php if(isset($max)) echo $max; ?>"></td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng:</td>
                <td><input readonly type="text" value="<?php if(isset($min)) echo $min; ?>"></td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input readonly type="text" value="<?php if(isset($tong)) echo $tong; ?>"></td>
            </tr>
            <tr>
                <td colspan=2><center>(<span style="color:red">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</center></td>
            </tr>
        </table>
        </center>
    </form>
</body>
</html>