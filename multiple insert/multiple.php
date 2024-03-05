<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>live coding</title>
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
$fname = $lname = $age = $country ="";
$fname = validate($_POST["fname"]);
$lname = validate($_POST["lname"]);
$age = validate($_POST["age"]);
$country = validate($_POST["country"]);

$fname1 = $lname1 = $age1 = $country1 ="";
$fname1 = validate($_POST["fname1"]);
$lname1 = validate($_POST["lname1"]);
$age1 = validate($_POST["age1"]);
$country1 = validate($_POST["country1"]);

try{
    $conn = new PDO("mysql:host=localhost;dbname=firstpdo","root","" );
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    
    $conn->exec( "INSERT INTO `infos`(`fname` , `lname` , `age`, `country`)
    VALUES('$fname' ,' $lname', $age, '$country')");


    $conn->exec("INSERT INTO `infos`(`fname` , `lname` , `age`, `country`)
    VALUES('$fname1' ,' $lname1', $age1, '$country1')");

    $last_id = $conn->lastInsertId();
    $conn->commit();
    echo "New records created successfully with last ID :".  $last_id ;  
}catch(PDOException $e){
    $conn->rollBack();
    echo "ERROR" . $e->getMessage();

}

}

?>    
</body>
</html>