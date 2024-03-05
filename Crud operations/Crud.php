<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="add.php" class="btn_add"><img src ="add_btn.png"> Add</a>
        
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
        echo "<table class =mytable>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Country</th><th colspan='2'>Operations</th></tr>";
        foreach($result as $row){
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row ['fname']}</td>
            <td>{$row ['lname']}</td>
            <td>{$row ['age']}</td>
            <td>{$row ['country']}</td>
            <td><a href='edit.php?id={$row['id']}'><img src='modifier.png'width=20px></a></td>
            <td><a href ='delete.php ?id={$row['id']}'><img src='delete.png 'width=20px></a></td> 
           </tr> ";}
     
    
    } catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
    $conn = null;

?>

    </div>
</body>
</html>