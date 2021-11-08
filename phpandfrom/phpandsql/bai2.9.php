<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container {
            background-color: #ede9e5;
        }

        img {
            width: 100px;
            height: 100px;
            margin-left: auto;
        }

        table,tr,td,th{
            border: 2px solid red;
            text-align: justify;
        }

        th{
            background-color: #d69a6733;
        }

        input{
            height: 40px;
        }

        h2,h3{
            color: #ff5200;
            font-weight: bold;
            text-align: center;
        }

        h2{
            color: #d22454a8;
        }

        h2, .main{
            background: lightpink;
            padding: 10px;
        }

        .main{
            height: 64px;
        }

        button{
            height: 40px;
        }
    </style>
</head>
<body>
    <?php
        include 'config.php';
            $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
        $query = "SELECT * FROM sua";
        $result = $conn->query($query);

        if(!$result) echo 'Cau truy van bi sai';

        if(isset($_POST['submit'])){
            $key = $_POST['key'];

            $query = "SELECT * FROM sua WHERE Ten_sua LIKE '%$key%'";
            $result = $conn->query($query);

            if(!$result) echo 'Cau truy van bi sai';
            $num = $result->num_rows;
            if($num != 0)
                $thongbao = 'Có '.$num.' được tìm thấy!';
            else 
                $thongbao = 'Không tìm thấy sản phẩm này';
        }

    ?>

    <div class="container col-md-8">
        <div class="row">
            <h2>TÌM KIẾM THÔNG TIN SỮA</h2>
            <form method="post" action class="col-md-12 main" style="display: flex; justify-content: center;">
                <h5 class="mt-2 fw-bold" style="color:red;" width="100px">Tên sữa:</h5>
                <input type="text" name="key" class="mb-4 mx-2"
                    value="<?php if(isset($key)) echo $key;?>"placeholder="Search">
                <button width="100px" type="submit" class="btn btn-danger" name="submit">Tìm kiếm</button>
            </form>
        </div>
        <center class="mt-2"><b><?php if (isset($thongbao)) echo $thongbao; ?></b></center>
        <div class="col-md-12 mt-4">
            <table align="center" border="1" cellspacing="0" width="600px">
                <?php
                    if($result->num_rows != 0) {
                        while($row = $result->fetch_array()) { ?>
                            <?php 
                                $hinh = $row['Hinh']; 
                                $thongbao = $result->num_rows;
                            ?>
                            <tr>
                                <th colspan="2">
                                    <h3 class="text-center"><?= $row['Ten_sua']; ?></h3>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <img src="sua.jpg" alt="">
                                </td>
                                <td>
                                    <p><b>Thành phần dinh dưỡng:</b></p>
                                    <p><?= $row['TP_Dinh_Duong'] ?></p>
                                    <p><b>Lợi ích:</b></p>
                                    <p><?= $row['Loi_ich'] ?></p>
                                    <span class="text-right"> 
                                        <b>Trọng lương: </b><?= $row['Trong_luong'].' gr'; ?> -
                                        <b>Đơn giá: </b><?= $row['Don_gia'].' VNĐ'; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php } 
                    }
                ?> 
            </table>
        </div>
    </div>
</body>
</html>