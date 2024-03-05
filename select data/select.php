<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepared Statement</title>
</head>
<body>
  
    <?php
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


    try{
        $conn = new PDO("mysql:host=localhost;dbname=firstpdo","root","" );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM infos");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo "<table >";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Country</th></tr>";
        foreach($result as $row){
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row ['fname']}</td>
            <td>{$row ['lname']}</td>
            <td>{$row ['age']}</td>
            <td>{$row ['country']}</td>
           </tr> ";}
     
    
    } catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
    $conn = null;

?>
   
</body>
</html>