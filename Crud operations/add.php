<?php

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["submit"])){
    try{
        // Validating and sanitizing input data
        $fname = validate($_POST["fname"]);
        $lname = validate($_POST["lname"]);
        $age = validate($_POST["age"]);
        $country = validate($_POST["country"]);

        // Establishing a connection to the MySQL database using PDO
        $conn = new PDO("mysql:host=localhost;dbname=firstpdo", "root", "");
        
        // Preparing an SQL INSERT statement to add data into the 'infos' table
        $sql = "INSERT INTO infos (fname, lname, age, country) VALUES (:fname, :lname, :age, :country)";
        $stmt = $conn->prepare($sql);
        
        // Binding parameters to the prepared statement
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':country', $country);
        
        // Executing the prepared statement to insert data into the database
        $stmt->execute();
        
        // Redirecting the user to the 'Crud.php' page after successfully adding the user
        header("Location: Crud.php");
        exit(); // Terminate the script to ensure no further output is sent
    } catch(PDOException $e){
        // If an exception (error) occurs during the execution of the code within the try block, catch the exception and store the error message
        $err = $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <a href="Crud.php" class="back_btn"><img src="back.png">Back</a>
        <h2>Add User</h2>
        <form method="POST" action="">
            First name: <br><br><input type="text" name="fname" required>
            <br><br>
            Last name: <br><br><input type="text" name="lname" required>
            <br><br>
            Age: <br><br><input type="text" name="age" required>
            <br><br>
            Country: <br><br><input type="text" name="country" required>
            <br><br>
            <input type="submit" value="Add User" name="submit">
        </form> 
    </div>
</body>
</html>
