<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="baitap1.css">
    </head>
    <body>
        <?php
        $pi=3.14;
        if(isset($_POST['bankinh'])&&$_POST['bankinh']>0)
        {  
            $bk=$_POST['bankinh'];
           $dientich=(float)$pi*$bk*$bk;
           $chuvi=(float)2*$pi*$bk;
        }
        else
        {
            $dientich="nhập lại bán kính";
            $chuvi="nhập lại bán kính";  
        }
        ?>
    <table class="bang">
        <form action="" method="POST">
         <tr class="a" style="background-color: orange; height: 20px;">
          <th style="color: red;" colspan="2"><h2>Tính chu vi và diện tính hình tròn</h2></th>
         </tr>
         <tr>
           <th>
               Nhập bán kính:
           </th>
           <th>
               <input type="text" name="bankinh"
               value="<?php if(isset($_POST['bankinh'])) echo $bk ?>">
           </th>
         </tr>
         <tr>
         <th>
              Chu vi:
           </th>
           <th>
               <input type="text" name="chu vi" readonly
               value="<?php if(isset($_POST['bankinh'])) echo $chuvi ?>">
           </th>
        </tr>
        <tr>
        <th>
               Diện tích:
           </th>
           <th>
               <input type="text" name="Diện tích" readonly
               value="<?php if(isset($_POST['bankinh'])) echo $dientich ?>">
           </th>
        </tr>
        <tr>
          <th></th>
          <th>
              <input type="submit" value="Tính">
          </th>
        </tr>
        </form>
    </table>

    </body>
</html>