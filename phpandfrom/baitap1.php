<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="baitap1.css">
    </head>
    <body>
     <?php
     if(isset($_POST['dai']))
   {  $_chieudai=$_POST['dai'];
      $_chieurong=$_POST['rong'];
     if( $_chieudai>$_chieurong&& $_chieudai>0&& $_chieurong>0)
         { $chuvi=($_chieudai+$_chieurong)*2;
            $dientich=$_chieudai* $_chieurong;
        }
      else{
          $chuvi="Nhập lại chiều dài và rộng";
          $dientich="Nhập lại chiều dài và rộng";
    
            }
    }
            
     ?>
      <table class="bang" style="margin-left: 700px;">
          <form action="baitap1.php" method= "post">
            <tr style="background-color: orange; height:20px">
              <th colspan="2"> <h1>Tính toán hình chữ nhật</th>
            </tr>
              <tr>
                  <th style="text-align: right;">
                      Mời bạn nhập chiều rộng:
                  </th>
                  <th><input type="text" name="rong" required
                  value="<?php if(isset($_POST['rong'])) echo $_chieurong ?>"></th>
              </tr>
              <tr>
                  <th style="text-align: right;">
                      Mời bạn nhập chiều dài:
                  </th>
                  <th><input type="text" name="dai" required
                  value="<?php if(isset($_POST['dai'])) echo $_chieudai ?>"></th>
              </tr>
              <tr>
                  <th style="text-align: right;">
                      Kết quả chu vi là:
                  </th>
                  <th><input type="text" name="kq" readonly
                  value="<?php if(isset($_POST['dai'])) echo $chuvi ?>"></th>
              </tr>
              <tr>
                  <th style="text-align: right;">
                      Kết quả diện tích là:
                  </th>
                  <th><input type="text" name="kqdientich" readonly 
                  value="<?php if(isset($_POST['rong'])) echo $dientich ?>"></th>
              </tr>
              <tr>
                  <th></th>
                  <th><input type="submit" name="add_post" value="Tính" style="margin-right: 10px;"></th>
              </tr>
          </form>
      </table>
    </body>
</html>