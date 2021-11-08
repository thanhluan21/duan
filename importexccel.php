<?php
require_once '/xampp/htdocs/pms/vendor/autoload.php';
$conn = mysqli_connect("localhost","root","","pms");
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
if (isset($_POST['submit'])) {
 
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     
    if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
     
        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);
     
        if('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
 
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
 
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
         
        if (!empty($sheetData)) {
            for ($i=1; $i<count($sheetData); $i++) {
                $fname = $sheetData[$i][0];
                $lname = $sheetData[$i][1];
                $email = $sheetData[$i][2];
                $phone = $sheetData[$i][3];
                $pass=$sheetData[$i][4];
                $hashPassword = md5( $pass );
                $hocvan=$sheetData[$i][5];
            
$sql = "INSERT INTO managers(fname,lname,email,phone,password,mahocvan) VALUES ('{$fname}','$lname','$email','$phone','$hashPassword','$hocvan')";

if (mysqli_query($conn, $sql)) {
 echo "New record created successfully";
 header( "location:index.php?id=allManager" );
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 header( "location:index.php?id=allManager" );
}
            }
        }
    }
}
?>