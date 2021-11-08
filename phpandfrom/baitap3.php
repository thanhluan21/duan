<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="baitap3.css">
    </head>
    <body>
    <?php
    $dongia=20000;
    if(isset($_POST['Tenchuho'])&&$_POST['chisomoi']>$_POST['chisocu'] )
    {
     $tien=($_POST['chisomoi']-$_POST['chisocu'])*$dongia;
    }
    else
    {
        $tien="Chỉ số không hợp lệ";
    }

    ?>
   <table class="bang" style="margin-left: 700px;">
       <form action="" method="POST">
           <tr style="background-color: yellowgreen;">
          
            <th colspan="3"  style="color:blue;" ><h2>Thanh Toán Tiền Điện</h2></th>
           </tr>

           <tr><th>
                 Tên chủ hộ:
             </th>
             <th>
                 <input type="text" name="Tenchuho" required maxlength="40" size="20"
                 value="<?php if(isset($_POST["Tenchuho"])) echo $_POST["Tenchuho"] ?>">
             </th>
           
           </tr>
           <th>
                 Chỉ số cũ:
             </th>
             <th>
                 <input type="text" name="chisocu" required
                 value="<?php if(isset($_POST["Tenchuho"])) echo $_POST["chisocu"] ?>">
             </th>
           <th>(Kwh)</th>
           </tr>

           <tr>
           <th>
                 Chỉ số mới:
             </th>
             <th>
                 <input type="text" name="chisomoi" required
                 value="<?php if(isset($_POST["Tenchuho"])) echo $_POST["chisomoi"] ?>">
             </th>
             <th>(Kwh)</th>
           </tr>

           <tr>
           <th>
                 Đơn giá:
             </th>
             <th>
                 <input type="text" name="dongia" readonly
                 value="<?php echo $dongia ?>">
             </th>
             <th>(VNĐ)</th>
           </tr>

           <tr>
           <th>
                 Tiền thanh toán:
             </th>
             <th>
                 <input type="text" name="Tienthanhtoan" readonly
                  value="<?php if(isset($_POST['Tenchuho'])) echo $tien ?>">
             </th>
             <th>(VNĐ)</th>
         
           </tr>

           <tr>
             <th></th>
             <th> <input type="submit" value="tính"></th>  
         
           </tr>

       </form>
   </table>
    </body>
</html>