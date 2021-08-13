<?php 
// Include the database config file 
include('../condb.php');
// echo "<script>alert('dsa')</script>";
if(!empty($_POST["country_id"]) && empty($_POST["state_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM kind WHERE category_id = ".$_POST['country_id']." "; 
    $result = $conn->query($query); 
    // echo "<script>($query)</script>";
    
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Kind</option>'; 
        while($row = $result->fetch_assoc()){  ?>
            <!-- echo '<option value="'.$row['kind_id'].'">'. $row['kind_id'] .' '.$row['kind_name'].'</option>';  -->
            <option id="<?php echo $row['kind_id'] ?>" value="<?php echo $row['kind_id'] ?>"><?php echo $row['kind_id'] . ' ' . $row['kind_name'] ?></option>
       <?php } 
    }else{ 
        echo '<option value="">Category not available</option>'; 
    } 
   
}elseif(!empty($_POST["state_id"]) && !empty($_POST["country_id"])){ 
    // Fetch city data based on the specific state 
    $category = $_POST["country_id"];
    if(strlen($category) == 1){
        $category1 = '000' . $category;
    }elseif(strlen($category) == 2){
        $category1 = '00' . $category;
    }elseif(strlen($category) == 3){
        $category1 = '0' . $category;
    }elseif(strlen($category) == 4){
        $category1 =  $category;
    }
    $kind = $_POST["state_id"];
    $query = "SELECT * FROM description WHERE category_id = ".$category1." AND kind_id = ".$_POST['state_id']." "; 
    echo "<script>alert($query)</script>";
    $result = $conn->query($query); 
    
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Description</option>'; 
        while($row = $result->fetch_assoc()){  ?>
            <option id="<?php echo $row['des_id'] ?>" value="<?php echo $row['des_id'] ?>"><?php echo $row['des_id'] . ' ' . $row['des_name'] ?></option>
        <?php } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
} 
?>