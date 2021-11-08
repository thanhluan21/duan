<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="baaitap4.css">
    </head>
    <body>
        <?php
        $a=null;
        if(isset($_POST['toan'])&&$_POST['ly']>=0&&$_POST['hoa']>=0&&$_POST['toan']>=0)
        {
            $a=(float)($_POST['toan']+$_POST['ly']+$_POST['hoa']);
            if($a>$_POST['dc'])
            {
                $b='Đậu';
            
            }
            else{
                $b='Rớt';
            }
        }
        else{
            $b='Dữ liệu không hợp lệ';
        }
        ?>
     <table>
         <form action="" method="POST">
             <tr style="background-color: palevioletred;">
                 <th colspan="2"><h2 style="text-align: center;">Kết quả thi đại học</h2></th>
             </tr>
             <tr>
                 <th>
                     Toán:
                 </th>
                 <th>
                     <input type="text" name="toan" required
                     value="<?php  if(isset($_POST['toan'])) echo $_POST['toan'] ?>" >
                 </th>
              </tr>
              <tr>
                 <th>
                     Lý:
                 </th>
                 <th>
                 <input type="text" name="ly" required 
                 value="<?php  if(isset($_POST['toan'])) echo $_POST['ly'] ?>" >
                 </th>
               </tr>

                 <tr>
                 <th>
                     Hóa:
                 </th>
                 <th>
                 <input type="text" name="hoa" required 
                 value="<?php  if(isset($_POST['toan'])) echo $_POST['hoa'] ?>" > 
                 </th>
                 </tr>
                 <tr>
                 <th>
                     Điểm chuẩn:
                 </th>
                 <th>
                     <input type="text" name="dc" required 
                     value="<?php  if(isset($_POST['toan'])) echo $_POST['dc'] ?>" >
                 </th>
                 </tr>
                 <tr>
                 <th>
                     Tổng điểm:
                 </th>
                 <th>
                     <input type="text" name="td" readonly
                     value="<?php  if(isset($_POST['toan'])) echo $a ?>" >
                 </th>
                 </tr>
                 <tr>
                 <th>
                     Kết quả:
                 </th>
                 <th>
                     <input type="text" name="kq" readonly
                     value="<?php  if(isset($_POST['toan'])) echo $b ?>" >
                 </th>
                 </tr>
                 <tr>
                 <th th colspan="2" style="text-align: center;">
                     <input type="submit" value="Kết quả">
                 </th>
                 </tr>
         </form>
     </table>
    </body>
</html>