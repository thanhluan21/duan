<?php 

if(!isset($_POST['fullname'])){
   header('Location: form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Config</title>
</head>
<body>
   Bạn đã nhập thành công : <br>
   Họ tên: <?php echo $_POST['fullname'] ?> <br>
   Thông Tin: <?php echo $_POST['address'] ?> <br>
   SĐT: <?php echo is_numeric($_POST['phone']) ? $_POST['phone'] : header('Location: form.php') ?> <br>
   Gioi Tính: <?php echo $_POST['gender'] ?> <br>
   Quốc Gia: <?php echo $_POST['country'] ?> <br>
   Ghi Chú: <?php echo $_POST['note'] ?> <hr>
   <a href="bai8.php">Trở về trang trước</a>
</body>
</html>