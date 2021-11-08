<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng Bài 4</title>
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
function timKiem($x,$arr)
{  
    $d=0;
    $kq="";
    for($i =0;$i<count($arr);$i++)
    {
        if($arr[$i] == $x)
        {
            $d++;
            $kq .= $i." ";
        }        
    }
    if($d == 0) return "Không có giá trị ".$x." nào của mảng";
    else return "Tìm thấy giá trị ".$x." tại vị trí thứ ".$kq." của mảng";
}
if(isset($_POST['submit']))
{
    $DS = $_POST['ds'];
    $X = $_POST['x'];
    $arr =  explode(",",$DS);
    if(ktso($arr) == true)
    {
        $kq = $DS;
        if(is_numeric($X))
        {            
            $tk = timKiem($X,$arr);
        }
        else $tk = "Giá trị cần tìm không phải số";
    }
    else $kq = "Có phần tử không phải số trong mảng";
}
?>
<body>
    <form method="POST" action="Bai4.php">
        <center>
            <table bgcolor="#9bc6be">
                <tr bgcolor="#0f8973">
                    <td colspan=2><center><h2 style="color:white">TÌM KIẾM</h2></center></td>
                </tr>
                <tr> 
                    <td>Nhập mảng:</td>
                    <td><input required size=40px name="ds" type="text" value="<?php if(isset($DS)) echo $DS; ?>" ></td>
                </tr>
                <tr>
                    <td>Nhập số cần tìm:</td>
                    <td><input required size=5px name="x" type="text" value="<?php if(isset($X)) echo $X; ?>" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="submit" value="Tìm Kiếm"></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td><input size=40px readonly type="text" value="<?php if(isset($kq)) echo $kq; ?>"></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm:</td>
                    <td><input size=40px readonly type="text" value="<?php if(isset($tk)) echo $tk; ?>"></td>
                </tr>
                <tr bgcolor="#33ceb2">
                    <td colspan=2><center>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</center></td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>
<?php
