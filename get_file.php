<?php
// Make sure an ID was passed
if(isset($_GET['ID'])) {
// Get the ID
    $ID = intval($_GET['ID']);
 
    // Make sure the ID is in fact a valid ID
    if($ID <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'PHP_325');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Fetch the file information
        $query = "
            SELECT `Name`,`Data`
            FROM `job_app_files`
            WHERE `ID` = {$ID}";
        $result = $dbLink->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Disposition: attachment; filename=". $row['Name']);
 
                // Print data
                echo $row['Data'];
            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>