<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      <?php

      if (isset($_POST['page'])) {
         switch ($_POST['page']) {
            case '1':
               echo "Trang chủ";
               break;
            case '2':
               echo "Giới thiệu";
               break;
            case '3':
               echo "Tin tức";
               break;
            case '4':
               echo "Liên hệ";
               break;
            case '5':
               echo "Diễn đàn";
               break;
         }
      } else {
         echo "Index";
      }

      ?>
   </title>
   <style>
      .center {
         margin: auto;
         width: 50%;
         padding: 10px;
      }

      .body {
         margin-top: 20px;
      }
   </style>
</head>

<body>
   <div>
      <form action="" method="post">
         <button type="submit" value="1" name="page">Trang Chủ</button>
         <button type="submit" value="2" name="page">Giới Thiệu</button>
         <button type="submit" value="3" name="page">Tin Tức</button>
         <button type="submit" value="4" name="page">Liên hệ</button>
         <button type="submit" value="5" name="page">Diễn Đàn</button>
      </form>
   </div>
   <div class="center body">
      <?php

      if (isset($_POST['page'])) {
         switch ($_POST['page']) {
            case '1':
               include('trangchu.php');
               break;
            case '2':
               include('gioithieu.php');
               break;
            case '3':
               include('tintuc.php');
               break;
            case '4':
               include('lienhe.php');
               break;
            case '5':
               include('diendan.php');
               break;
         }
      }

      ?>
   </div>
</body>

</html>