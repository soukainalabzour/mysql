<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepared Statement</title>
</head>
<body>
    <form method ="post" action="">

   First name : <input type="text" name ="fname">
    <br><br>
   Last name : <input type="text" name ="lname">
    <br><br>
    Age :<input type="text" name ="age">
    <br><br>
    Country :<input type="text" name ="country">
    <br><br>
    <br><br>
    <br><br>
    First name :<input type="text" name ="fname1">
    <br><br>
    Last name : <input type="text" name ="lname1">
    <br><br>
    Age :<input type="text" name ="age1">
    <br><br>
   Country : <input type="text" name ="country1">
   <br><br>
   <input type="submit" value="Insert" name="submit">
    
    </form>  

    <?php
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fname = $lname = $age = $country = "";
    $fname = validate($_POST["fname"]);
    $lname = validate($_POST["lname"]);
    $age = validate($_POST["age"]);
    $country = validate($_POST["country"]);

    $fname1 = $lname1 = $age1 = $country1 = "";
    $fname1 = validate($_POST["fname1"]);
    $lname1 = validate($_POST["lname1"]);
    $age1 = validate($_POST["age1"]);
    $country1 = validate($_POST["country1"]);

    try{
        $conn = new PDO("mysql:host=localhost;dbname=firstpdo","root","" );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO infos(lname, fname, age, country) VALUES (:fname, :lname, :age, :country)");
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':country', $country);
        $stmt->execute(); // Execute the prepared statement for the first set of data

        $stmt->bindParam(':fname', $fname1);
        $stmt->bindParam(':lname', $lname1);
        $stmt->bindParam(':age', $age1);
        $stmt->bindParam(':country', $country1);
        $stmt->execute(); // Execute the prepared statement for the second set of data

        echo "New records created successfully";  
    } catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
    $conn = null;
}
?>
   
</body>
</html>