
<!-- saved from url=(0045)http://localhost/doan/index.php?id=addManager -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>2 admin




    
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



    <!--------------------------------- Secondary Navber -------------------------------->
    <section class="topber">
        <div class="topber__title">
            <span class="topber__title--text">
                Thêm quản lý
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
            <a class="navbar-brand mb-0 h1" href="http://localhost/doan/index.php" style="color:white;">Home</a>
           </li>
          <li id="li">
             <a class="navbar-brand mb-0 h1" href="http://localhost/doan/index.php?id=userProfile" style="color:white;">Trang cá nhân</a>
          </li>
          <li id="li">
             <a class="navbar-brand mb-0 h1" href="http://localhost/doan/index.php?id=addManager#" style="color:white;">Bài Tập</a>
          </li>
    </ul>
         </div>
</nav>
           </div>
                            <img src="./Quản lý nhân viên_files/_114253856_messi.jpg" height="60" width="60" class="rounded-circle" alt="profile">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thành Luân                     </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="http://localhost/doan/index.php">Quản Lý Thuốc</a>
                        <a class="dropdown-item" href="http://localhost/doan/index.php?id=userProfile">Trang cá Nhân</a>
                        <a class="dropdown-item" href="http://localhost/doan/logout.php">Đăng Xuất</a>
                    </div>
                </div>
        </div>
    </section>
    <!--------------------------------- Secondary Navber -------------------------------->


    <!--------------------------------- Sideber -------------------------------->
    <section id="sideber" class="sideber">
        <ul class="sideber__ber">
            <h3 class="sideber__panel"><i id="left" class="fas fa-laugh-wink"></i> Dược Phẩm TDM</h3>
            <li id="left" class="sideber__item">
                <a href="http://localhost/doan/index.php?id=dashboard"><i id="left" class="fas fa-user-shield"></i>Quản Lý Nhân Sự</a>
            </li>
                            <!-- Only For Admin -->
                <li id="left" class="sideber__item sideber__item--modify active">
                    <a href="http://localhost/doan/index.php?id=addManager"><i id="left" class="fas fa-user-plus"></i>Thêm quản lý</a>
                </li>            <li id="left" class="sideber__item">
                <a href="http://localhost/doan/index.php?id=allManager"><i id="left" class="fas fa-user"></i>Tất cả quản lý</a>
            </li>
                            <!-- For Admin, Manager -->
                <li id="left" class="sideber__item sideber__item--modify">
                    <a href="http://localhost/doan/index.php?id=addPharmacist"><i id="left" class="fas fa-user-plus"></i>Thêm Dược Sĩ</a>
                </li>            <li id="left" class="sideber__item">
                <a href="http://localhost/doan/index.php?id=allPharmacist"><i id="left" class="fas fa-user"></i>Tất cả dược sĩ</a>
            </li>
                            <!-- For Admin, Manager, Pharmacist-->
                <li id="left" class="sideber__item sideber__item--modify">
                    <a href="http://localhost/doan/index.php?id=addSalesman"><i id="left" class="fas fa-user-plus"></i>Thêm nhân viên sale</a>
                </li>            <li id="left" class="sideber__item">
                <a href="http://localhost/doan/index.php?id=allSalesman"><i id="left" class="fas fa-user"></i>Tất cả nhân viên sale</a>
            </li>
       


        <li id="left" class="sideber__item">
                <a href="http://localhost/doan/index.php?id=upfile"><i id="left" class="fas fa-user"></i>Upfile Dữ Liệu</a>
            </li>
        </ul>

        <footer class="text-left"><span>TTL</span><br>©2021 Mọi chi tiết liên hệ hotline:01665668701</footer>
    </section>
    <!--------------------------------- #Sideber -------------------------------->


    <!--------------------------------- Main section -------------------------------->
    <section class="main">
        <div class="container">

            <!-- ---------------------- DashBoard ------------------------ -->
                        <!-- ---------------------- DashBoard ------------------------ -->

            <!-- ---------------------- Manager ------------------------ -->
            <div class="manager">
                
                                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">THÊM QUẢN LÝ MỚI</div>
                            <form action="http://localhost/doan/add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="Họ" required="">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Tên" required="">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-graduate"></i>
                                               <select name="one" class="dropdown-select" required="">
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
                                            <input type="email" name="email" placeholder="Địa chỉ Email" onblur="checkEmail(this.value)" required="">
                                           <label id="maileror"></label>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="SĐT" required="">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Mật Khẩu" required="">
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addManager">
                                    <div class="col col-12">
                                        <input type="submit" value="Gửi" id="reg">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                
                
                            </div>
            <!-- ---------------------- Manager ------------------------ -->

            <!-- ---------------------- Pharmacist ------------------------ -->
            <div class="pharmacist">

                
                
                
                            </div>
            <!-- ---------------------- Pharmacist ------------------------ -->

            <!-- ---------------------- Salesman ------------------------ -->
         <div class="salesman">    
                
                
                
                           
           
            



            
       
            <!-- ---------------------- Salesman ------------------------ -->

            <!-- ---------------------- User Profile ------------------------ -->
            
                        <!-- ---------------------- User Profile ------------------------ -->

        </div>

    </div></section>

    <!--------------------------------- #Main section -------------------------------->


<!-- <script>
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
</script> -->
    <!-- Optional JavaScript -->
  
    <script src="./Quản lý nhân viên_files/jquery-3.5.1.slim.min.js.tải xuống"></script>
    <script src="./Quản lý nhân viên_files/popper.min.js.tải xuống"></script>
    <script src="./Quản lý nhân viên_files/jquery-3.6.0.min.js.tải xuống"></script>
    <script src="./Quản lý nhân viên_files/jquery.min.js.tải xuống"></script>
<script src="./Quản lý nhân viên_files/bootstrap.min.js.tải xuống" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="./Quản lý nhân viên_files/bootstrap.min.js(1).tải xuống"></script>
    <!-- Custom Js -->
    <script src="./Quản lý nhân viên_files/app.js.tải xuống"></script>


</body></html>