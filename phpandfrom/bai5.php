<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP and Form - Bai 5</title>
</head>

<body>
   <?php

   if (isset($_POST['start'])) {
      $t = $_POST['start'];
      $e = $_POST['end'];

      if ($t < 10 || $e > 24 || $e < $t) {
         $cost = "Giờ kết thúc phải > giờ bắt đầu.";
      } else {
         //nếu nằm trong khoảng 10h - 17h
         if ($e < 17) $cost = ($e - $t) * 20000;
         //nếu nằm trong khoảng 17h - 24h
         else if ($t >= 17)  $cost = ($e - $t) * 45000;
         //nếu nằm trong cả hai khoảng thời gian
         else {
            $cost = (17 - $t) * 20000 + ($e - 17) * 45000;
         }
      }
   }

   ?>
   <form name="KARAOKE" action="5_karaoke.php" method="post">
      <table align="center" bgcolor="#00FF00">
         <tr>
            <th colspan="3" bgcolor="Yellow" style="color: Black;">
               <h2>TÍNH TIỀN KARAOKE</h2>
            </th>
         </tr>
         <tr>
            <th>Giờ bắt đầu: </th>
            <th><input type="text" name="start" placeholder="Nhập vào giờ bắt đầu" value="<?php echo isset($t) ? $t : ""; ?>" required></th>
            <th>(h)</th>
         </tr>
         <tr>
            <th>Giờ kết thúc:</th>
            <th>
               <input type="text" name="end" placeholder="Nhập vào giờ kết thúc" value="<?php echo isset($e) ? $e : ""; ?>" required>
            </th>
            <th>(h)</th>
         </tr>
         <tr>
            <th>Tiền thanh toán:</th>
            <th>
               <input type="text" name="cost" value="<?php echo isset($cost) ? $cost : ""; ?>" readonly>
            </th>
            <th>(VNĐ)</th>
         </tr>
         <tr>
            <th colspan="3">
               <input type="submit" value="Tính tiền">
            </th>
         </tr>
      </table>
   </form>
</body>

</html>