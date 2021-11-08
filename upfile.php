
<?php

//upload.php

include '/xampp/htdocs/pms/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["select_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'xlsx');
 $file_array = explode(".", $_FILES['select_excel']['name']);
 $file_extension = end($file_array);
 if(in_array($file_extension, $allowed_extension))
 {
  $reader = IOFactory::createReader('Xlsx');
  $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
  $writer = IOFactory::createWriter($spreadsheet, 'Html');
  $message = $writer->save('php://output');
 }
 else
 {
  $message = '<div class="alert alert-danger">Chỉ sử dụng .xls hoặc .xlsx</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Chọn File</div>';
}

echo $message;

?>