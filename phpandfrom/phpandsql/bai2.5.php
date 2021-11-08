<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <style>
        img {
            width: 100px;
            height: 100px;
        }

        table,th,tr,td{
            border: 1px solid gray;
        }

        img{
            margin-left: 40px;
        }

        h1{
            color: #ff5200;
            font-weight: bold;
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
    <table cellspacing="0" cellpadding="4" align="center" cellpadding="4" width="500px">
        <tr>
            <th colspan="2" bgcolor="#f9decb">
                <h1>THÔNG TIN CÁC SẢN PHẨM</h1>
            </th>
        </tr>
        <?php
            if($result->num_rows != 0){
                while($row = $result->fetch_array()){
                    echo "<tr>";
                        echo "<td width='180px'>";
                            echo '<img src="sua.jpg"/>';
                        echo "</td>";
                        echo "<td>";
                            echo "<p><b>".$row['Ten_sua']."</b></p>";
                            echo "<p>".'Nhà sản xuất: '.$row['Ten_hang_sua']."</p>";
                            echo "<span>".$row['Ten_loai'].' - '."</span>";
                            echo "<span>".$row['Trong_luong'].'gr '.' - '."</span>";
                            echo "<span>".$row['Don_gia'].'VNĐ '."</span>";
                        echo "</td";
                    echo "</tr>";
                }
            }
        ?>
        <tr>
            <td>
                <img src="" alt="">
            </td>
            <td>
                <p></p>
            </td>
        </tr>
    </table>
    <?php $conn->close(); ?>
</body>
</html>