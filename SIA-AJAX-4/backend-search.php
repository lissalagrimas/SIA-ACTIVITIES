<?php
// Include config file
require_once "config.php";

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM countries WHERE name LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["name"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>