<?php

//upload.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["select_excel"]["name"] != '')
{
 $allowed_extension = array('csv');
 $file_array = explode(".", $_FILES['select_excel']['name']);
 $file_extension = end($file_array);


/**  Identify the type of $inputFileName  **/
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['select_excel']['tmp_name']);


 if($inputFileType)
 {
  $reader = IOFactory::createReader($inputFileType);
  $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
  $writer = IOFactory::createWriter($spreadsheet, 'Html');
  $message = $writer->save('php://output');
 }
 else
 {
  $message = '<div class="alert alert-danger">Only .csv file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
