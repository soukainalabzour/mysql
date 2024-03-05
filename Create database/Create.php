<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create database</title>
    <link rel="stylesheet" href="Create.css">
</head>
<body>
    <form method="post">
        <input type="submit" value="Click to Create Database" class="btn" name="submit">
    </form> 

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE Mydata";
            $conn->exec($sql);
            echo "<h3 class='titre'>Database Created successfully</h3>";
        } catch(PDOException $e) {
            echo "<h3 class='titre'>$sql</h3>" . $e->getMessage();
        }
        
        $conn = null;
    }
    ?>   
</body>
</html>



