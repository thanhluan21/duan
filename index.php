<?php
    session_start();
    $sessionId = isset($_SESSION['id']) ?$_SESSION['id'] :'';
    $sessionRole = isset($_SESSION['role']) ?$_SESSION['role'] :'';
    echo "$sessionId $sessionRole";
    if ( !$sessionId && !$sessionRole ) {
        header( "location:login.php" );
        die();
    }

    ob_start();

    include_once "config.php";
    $connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( !$connection ) {
      //  echo mysqli_error( $connection );
        throw new Exception( "Database cannot Connect" );
    }

    $id = isset($_REQUEST['id']) ? $_REQUEST['id']:'dashboard';
    $action = isset($_REQUEST['action']) ?$_REQUEST['action']: '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">

    <!-- Bootstrap CSS -->
  
    <link rel="stylesheet" href="assets/css/selection.css">
    <link rel="stylesheet" href="assets/css/button.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Quản lý nhân viên</title>
</head>

<body>
    <!--------------------------------- Secondary Navber -------------------------------->
    <section class="topber">
        <div class="topber__title">
            <span class="topber__title--text">
                <?php
                    if ( 'dashboard' == $id ) {
                        echo "Người Quản Trị";
                    } elseif ( 'addManager' == $id ) {
                        echo "Thêm quản lý";
                    } elseif ( 'allManager' == $id ) {
                        echo "Tất cả quản lý";
                    } elseif ( 'addPharmacist' == $id ) {
                        echo "Thêm Dược Sĩ";
                    } elseif ( 'allPharmacist' == $id ) {
                        echo "Tất cả dược sĩ";
                    } elseif ( 'addSalesman' == $id ) {
                        echo "Thêm nhân viên sale";
                    } elseif ( 'allSalesman' == $id ) {
                        echo "Tất cả nhân viên sale";
                    } elseif ( 'userProfile' == $id ) {
                        echo "Hồ sơ của bạn";
                    } elseif ( 'editManager' == $action ) {
                        echo "Chỉnh sữa quản lý";
                    } elseif ( 'editPharmacist' == $action ) {
                        echo "Chỉnh sữa dược sĩ";
                    } elseif ( 'editSalesman' == $action ) {
                        echo "Chỉnh sữa nhân viên sale";
                    }elseif ( 'upfile' == $action ) {
                        echo "Chỉnh sữa nhân viên sale";
                    }
                      


                ?>

            </span>
        </div>
        <div class="topber__profile">
         <div>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto" id="ul" style="background-color:#4e73df ;"> 
          <li id="li">
            <a class="navbar-brand mb-0 h1" href="index.php" style="color:white;">Home</a>
           </li>
          <li id="li">
             <a class="navbar-brand mb-0 h1" href="index.php?id=userProfile" style="color:white;">Trang cá nhân</a>
          </li id="li">
          <li id="li">
             <a class="navbar-brand mb-0 h1" href="#" style="color:white;">Bài Tập</a>
          </li>
    </ul>
         </div>
</nav>
           </div>
            <?php
                $query = "SELECT fname,lname,role,avatar FROM {$sessionRole}s WHERE id='$sessionId'";
                $result = mysqli_query( $connection, $query );

                if ( $data = mysqli_fetch_assoc( $result ) ) {
                    $fname = $data['fname'];
                    $lname = $data['lname'];
                    $role = $data['role'];
                    $avatar = $data['avatar'];
                ?>
                <img src="assets/img/<?php echo "$avatar"; ?>" height="60" width="60" class="rounded-circle" alt="profile">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        echo "$fname $lname ";
                        }
                    ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php">Quản Lý Thuốc</a>
                        <a class="dropdown-item" href="index.php?id=userProfile">Trang cá Nhân</a>
                        <a class="dropdown-item" href="logout.php">Đăng Xuất</a>
                    </div>
                </div>
        </div>
    </section>
    <!--------------------------------- Secondary Navber -------------------------------->


    <!--------------------------------- Sideber -------------------------------->
    <section id="sideber" class="sideber">
        <ul class="sideber__ber">
            <h3 class="sideber__panel"><i id="left" class="fas fa-laugh-wink"></i> Dược Phẩm TDM</h3>
            <li id="left" class="sideber__item<?php if ( 'dashboard' == $id ) {
                                                  echo " active";
                                              }?>">
                <a href="index.php?id=dashboard"><i id="left" class="fas fa-user-shield"></i></i>Quản Lý Nhân Sự</a>
            </li>
            <?php if ( 'admin' == $sessionRole ) {?>
                <!-- Only For Admin -->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addManager' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addManager"><i id="left" class="fas fa-user-plus"></i></i>Thêm quản lý</a>
                    <li id="left" class="sideber__item<?php if ( 'upfile' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=upfile"><i id="left" class="fas fa-user"></i>Upfile Dữ Liệu</a>
            </li>      
                </li><?php }?>

            <li id="left" class="sideber__item<?php if ( 'allManager' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allManager"><i id="left" class="fas fa-user"></i>Tất cả quản lý</a>
            </li>

            






            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                <!-- For Admin, Manager -->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addPharmacist' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addPharmacist"><i id="left" class="fas fa-user-plus"></i></i>Thêm Dược Sĩ</a>
                </li><?php }?>
            <li id="left" class="sideber__item<?php if ( 'allPharmacist' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allPharmacist"><i id="left" class="fas fa-user"></i>Tất cả dược sĩ</a>
            </li>
            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole || 'pharmacist' == $sessionRole ) {?>
                <!-- For Admin, Manager, Pharmacist-->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addSalesman' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addSalesman"><i id="left" class="fas fa-user-plus"></i>Thêm nhân viên sale</a>
                </li><?php }?>
            <li id="left" class="sideber__item<?php if ( 'allSalesman' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allSalesman"><i id="left" class="fas fa-user"></i>Tất cả nhân viên sale</a>
            </li>
       


        <footer class="text-left"><span>TTL</span><br>©2021 Mọi chi tiết liên hệ hotline:01665668701</footer>
    </section>
    <!--------------------------------- #Sideber -------------------------------->


    <!--------------------------------- Main section -------------------------------->
    <section class="main">
        <div class="container">

            <!-- ---------------------- DashBoard ------------------------ -->
            <?php if ( 'dashboard' == $id ) {?>
                <div class="dashboard p-5">
                    <div class="total">
                        <div class="row">
                            
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalManager FROM managers;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalManager = mysqli_fetch_assoc( $result );
                                                echo $totalManager['totalManager'];
                                            ?>
                                    </h1>
                                    <h2>Tất cả quản lý</h2>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalPharmacist FROM pharmacists;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalPharmacist = mysqli_fetch_assoc( $result );
                                                echo $totalPharmacist['totalPharmacist'];
                                            ?>

                                    </h1>
                                    <h2>Tất cả Dược Sĩ</h2>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = "SELECT COUNT(*) totalSalesman FROM salesmans;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['totalSalesman'];
                                            ?></h1>
                                    <h2>Nhân Viên Sale</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php }?>
            <!-- ---------------------- DashBoard ------------------------ -->

            <!-- ---------------------- Manager ------------------------ -->
            <div class="manager">
                <?php 
                
                    
                $aub=mysqli_query($connection,'select count(id) as total from managers');
                $row=mysqli_fetch_assoc($aub);
                $total_records=$row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $getManagers = "SELECT * FROM managers,hocvan where managers.mahocvan=hocvan.id1 LIMIT $start, $limit";
                $result = mysqli_query( $connection, $getManagers );
                if ( 'allManager' == $id  ) 
                {?>
                    <div class="allManager">
                        <div class="main__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Anh Đại Diện</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Học Vị</th>
                                        <th scope="col">SĐT</th>
                                        <?php if ( 'admin' == $sessionRole ) {?>
                                            <!-- Only For Admin -->
                                            <th scope="col">Sữa</th>
                                            <th scope="col">Xóa</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                




                                        while ( $manager = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/<?php echo $manager['avatar']; ?>" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s %s", $manager['fname'], $manager['lname'] );?></td>
                                            <td><?php printf( "%s", $manager['email'] );?></td>
                                            <td><?php printf( "%s", $manager['tenhocvan'] );?></td>
                                            <td><?php printf( "%s",$manager['phone'] );?></td>
                                            <?php if ( 'admin' == $sessionRole ) {?>
                                                <!-- Only For Admin -->
                                                <td><?php printf( "<a href='index.php?action=editManager&id=%s'><i class='fas fa-edit'></i></a>",$manager['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deleteManager&id=%s'><i class='fas fa-trash'></i></a>", $manager['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>
                                      
                                      <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<div id="wrap"><a class="btn" href="index.php?id=allManager&&page='.($current_page-1).'">Trước</a></div> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                 if ($i == $current_page){
                    echo '<div id="wra"><a  class="btc" href="index.php?id=allManager&&page='.$i.'">'.$i.'</a></div> ';
                 }
                 else{
                    echo '<div id="wrap"><a class="btn" href="index.php?id=allManager&&page='.$i.'">'.$i.'</a></div> | ';
                 }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<div id="wrap"><a class="btn" href="index.php?id=allManager&&page='.($current_page+1).'">Tiếp</a></div> | ';
            }
           ?>
        </div>

                                </tbody>
                            </table>

                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addManager' == $id ) {?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">THÊM QUẢN LÝ MỚI</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="Họ" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Tên" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required>
                                                    <option value="">Học Vị</option>
                                                    <option value="1">Đại Học</option>
                                                    <option value="2">Cao Đẳng</option>
                                                    <option value="3">Trung Cấp</option>
                                                    <option value="4">THPT</option>

                                               </select>
                                             
                                            <!-- <input type="text" name="lname" placeholder="Tên" required> -->
                                        </label>
                                    </div>



                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Địa chỉ Email" onblur="checkEmail(this.value)" required>
                                           <label id="maileror"></label>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="SĐT" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Mật Khẩu" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addManager">
                                    <div class="col col-12">
                                        <input type="submit" value="Gửi" id="reg" >
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editManager' == $action ) {
                        $managerId = $_REQUEST['id'];
                        $selectManagers = "SELECT * FROM managers WHERE id='{$managerId}'";
                        $result = mysqli_query( $connection, $selectManagers );

                    $manager = mysqli_fetch_assoc( $result );?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Cập Nhật Thông Tin Quảng Lý</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="Họ" value="<?php echo $manager['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Tên" value="<?php echo $manager['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required>
                                                    <option value="<?php echo $manager['mahocvan']?>"><?php if ($manager['mahocvan']==1)
                                                                                {echo 'Đại Học' ;}
                                                                          if ($manager['mahocvan']==2)
                                                                                 { echo 'Cao Đẳng';}
                                                                          if($manager['mahocvan']==3)
                                                                             { echo 'Trung cấp';}
                                                                           if ($manager['mahocvan']==4)
                                                                               {echo 'THPT';}

                                                    
                                                    ?></option>
                                                   <?php
                                                   if($manager['mahocvan']==1)
                                                   {
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($manager['mahocvan']==2)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($manager['mahocvan']==3)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($manager['mahocvan']==4)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                   }
                                                   
                                                   ?>

                                               </select>
                                             
                                            <!-- <input type="text" name="lname" placeholder="Tên" required> -->
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Địa chỉ Email" value="<?php echo $manager['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="SĐT" value="<?php echo $manager['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="updateManager">
                                    <input type="hidden" name="id" value="<?php echo $managerId;?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Cập Nhật">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteManager' == $action ) {
                        $managerId = $_REQUEST['id'];
                        $deleteManager = "DELETE FROM managers WHERE id ='{$managerId}'";
                        $result = mysqli_query( $connection, $deleteManager );
                        header( "location:index.php?id=allManager" );
                }?>
            </div>
            <!-- ---------------------- Manager ------------------------ -->

            <!-- ---------------------- Pharmacist ------------------------ -->
            <div class="pharmacist">

                <?php
                 $aub=mysqli_query($connection,'select count(id) as total from pharmacists');
                 $row=mysqli_fetch_assoc($aub);
                 $total_records=$row['total'];
                 $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                 $limit = 10;
                 $total_page = ceil($total_records / $limit);
                 if ($current_page > $total_page){
                     $current_page = $total_page;
                 }
                 else if ($current_page < 1){
                     $current_page = 1;
                 }
                 $start = ($current_page - 1) * $limit;
                 $getManagers = "SELECT * FROM pharmacists,hocvan where pharmacists.mahocvan=hocvan.id1  LIMIT $start, $limit";
                 $result = mysqli_query( $connection, $getManagers );
                
                if ( 'allPharmacist' == $id ) {?>
                    <div class="allPharmacist">
                        <div class="main__table">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Anh Đại Diện</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Học Vị</th>
                                        <th scope="col">SĐT</th>
                                        <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                            <!-- For Admin, Manager -->
                                            <th scope="col" >Sữa</th>
                                            <th scope="col">Xóa</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                        

                                        while ( $pharmacist = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/<?php echo $pharmacist['avatar']; ?>" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s %s", $pharmacist['fname'], $pharmacist['lname'] );?></td>
                                            <td><?php printf( "%s", $pharmacist['email'] );?></td>
                                            <td><?php printf( "%s", $pharmacist['tenhocvan'] );?></td>
                                            <td><?php printf( "%s", $pharmacist['phone'] );?></td>
                                            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                                <!-- For Admin, Manager -->
                                                <td><?php printf( "<a href='index.php?action=editPharmacist&id=%s'><i class='fas fa-edit'></i></a>", $pharmacist['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deletePharmacist&id=%s'><i class='fas fa-trash'></i></a>", $pharmacist['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>
                   
                                </tbody>
                                <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<div id="wrap"><a class="btn" href="index.php?id=allPharmacist&&page='.($current_page-1).'">Trước</a></div> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                 if ($i == $current_page){
                    echo '<div id="wra"><a  class="btc" href="index.php?id=allPharmacist&&page='.$i.'">'.$i.'</a></div> ';
                 }
                 else{
                    echo '<div id="wrap"><a class="btn" href="index.php?id=allPharmacist&&page='.$i.'">'.$i.'</a></div> | ';
                 }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<div id="wrap"><a class="btn" href="index.php?id=allPharmacist&&page='.($current_page+1).'">Tiếp</a></div> | ';
            }
           ?>
        </div>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addPharmacist' == $id ) {?>
                    <div class="addPharmacist">
                        <div class="main__form">
                            <div class="main__form--title text-center">THÊM DƯỢC SĨ MỚI</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="Họ" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Tên" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required>
                                                    <option value="">Học Vị</option>
                                                    <option value="1">Đại Học</option>
                                                    <option value="2">Cao Đẳng</option>
                                                    <option value="3">Trung Cấp</option>
                                                    <option value="4">THPT</option>

                                               </select>
                                             
                                            <!-- <input type="text" name="lname" placeholder="Tên" required> -->
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Địa chỉ Email" onblur="checkEmail1(this.value)" required>
                                           <label id="maileror"></label>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="SĐT" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Mật Khẩu" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addPharmacist">
                                    <div class="col col-12">
                                        <input type="submit" value="Gửi">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editPharmacist' == $action ) {
                        $pharmacistID = $_REQUEST['id'];
                        $selectPharmacist = "SELECT * FROM pharmacists WHERE id='{$pharmacistID}'";
                        $result = mysqli_query( $connection, $selectPharmacist );

                    $pharmacist = mysqli_fetch_assoc( $result );?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Pharmacist</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $pharmacist['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $pharmacist['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required>
                                                    <option value="<?php echo $pharmacist['mahocvan']?>"><?php if ($pharmacist['mahocvan']==1)
                                                                                {echo 'Đại Học' ;}
                                                                          if ($pharmacist['mahocvan']==2)
                                                                                 { echo 'Cao Đẳng';}
                                                                          if($pharmacist['mahocvan']==3)
                                                                             { echo 'Trung cấp';}
                                                                           if ($pharmacist['mahocvan']==4)
                                                                               {echo 'THPT';}

                                                    
                                                    ?></option>
                                                   <?php
                                                   if($pharmacist['mahocvan']==1)
                                                   {
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($pharmacist['mahocvan']==2)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($pharmacist['mahocvan']==3)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($pharmacist['mahocvan']==4)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                   }
                                                   
                                                   ?>

                                               </select>
                                             
                                            <!-- <input type="text" name="lname" placeholder="Tên" required> -->
                                        </label>
                                    </div>

                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $pharmacist['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $pharmacist['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="updatePharmacist">
                                    <input type="hidden" name="id" value="<?php echo $pharmacistID; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Cập Nhật">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deletePharmacist' == $action ) {
                        $pharmacistID = $_REQUEST['id'];
                        $deletePharmacist = "DELETE FROM pharmacists WHERE id ='{$pharmacistID}'";
                        $result = mysqli_query( $connection, $deletePharmacist );
                        header( "location:index.php?id=allPharmacist" );
                }?>
            </div>
            <!-- ---------------------- Pharmacist ------------------------ -->

            <!-- ---------------------- Salesman ------------------------ -->
         <div class="salesman">    
                <?php 
                $aub=mysqli_query($connection,'select count(id) as total from salesmans');
                $row=mysqli_fetch_assoc($aub);
                $total_records=$row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $getManagers = "SELECT * FROM salesmans,hocvan where salesmans.mahocvan=hocvan.id1 LIMIT $start, $limit";
                $result = mysqli_query( $connection, $getManagers );
                if ( 'allSalesman' == $id ) {?>
                    <div class="allSalesman">
                        <div class="main__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Anh Đại Diện</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Học Vị</th>
                                        <th scope="col">SĐT</th>
                                        <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole || 'pharmacist' == $sessionRole ) {?>
                                            <!-- For Admin, Manager, Pharmacist-->
                                            <th scope="col">Sữa</th>
                                            <th scope="col">Xóa</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                      

                                        while ( $salesman = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                             <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/<?php echo $salesman['avatar']; ?>" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s %s", $salesman['fname'], $salesman['lname'] );?></td>
                                            <td><?php printf( "%s", $salesman['email'] );?></td>
                                            <td><?php printf( "%s", $salesman['tenhocvan'] );?></td>
                                            <td><?php printf( "%s", $salesman['phone'] );?></td>
                                            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole || 'pharmacist' == $sessionRole ) {?>
                                                <!-- For Admin, Manager, Pharmacist-->
                                                <td><?php printf( "<a href='index.php?action=editSalesman&id=%s'><i class='fas fa-edit'></i></a>", $salesman['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deleteSalesman&id=%s'><i class='fas fa-trash'></i></a>", $salesman['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                                <div class="pagination">
                               <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                   if ($current_page > 1 && $total_page > 1){
                echo '<div id="wrap"><a class="btn" href="index.php?id=allSalesman&&page='.($current_page-1).'">Trước</a></div> | ';
                  }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                 if ($i == $current_page){
                    echo '<div id="wra"><a  class="btc" href="index.php?id=allSalesman&&page='.$i.'">'.$i.'</a></div> ';
                 }
                 else{
                    echo '<div id="wrap"><a class="btn" href="index.php?id=allSalesman&&page='.$i.'">'.$i.'</a></div> | ';
                 }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<div id="wrap"><a class="btn" href="index.php?id=allSalesman&&page='.($current_page+1).'">Tiếp</a></div> | ';
            }
           ?>
        </div>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addSalesman' == $id ) {?>
                    <div class="addSalesman">
                        <div class="main__form">
                            <div class="main__form--title text-center">THÊM NHÂN VIÊN</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="Họ" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Tên" required>
                                        </label>
                                    </div>

                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required>
                                                    <option value="">Học Vị</option>
                                                    <option value="1">Đại Học</option>
                                                    <option value="2">Cao Đẳng</option>
                                                    <option value="3">Trung Cấp</option>
                                                    <option value="4">THPT</option>

                                               </select>
                                             
                                            <!-- <input type="text" name="lname" placeholder="Tên" required> -->
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Địa chỉ Email" onblur="checkEmail2(this.value)" required>
                                           <label id="maileror"></label>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="SĐT" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Mật Khẩu" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addSalesman">
                                    <div class="col col-12">
                                        <input type="submit" value="Gửi">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editSalesman' == $action ) {
                        $salesmanID = $_REQUEST['id'];
                        $selectSalesman = "SELECT * FROM salesmans WHERE id='{$salesmanID}'";
                        $result = mysqli_query( $connection, $selectSalesman );

                    $salesman = mysqli_fetch_assoc( $result );?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Cập Nhật Thông Tin Nhân Viên Sale</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $salesman['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $salesman['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required>
                                                    <option value="<?php echo $salesman['mahocvan']?>"><?php if ($salesman['mahocvan']==1)
                                                                                {echo 'Đại Học' ;}
                                                                          if ($salesman['mahocvan']==2)
                                                                                 { echo 'Cao Đẳng';}
                                                                          if($salesman['mahocvan']==3)
                                                                             { echo 'Trung cấp';}
                                                                           if ($salesman['mahocvan']==4)
                                                                               {echo 'THPT';}

                                                    
                                                    ?></option>
                                                   <?php
                                                   if($salesman['mahocvan']==1)
                                                   {
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($salesman['mahocvan']==2)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($salesman['mahocvan']==3)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                       echo '<option value="4">THPT</option>';
                                                   }
                                                   if($salesman['mahocvan']==4)
                                                   {
                                                       echo '<option value="1">Đại Học</option>';
                                                       echo '<option value="3">Trung Cấp</option>';
                                                       echo '<option value="2">Cao Đẳng</option>';
                                                   }
                                                   
                                                   ?>

                                               </select>
                                             
                                            <!-- <input type="text" name="lname" placeholder="Tên" required> -->
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $salesman['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $salesman['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="updateSalesman">
                        
                                    <input type="hidden" name="id" value="<?php echo $salesmanID; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Cập Nhật">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteSalesman' == $action ) {
                        $salesmanID = $_REQUEST['id'];
                        $deleteSalesman = "DELETE FROM salesmans WHERE id ='{$salesmanID}'";
                        $result = mysqli_query( $connection, $deleteSalesman );
                        header( "location:index.php?id=allSalesman" );
                        ob_end_flush();
                }?>
           
        
            
       
            <!-- ---------------------- Salesman ------------------------ -->

            <!-- ---------------------- User Profile ------------------------ -->
            <?php if ( 'userProfile' == $id ) {
                    $query = "SELECT * FROM {$sessionRole}s WHERE id='$sessionId'";
                    $result = mysqli_query( $connection, $query );
                    $data = mysqli_fetch_assoc( $result )
                ?>
                <div class="userProfile">
                    <div class="main__form myProfile">
                        <form action="index.php">
                            <div class="main__form--title myProfile__title text-center">Hồ sơ của tôi</div>
                            <div class="form-row text-center">
                                <div class="col col-12 text-center pb-3">
                                    <img src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="col col-12">
                                    <h4><b>Full Name : </b><?php printf( "%s %s", $data['fname'], $data['lname'] );?></h4>
                                </div>
                                <div class="col col-12">
                                    <h4><b>Email : </b><?php printf( "%s", $data['email'] );?></h4>
                                </div>
                                <div class="col col-12">
                                    <h4><b>Phone : </b><?php printf( "%s", $data['phone'] );?></h4>
                                </div>
                                <input type="hidden" name="id" value="userProfileEdit">
                                <div class="col col-12">
                                    <input class="updateMyProfile" type="submit" value="Cập Nhật Thông Tin Cá Nhân">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>

            <?php if ( 'userProfileEdit' == $id ) {
                    $query = "SELECT * FROM {$sessionRole}s WHERE id='$sessionId'";
                    $result = mysqli_query( $connection, $query );
                    $data = mysqli_fetch_assoc( $result )
                ?>


                <div class="userProfileEdit">
                    <div class="main__form">
                        <div class="main__form--title text-center">Update My Profile</div>
                        <form enctype="multipart/form-data" action="add.php" method="POST">
                            <div class="form-row">
                                <div class="col col-12 text-center pb-3">
                                    <img id="pimg" src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                    <i class="fas fa-pen pimgedit"></i>
                                    <input onchange="document.getElementById('pimg').src = window.URL.createObjectURL(this.files[0])" id="pimgi" style="display: none;" type="file" name="avatar">
                                </div>
                                <div class="col col-12">
                                <?php if ( isset( $_REQUEST['avatarError'] ) ) {
                                            echo "<p style='color:red;' class='text-center'>Please make sure this file is jpg, png or jpeg</p>";
                                    }?>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-user-circle"></i>
                                        <input type="text" name="fname" placeholder="Họ" value="<?php echo $data['fname']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-user-circle"></i>
                                        <input type="text" name="lname" placeholder="Tên" value="<?php echo $data['lname']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-envelope"></i>
                                        <input type="email" name="email" placeholder="Địa chỉ Email" value="<?php echo $data['email']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-phone-alt"></i>
                                        <input type="number" name="phone" placeholder="SĐT" value="<?php echo $data['phone']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-key"></i>
                                        <input id="pwdinput" type="password" name="oldPassword" placeholder="Mật khẩu cũ" required>
                                        <i id="pwd" class="fas fa-eye right"></i>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-key"></i>
                                        <input id="pwdinput" type="password" name="newPassword" placeholder="Mật khẩu mới" required>
                                        <p>Nhập Mật khẩu Cũ nếu bạn không muốn thay đổi</p>
                                        <i id="pwd" class="fas fa-eye right"></i>
                                    </label>
                                </div>
                                <input type="hidden" name="action" value="updateProfile">
                                <div class="col col-12">
                                    <input type="submit" value="Cập Nhật">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>
            <!-- ---------------------- User Profile ------------------------ -->

        </div>

    </section>

    <!--------------------------------- #Main section -------------------------------->


<script>
    function checkEmail(email){
      
         $.post('checkgmail.php',{'email':email},function(data){
          if(data=='true')
         {
            $("#maileror").text("Email đã được đăng ký hoặc không tồn tại!");
            $("#reg").attr({
                "disabled":''
            });
         }
         else{
            $("#maileror").text("Email hợp lệ!");
            $("#reg").removeAttr("disabled");   
         }
         })       
    
    
    }
    function checkEmail1(email){
      
      $.post('checkgmailps.php',{'email':email},function(data){
       if(data=='true')
      {
         $("#maileror").text("Email đã được đăng ký hoặc không tồn tại!");
         $("#reg").attr({
             "disabled":''
         });
      }
      else{
         $("#maileror").text("Email hợp lệ!");
         $("#reg").removeAttr("disabled");   
      }
      })     
 }
 function checkEmail2(email){
      
      $.post('checkgmailsl.php',{'email':email},function(data){
       if(data=='true')
      {
         $("#maileror").text("Email đã được đăng ký hoặc không tồn tại!");
         $("#reg").attr({
             "disabled":''
         });
      }
      else{
         $("#maileror").text("Email hợp lệ!");
         $("#reg").removeAttr("disabled");   
      }
      })     
        
 
 
 }
 
</script>
<script>
$(document).ready(function(){
  $('#load_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"upfile.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
        $('#excel_area').html(data);
        $('table').css('width','100%');
      }
    })
  });
});
</script>
    <!-- Optional JavaScript -->
  
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/app.js"></script>
</body>

</html>