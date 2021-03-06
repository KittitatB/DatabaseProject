<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
//$Client = $address = $Status = "";
//$Client_err = $address_err = $Status_err = "";

$Client = $RoomNumber = $Status = "";
$Client_err = $RoomNumber_err =  $Status_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["RoomNumber"]) && !empty($_POST["RoomNumber"])){
    // Get hRoomNumberden input value
    $RoomNumber = $_POST["RoomNumber"];
    
    // ValRoomNumberate Client
    $input_Client = trim($_POST["Client"]);
    if(empty($input_Client)){
        $Client_err = "Please enter a Client.";
    } elseif(!filter_var(trim($_POST["Client"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Client_err = 'Please enter a valid Name.';
    } else{
        $Client = $input_Client;
    }
    
    
    // ValRoomNumberate Status
    $input_Status = trim($_POST["Status"]);
    if(empty($input_Status)){
        $Status_err = "Please enter the Status amount.";     
    } elseif(!ctype_digit($input_Status)){
        $Status_err = 'Please enter a positive integer value.';
    } else{
        $Status = $input_Status;
    }
    
    // Check input errors before inserting in database
    if(empty($Client_err) && empty($Status_err)){
        // Prepare an insert statement
        $sql = "UPDATE Room SET Client=:Client, Status=:Status WHERE RoomNumber=:RoomNumber";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':Client', $param_Client);
            $stmt->bindParam(':Status', $param_Status);
            $stmt->bindParam(':RoomNumber', $param_RoomNumber);
            
            // Set parameters
            $param_Client = $Client;
            $param_Status = $Status;
            $param_RoomNumber = $RoomNumber;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: status dorm client.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of RoomNumber parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $RoomNumber =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM Room WHERE RoomNumber = :RoomNumber";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':RoomNumber', $param_RoomNumber);
            
            // Set parameters
            $param_RoomNumber = $RoomNumber;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve indivRoomNumberual field value
                    $Client = $row["Client"];
                    $Status = $row["Status"];
                } else{
                    // URL doesn't contain valRoomNumber RoomNumber. Redirect to error page
                    echo "Kuy";
                    echo ($RoomNumber);
                    //header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain RoomNumber parameter. Redirect to error page
        echo "Kuy";
         echo ($RoomNumber);
        //header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Client_err)) ? 'has-error' : ''; ?>">
                            <label>Client</label>
                            <input type="text" name="Client" class="form-control" value="<?php echo $Client; ?>">
                            <span class="help-block"><?php echo $Client_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($Status_err)) ? 'has-error' : ''; ?>">
                            <label>สถานะ</label>
                            <input type="text" name="Status" class="form-control" value="<?php echo $Status; ?>">
                            <span class="help-block"><?php echo $Status_err;?></span>
                        </div>
                        <input type="hidden" name="RoomNumber" value="<?php echo $RoomNumber; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="status dorm client.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>