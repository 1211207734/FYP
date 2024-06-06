<?php 
// Include the database configuration file
include 'database.php';
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

// filename for download
$filename = "Sales_Report" . date('Ymd') . ".xls";
$fields = array('NO','Category', 'Sales', 'Costs', 'Net Profit', 'Profit(%)'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$rer="SELECT categories.Category_name, 
                format(SUM((Product_quantity-Product_stock)*Product_price),2)AS'Sales',
                format(SUM(Product_quantity*Product_netprice),2)AS'Costs',
                format(SUM((Product_quantity-Product_stock)*Product_price) - SUM(Product_quantity*Product_netprice),2)AS'Net Profit',
                format(SUM((Product_quantity-Product_stock)*Product_price)/SUM(Product_quantity*Product_netprice)*100,2)AS'Profit' 
                FROM products,categories WHERE products.Category_ID=categories.Category_ID 
                GROUP BY products.Category_ID";

                $query = mysqli_query($connect, $rer);
                $i=0;  
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $i++; 
        $lineData = array($i,$row['Category_name'],$row['Sales'], $row['Costs'], $row['Net Profit'], $row['Profit']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$filename\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>