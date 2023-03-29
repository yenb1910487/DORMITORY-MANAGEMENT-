<?php 
// Load the database configuration file 
// Database configuration 
require_once '../../config/DB.php';
    

// Filter the excel data 
function filterData($str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "dichvu.xls"; 
 
// Column names 
$fields = array('ID', 'Mã dịch vụ', 'Tên dịch vụ', 'Đơn giá'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$sql = "SELECT * FROM dichvu ORDER BY madichvu ASC";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){ 
    // Output each row of the data

    while($row = mysqli_fetch_assoc($res)){ 

        $lineData = array($row['id'], $row['madichvu'], $row['tendichvu'], $row['dongia']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
// header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;