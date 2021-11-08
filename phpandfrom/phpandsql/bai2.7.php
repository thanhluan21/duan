<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        img {
            width: 100px;
            height: 100px;
            margin-left: auto;
        }

        h1{
            color: #ff5200;
            font-weight: bold;
            border: 1px solid black;
            background: #ff760033;
            position: relative;
            top: 8px;
            padding: 10px;
        }

        .col-md-2{
            text-align: center;
            border: 1px solid;
        }
    </style>
</head>
<body>
    <?php
        include 'config.php';
        $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
        $query = 'SELECT * FROM sua a, hang_sua b, loai_sua c WHERE a.Ma_loai_sua = c.Ma_loai_sua AND a.Ma_hang_sua = b.Ma_hang_sua';
        $result = $conn->query($query);

        if(!$result) echo 'Cau truy van bi sai';
    ?>

    <div class="container">
        <div class="row">
            <h1 class="text-center">THÔNG TIN CÁC SẢN PHẨM</h1>
            <?php 
                if($result->num_rows != 0){
                    while($row = $result->fetch_array()){
                        $masp = $row['Ma_sua'];
                        echo "<div class='col-md-2'>";
                            echo "<a href='details_sp.php?masp=$masp'>"."<b>".$row['Ten_sua']."</b>"."</a>";
                            echo "<br><span>".$row['Trong_luong'].'gr '.' - '."</span>";
                            echo "<span>".$row['Don_gia'].' VNĐ '."</span>";
                            echo '<br><img src="sua.jpg"/>';
                        echo "</div>";
                    }
                }
                $conn->close();
            ?>
        </div>
    </div>
</body>
</html>