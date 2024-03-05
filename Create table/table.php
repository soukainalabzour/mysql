

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Table</title>
    <link rel="stylesheet" href="Create.css">
</head>
<body>
    <form method="post">
        Table Name: <input type="text" name="tableName" >
        <br><br>
        Column 1: <input type="text" name="column1">
        <br><br>
        Column 2: <input type="text" name="column2" >
        <br><br>
        Column 3: <input type="text" name="column3">
        <br><br>
        Column 4: <input type="text" name="column4">
        <br><br>
        <input type="submit" value="Create Table" name="submit">
    </form> 
    <?php
    function validate($data) {
        $data = trim($data); // Remove whitespace from the beginning and end of string
        $data = stripslashes($data); // Remove backslashes (\)
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nameTable = validate($_POST["tableName"]);
        $column1 = validate($_POST["column1"]);
        $column2 = validate($_POST["column2"]);
        $column3 = validate($_POST["column3"]);
        $column4 = validate($_POST["column4"]);

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=firstpdo", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE $nameTable(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                $column1 VARCHAR(30) NOT NULL,
                $column2 VARCHAR(30) NOT NULL,
                $column3 VARCHAR(50) NOT NULL,
                $column4 VARCHAR(50) NOT NULL
            )";
            $conn->exec($sql);
            echo "<h3 class=titre>Table Created successfully</h3>";
        } catch(PDOException $e) {
            echo "<h3 class='titre'>Error</h3>" . $e->getMessage();
        }
        $conn = null;
    }
    ?>  
 
</body>
</html>
