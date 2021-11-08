<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>2.1</title>
</head>

<body>
   <h3 style="text-transform: uppercase;" align="center"><b>Thông tin Khách hàng</b></h3>
   <table align="center" border="1">
      <tr style="color: red">
         <th>Mã KH</th>
         <th>Tên khách hàng</th>
         <th>Giới tính</th>
         <th>Địa chỉ</th>
         <th>Số điện thoại</th>
      </tr>
      <?php

      require('./config.php');
      $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
      $query = "SELECT * FROM khach_hang";
      $result = $conn->query($query);
      if (!$result) echo "Query failed " . $conn->error;

      $check = true;
      while ($row = $result->fetch_array()) {
         $check ? $color = "yellow" : $color = "";
         // echo "<tr bgcolor='" . $color . "'>";         
         //    echo "<td>" . $row['Ma_khach_hang'] . "</td>";
         //    echo "<td>" . $row['Ten_khach_hang'] . "</td>";
         //    echo "<td align='cenger'>" . $row['Phai'] . "</td>";
         //    echo "<td>" . $row['Dia_chi'] . "</td>";
         //    echo "<td>" . $row['Dien_thoai'] . "</td>";
         // echo "</tr>";
         echo "<tr bgcolor='" . $color . "'>";
         for ($i = 0; $i < $result->field_count - 1; $i++) {
            if ($i == 2) {   
               $img =  !$row[$i] ? '/nam.jpg':'nu.jpg';       
               echo "<td align='center'><img style='height: 50px; witdh: 50px' src='.".$img."'></td>";
            } else {
               echo "<td>" . $row[$i] . "</td>";
            }
         }
         echo "</tr>";         
         $check = !$check;
      }

      ?>
   </table>
</body>

</html>