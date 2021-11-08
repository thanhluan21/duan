<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>2.1</title>
</head>

<body>
   <h3 style="text-transform: uppercase; color: blue" align="center">Thông tin hãng sữa</h3>
   <table align="center" border="1">
      <tr>
         <th>Mã HS</th>
         <th>Tên hãng sữa</th>
         <th>Địa chỉ</th>
         <th>Điện thoại</th>
         <th>Email</th>
      </tr>
      <?php

      require('./config.php');
      $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
      $query = "SELECT * FROM hang_sua";
      $result = $conn->query($query);
      if (!$result) echo "Query failed " . $conn->error;

      while ($row = $result->fetch_array()){
         echo "<tr>";
            for($i = 0; $i < $result->field_count; $i++)
               echo "<td>".$row[$i]."</td>";
         echo "</tr>";
      }

      ?>
   </table>
</body>

</html>