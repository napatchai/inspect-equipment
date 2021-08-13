<?php
$output = '-';
include('../condb.php');
$id = $_POST["id"];
$status = $_POST["status"];
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
 SELECT * FROM durable as d
 INNER JOIN Type as t ON d.type_id = t.type_id
 INNER JOIN unit as u ON d.unit_id = u.unit_id
 INNER JOIN agency as a ON d.agency_id = a.agency_id
 INNER JOIN category as c ON d.category_id = c.category_id
 INNER JOIN money as m ON d.money_id = m.money_id
 WHERE 
 (dura_id LIKE '%".$search."%' 
 OR dura_name LIKE '%".$search."%' 
 OR type_name LIKE '%".$search."%' 
 OR unit_name LIKE '%".$search."%' 
 OR category_name LIKE '%".$search."%' 
 OR kind_id LIKE '%".$search."%' 
 OR code_year LIKE '%".$search."%'  
 OR money_name LIKE '%".$search."%' )
 AND d.agency_id = '$id' AND d.dura_status = $status
 ORDER BY d.dura_id
 ";
}
else
{
 $query = "
 SELECT * FROM durable as d
 INNER JOIN Type as t ON d.type_id = t.type_id
 INNER JOIN unit as u ON d.unit_id = u.unit_id
 INNER JOIN agency as a ON d.agency_id = a.agency_id
 INNER JOIN category as c ON d.category_id = c.category_id
 INNER JOIN money as m ON d.money_id = m.money_id
 WHERE d.agency_id = '$id' AND d.dura_status = $status
 ORDER BY d.dura_id
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered" >
    <tr>
     <th>Durable Articles ID</th>
     <th>Name</th>
     <th>Type Name</th>
     <th style="text-align: center;">Quality</th>
     <th style="text-align: center;">Unit Name</th>
     <th>Category Name</th>
     <th>Kind Name</th>
     <th>Code Year</th>
     <th>Money Name</th>
     <th>Date</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)) 
 { 
     $year = substr($row["dura_year"], -2);
  $output .= '
   <tr>
   
   <td> <a href="report_see_dura.php?id='. $row["dura_id"] .'" style="color: #8E8E8E;text-decoration: none;"> '.$row["dura_id"].'</a></td>
    <td>'.$row["dura_name"].'</td>
    <td>'.$row["type_name"].'</td>
    <td style="text-align: center;">'.$row["dura_qty"].'</td>
    <td style="text-align: center;">'.$row["unit_name"].'</td>
    <td>'.$row["category_name"].'</td>
    <td>'.$row["kind_id"].'</td>
    <td>'.$year.'</td>
    <td>'.$row["money_name"].'</td>
    <td>'.$row["dura_date"].'</td>
   </tr>
  ';
 }
 echo $output;
//  <td> '.$row["dura_id"].'</td>
}
else
{
 echo 'Data Not Found';
}
?>