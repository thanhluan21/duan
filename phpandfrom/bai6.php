<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP and FORM - Bai 6</title>
   <link rel="stylesheet" href="bai6.css">
</head>
<body>
   <form name="calculator" action="./result.php" method="post">
      <table>
         <tr>
            <th colspan="2">
               <h3 id="title">PHÉP TÍNH TRÊN HAI SỐ</h3>
            </th>
         </tr>
         <tr>
            <th id="label1">Chọn phép tính:</th>
            <th >
               <input type="radio" name="calculation" value="1" checked="checked"> <span id="radio">Cộng</span>
               <input type="radio" name="calculation" value="2"> <span id="radio">Trừ</span>
               <input type="radio" name="calculation" value="3"> <span id="radio">Nhân</span>
               <input type="radio" name="calculation" value="4"> <span id="radio">Chia</span>
            </th>
         </tr>
         <tr>
            <th id="label">Số thứ nhất:</th>
            <th>
               <input id="in" type="text" name="firstNum" required>
            </th>
         </tr>
         <tr>
            <th id="label">Số thứ hai:</th>
            <th>
               <input id="in" type="text" name="secondNum"  required>
            </th>
         </tr>
         <tr>
            <th></th>
            <th>
               <input id="submit" type="submit" value="Tính">
            </th>
         </tr>
      </table>
   </form>
</body>
</html>