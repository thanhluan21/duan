<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>2.4</title>
</head>

<body>
   <?php
   require('./config.php');
   $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
   if (!isset($_GET['page'])) {
      $_GET['page'] = 1;
   }
   $rowPerPage = 5;
   $offset = ($_GET['page'] - 1) * $rowPerPage;

   $query = "SELECT * FROM sua, hang_sua, loai_sua LIMIT $offset, $rowPerPage";
   $result = $conn->query($query);
   if (!$result) echo "Query failed " . $conn->error;
   ?>

   <h3 style="text-transform: uppercase;" align="center"><b>Thông tin sữa</b></h3>
   <table align="center" border="1">
      <tr style="color: red">
         <th>Stt</th>
         <th>Tên sữa</th>
         <th>Hãng sữa</th>
         <th>Loại sữa</th>
         <th>Trọng lượng</th>
         <th>Đơn giá</th>
      </tr>
      <?php
      $num = 1;

      $check = true;
      while ($row = $result->fetch_array()) {
         $check ? $color = "Maroon" : $color = "Green";
         echo "<tr bgcolor='" . $color . "'>";
      ?>
         <td>
            <?= $num;
            $num++; ?>
         </td>
         <td><?= $row['Ten_sua'] ?></td>
         <td><?= $row['Ten_hang_sua'] ?></td>
         <td><?= $row['Ten_loai'] ?></td>
         <td><?= $row['Trong_luong'] ?> gram</td>
         <td><?= number_format($row['Don_gia'], 3, ',', '.') . ' VNĐ'; ?></td>
      <?php
         echo "</tr>";
         $check = !$check;
      }

      ?>

   </table>
   <center>
      <?php
      $sua = $conn->query("SELECT * FROM sua");
      $numRow = mysqli_num_rows($sua);
      $numPage = ceil($numRow / $rowPerPage) + 1;
      if ($_GET['page'] > 1) {
         echo  "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "&> << </a>";
      }

      for ($i = 1; $i <= $numPage; $i++) {
         if ($i == $_GET['page']) {
            echo '<b><u>' .$i.' '.'</u></b>';
         } else {
            echo '<a href="bai2.4.php?page=' . $i . '">' . $i .' '. '</a>';
         }
      }
      if ($_GET['page'] < $numPage) {
         echo '<a href="bai2.4.php?page=' . ($_GET['page'] + 1) . '"> >> </a>';
      }
      $conn->close();
      ?>
   </center>
</body>

</html>