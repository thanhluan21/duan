<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng Bài 1</title>
</head>
<body>
    <?php
        function ktsnt($n)
        {
            if($n < 2) return false;
            else 
                {
                    for($i=2; $i<=sqrt($n);$i++) if($n % $i ==0) return false;
                    return true;
                }        
        }        
        function tao_mang($n,&$arr){
            for($i = 0;$i<$n;$i++){
                $arr[$i] = rand(-100,200);
            }
        }
        function demChan($arr)
        {
            $dem =0;
            foreach($arr as $i){
                if($i%2 == 0) $dem++;
            }
            return $dem;
        }
        function demSnt($arr)
        {
            $dem =0;
            foreach($arr as $i){
                if(ktsnt($i)) $dem++;
            }
            return $dem;
        }
        function dembehon100($arr)
        {
            $dem =0;
            foreach($arr as $i){
                if(ktsnt($i)) $dem++;
            }
            return $dem;
        }
        function tongAm($arr)
        {
            $s =0;
            foreach($arr as $i){
                if($i < 0) $s+=$i;
            }
            return $s;
        }
        function vitri0($arr)
        {
            $t = "";
            $d=0;
            for($i=0;$i<count($arr);$i++)
            {
                if($arr[$i] == 0)
                {
                    $d++;
                    $t.= $i." ";
                }                
            }
            if($d == 0) return "Trong mảng không có giá trị 0 nào";
                else return "Các vị trí trong mảng có giá trị 0 gồm: ".$t;
        }
        function sxTangDan(&$arr)
        {
            for($i=0 ; $i<count($arr)-1;$i++)
                for($j= $i+1;$j<count($arr);$j++)
                {
                    if($arr[$i] > $arr[$j])
                    {
                        $tm = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $tm;
                    }
                }
        }
        function xuatMang($arr)
        {
            $t ="";
            foreach($arr as $i) $t.=$i." ";
            return $t;
        }
        if(isset($_POST['submit']))
        {            
            $N = $_POST['n'];
            $arr= [];
            if(is_numeric($N) && $N > 0 && is_int($N + 0))
            {
                tao_mang($N,$arr);
                $kq = "b). Mảng được tạo là:\n" .implode(" ",$arr)."\n";
                $kq .="c). Trong mảng có ".demChan($arr)." số chẵn.\n";
                $kq .="c). Trong mảng có ".demSnt($arr)." số nguyên tố.\n";
                $kq .="d). Trong mảng có ".dembehon100($arr)." số nhỏ hơn 100.\n";
                $kq .="e). Tổng số âm trong mảng là ".tongAm($arr).".\n";
                $kq .="f). ".vitri0($arr).".\n";
                sxTangDan($arr);
                $kq .="g). Mảng sau khi được sắp xếp tăng dần: ".xuatMang($arr).".\n";
            }
            else $kq = $N." không là số nguyên dương!";      
        }
    ?>
  
        <form method="POST" action="Bai1.php">
        
	    	<table bgcolor="yellow" align="center">
                <tr bgcolor="red">
	    			<td style="color:#705b06" colspan="2"><center>Bài 1</center></td>
	    		</tr>
	    		<tr>
	    			<td>Nhập N:</td>
                    <td><input type="text" name="n" value="<?php if(isset($N)) echo $N;?>" required></td>  
	    		</tr>
                <tr>                    
                    <td>Câu b</td>
                    <td><textarea rows='10' cols='100'><?php if(isset($_POST['submit'])) echo $kq; ?></textarea>
                    </td>
                </tr>
	    		<tr>
	    			<td colspan="2" align="center"><input type="submit" name="submit" value="Thực hiện"></td>
	    		</tr>
	    	</table> 
  </form>

</body>
</html>