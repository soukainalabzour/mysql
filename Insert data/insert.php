<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data</title>
    <link rel="stylesheet" href="Create.css">
</head>
<body>

    <form method="post">
        fname <input type="text" name="fname" >
        <br><br>
        lname <input type="text" name="lname">
        <br><br>
        age <input type="text" name="age" >
        <br><br>
        country <input type="text" name="country">
        <br><br>
        <input type="submit" value="Insert Data" name="submit">
    </form> 
    <?php
$fname = $lname = $age =  $country = "";

    function validate($data) {
        $data = trim($data); // Remove whitespace from the beginning and end of string
        $data = stripslashes($data); // Remove backslashes (\)
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fname = validate($_POST["fname"]);
        $lname = validate($_POST["lname"]);
        $age = validate($_POST["age"]);
        $country = validate($_POST["country"]);

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=firstpdo", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO infos(fname, lname,age,country)
            VALUES('$fname', '$lname', '$age', '$country')";
            $conn->exec($sql);
            echo "<h3 class='titre'>Data inserted successfully</h3>";
        } catch(PDOException $e) {
            echo "<h3 class='titre'>Error</h3>" . $e->getMessage();
        }
        $conn = null;
    }
    ?>  
 
</body>
</html>
