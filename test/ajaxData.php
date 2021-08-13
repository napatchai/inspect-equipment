<?php 
// Include the database config file 
include('../condb.php');

if(!empty($_POST["country_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM kind WHERE category_id = ".$_POST['country_id']." "; 
    $result = $conn->query($query); 
    // echo "<script>($query)</script>";
    
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select State</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['kind_id'].'">'.$row['kind_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">State not available</option>'; 
    } 
   
}elseif(!empty($_POST["state_id"])){ 
    
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM description WHERE des_id = ".$_POST['state_id']." "; 
    $result = $conn->query($query); 
    
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select city</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['des_id'].'">'.$row['des_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
} 
?>