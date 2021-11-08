<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp Xếp Mảng</title>
</head>
<?php
function ktso($arr)
{
    foreach($arr as $i)
    {
        if(is_numeric($i) == false) return 0;
    }
    return true;
}
function sxTangDan_bs($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
        {
            if($arr[$i] > $arr[$j])
            {
                $t = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $t;
            }
        }
    return $arr;
}
function sxGiamDan_bs($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
        {
            if($arr[$i] < $arr[$j])
            {
                $t = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $t;
            }
        }
    return $arr;
}
function xuat_mang($arr)
{
    $h = "";
    foreach($arr as $i) $h .= $i." ";
    return $h;
}
if(isset($_POST['submit']))
{
    $DS = $_POST['ds'];
    $arr =  explode(",",$DS);    
    if(ktso($arr))
    {
        $td = xuat_mang(sxTangDan_bs($arr));
        $gd = xuat_mang(sxGiamDan_bs($arr));
    }
    else $td = $gd = "Có phần tử không phải số";
}
?>
<body>
    <form method="POST" action="Bai6.php">
        <center>
            <table bgcolor="#a9d5e5">
                <tr bgcolor="#0a6282">
                    <td colspan = 2><center><h2 style="color:white">SẮP XẾP MẢNG</h2></center></td>
                </tr>
                <tr>
                    <td>Nhập mảng:</td>
                    <td style="color:red"><input size=40px name="ds" type="text" value="<?php if(isset($DS)) echo $DS;?>" required> (*)</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Sắp xếp tăng/giảm">
                    </td>
                </tr>
                <tr bgcolor="#8ed7f2">
                    <td style="color:red">Sau khi sắp xếp:</td>
                    <td></td>
                </tr>
                <tr bgcolor="#8ed7f2">
                    <td>Tăng dần:</td>
                    <td><input size=40px readonly type="tetx" value="<?php if(isset($td)) echo $td;?>"></td>
                </tr>
                <tr bgcolor="#8ed7f2">
                    <td>Giảm dần:</td>
                    <td><input size=40px readonly type="tetx" value="<?php if(isset($gd)) echo $gd;?>"></td>
                </tr>
                <tr>
                    <td colspan=2 style="color:red"><center>(*)<span style="color:black"> Các số được nhập cách nhau bởi dấu ","</span></center></td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>