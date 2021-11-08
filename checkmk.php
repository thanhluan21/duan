<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
  $loi="";
  $ma="";
  include('../pms/senmail.php');
   if(isset($_POST['submit'])==true)
   {
     $vaitroi='';
     if(($_POST['one'])==1)
           $vaitroi='managers';
     if(($_POST['one'])==2)
           $vaitroi='pharmacists';
      if(($_POST['one'])==3)
           $vaitroi='salesmans';       

               


       $email=$_POST['email'];
      $connection = new PDO( "mysql:host=localhost;dbname=pms;charset=utf8","root", "" );
      $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       if ( !$connection ) {
  //  echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
        }
        $sql="SELECT * FROM $vaitroi where email=?";
      $stmt=  $connection->prepare($sql);
      $stmt->execute([$email]);
      $count=$stmt->rowCount();
    
      if($count==0)
      {
          $loi="Email bạn chưa đăng ký ";
      }
      else{

         $ma=substr(md5(rand(0,999999)),0,8);
         $matkhaumoi=md5($ma);
         $update="UPDATE $vaitroi SET password=? Where email=?";
         $stmt=$connection->prepare($update);
         $stmt->execute([$matkhaumoi,$email]);
         sendMail($email,$ma);
         header( "location:checkmk.php" );
         
      }

    }


?>


</script>

<form method="post" style="width:600px;" class="border border-primary border-2 m-auto p-2">
   <h4 class="mb-3 text-center">
       Quên Mật Khẩu
   </h4>
   <?php if($loi!="") { ?>
    <div class="alert alert-danger"><?=$loi?></div>
    <?php  }?>
  <div class="mb-3">
    <label for="email" class="form-label">Nhập Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)==true) echo $email ?>">
    <select name="one" class="dropdown-select" required>
                                                    <option value="">Chọn vai trò</option>
                                                    <option value="1">Quản lý</option>
                                                    <option value="2">Dược sĩ</option>
                                                    <option value="3">Nhân viên sale</option>

                                               </select>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Gửi Nút Yêu Cầu</button>
  <h3>Chú ý:Sau khi gửi yêu cầu,mật khẩu mới sẽ được gửi vào gmail.</h3>
 <a href="login.php">Quay về trang đăng nhập</a>
</form>

