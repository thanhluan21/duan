<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP and FORM - Bai 6</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <?php

   if (isset($_POST['calculation'])) {
      $pTinh = $_POST['calculation'];
      $first = $_POST['firstNum'];
      $second = $_POST['secondNum'];

      if (!is_numeric($first) || !is_numeric($second)) {
         header("location: nhaplieu.php");
      } else {
         switch ($pTinh) {
            case 1:
               $result = $first + $second;
               break;
            case 2:
               $result = $first - $second;
               break;
            case 3:
               $result = $first * $second;
               break;
            case 4:
               $second == 0 ? header("location: nhaplieu.php") : $result = $first / $second;
               break;
         }
      }
   }

   ?>
   <table>
      <tr>
         <th colspan="2">
            <h3 id="title" style="color:cadetblue">PHÉP TÍNH TRÊN HAI SỐ</h3>
         </th>
      </tr>
      <tr>
         <th id="label1">Chọn phép tính:</th>
         <th align="left">
            <span id="radio">
               <?php 
               
               if(isset($pTinh)){
                  switch($pTinh){
                     case 1: echo "Cộng"; break;
                     case 2: echo "Trừ"; break;
                     case 3: echo "Nhân"; break;
                     case 4: echo "Chia"; break;
                  }
               }

               ?>
            </span>
         </th>
      </tr>
      <tr>
         <th id="label">Số 1:</th>
         <th>
            <input id="in" type="text" value="<?php echo isset($first) ? $first : ''; ?>" readonly>
         </th>
      </tr>
      <tr>
         <th id="label">Số 2:</th>
         <th>
            <input id="in" type="text" value="<?php echo isset($second) ? $second : '' ?>" readonly>
         </th>
      </tr>
      <tr>
         <th id="label">Kết quả:</th>
         <th>
            <input id="in" type="text" value="<?php echo isset($result) ? $result : '' ?>" readonly>
         </th>
      </tr>
      <tr>
         <th></th>
         <th id="back">
            <a href="bai6.php">Trở về trang trước</a>
         </th>
      </tr>
   </table>
</body>

</html>