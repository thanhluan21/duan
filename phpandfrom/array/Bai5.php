<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng Bài 5</title>
</head>
<?php
function ktso($arr)
{
    foreach($arr as $i)
    {
        if(is_numeric($i) == false) return false;
    }
    return true;
}
function xuat_mang($arr)
{
    $kt="";
    foreach($arr as $i) $kt.= $i." ";
    return $kt;
}
function thayThe(&$arr,$GTCTT,$GTTT)
{
    for($i=0;$i<count($arr);$i++)
    {
        if($arr[$i] == $GTCTT) $arr[$i] = $GTTT;
    }
}
function ktGTCTT($arr,$GTCTT)
{
    for($i=0;$i<count($arr);$i++)
    {
        if($arr[$i] == $GTCTT) return true;
    }
    return false;
}
if(isset($_POST['submit']))
{
    $DS = $_POST['ds'];
    $arr =  explode(",",$DS);
    $GTCTT = $_POST['gtctt'];
    $GTTT = $_POST['gttt'];
    if(ktso($arr) == true)
    {
        if(is_numeric($GTCTT) && is_numeric($GTTT))
        {
            if(ktGTCTT($arr,$GTCTT))
            {
                $mc=xuat_mang($arr);
                thayThe($arr,$GTCTT,$GTTT);
                $mm = xuat_mang($arr);
            }
            else
            {
                $mc = xuat_mang($arr);
                $mm = "Không có giá trị ".$GTCTT." trong mảng";                
            }
           
        }
        else $mc = "Giá trị cần thay hoặc giá trị thay không phải số";
    }
    else $mc = "Có phần tử không phải số trong mảng";

}
?>
<body>
    <form method="POST" action="Bai5.php">
        <center>
            <table >
                <tr bgcolor="#840b46">
                    <td colspan = 2><center><h2 style="color:white" >THAY THẾ</h2></center></td>
                </tr>
                <tr bgcolor="#ed8bba">
                    <td>Nhập các phần tử:</td>
                    <td><input size=40px  required name="ds" type="text" value="<?php if(isset($DS)) echo $DS; ?>" ></td>
                </tr>
                <tr bgcolor="#ed8bba">
                    <td>Giá trị cần thay thế:</td>
                    <td><input size=20px required name="gtctt" type="text" value="<?php if(isset($GTCTT)) echo $GTCTT; ?>" ></td>
                </tr>
                <tr bgcolor="#ed8bba">
                    <td>Giá trị thay thế:</td>
                    <td><input size=20px required name="gttt" type="text" value="<?php if(isset($GTTT)) echo $GTTT; ?>" ></td>
                </tr>
                <tr bgcolor="#ed8bba">
                    <td></td>
                    <td><input name="submit" value="Thay Thế" type="submit"></td>
                </tr>
                <tr bgcolor="#efd5e2">
                    <td>Mảng cũ:</td>
                    <td><input size=40px readonly type="text" value="<?php if(isset($mc)) echo $mc; ?>" ></td>
                </tr>
                <tr bgcolor="#efd5e2">
                    <td>Mảng sau khi thay thế:</td>
                    <td><input size=40px readonly type="text" value="<?php if(isset($mm)) echo $mm; ?>" ></td>
                </tr>
                <tr bgcolor="#efd5e2">
                    <td colspan = 2><center>(<span style="color:red" >Ghi Chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</center></td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>