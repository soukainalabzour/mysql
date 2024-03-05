<?php
$id = $_GET['id'];
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["submit"])){
        try{
            $fname = validate($_POST["fname"]);
            $lname = validate($_POST["lname"]);
            $age = validate($_POST["age"]);
            $country = validate($_POST["country"]);

            $db = new PDO("mysql:host=localhost;dbname=firstpdo", "root", "");
            $stm = $db->prepare("UPDATE infos SET fname=:fname , lname=:lname, age=:age, country=:country WHERE id=:id");
            $stm->bindParam(':fname', $fname);
            $stm->bindParam(':lname', $lname);
            $stm->bindParam(':age', $age);
            $stm->bindParam(':country', $country);
            $stm->bindParam(':id', $id);
            $stm->execute();

            header("Location: Crud.php");
        
        }catch(PDOException $e){
            $err = $e->getMessage();
        }
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
   
    </form> 
</head>
<body>
   
     
    <div class="form">
    <?php
        try{
            $db = new PDO("mysql:host=localhost;dbname=firstpdo", "root", "");
            $stm = $db->prepare("SELECT * FROM infos WHERE id=:id");
            $stm->bindParam(':id', $id);
            $stm->execute();
            $rep = $stm->fetchAll();

            foreach($rep as $row){
    ?>
        <a href="Crud.php" class= "back_btn"><img src="back.png">Back</a>
        <h2>Edit User</h2>
        <form method="POST" action="">
        First name :  <br><br><input type="text" name="fname" required  value="<?php echo $row['fname']?>">
        <br><br>
        Last name : <br><br><input type="text" name="lname"   value="<?php echo $row['lname']?>"required>
        <br><br>
        Age: <br><br><input type="text" name="age" required  value="<?php echo $row['age']?>">
        <br><br>
        Country : <br><br><input type="text" name="country"  value="<?php echo $row['country']?>"required>
        <br><br>
        <input type="submit" value="Edit User" name="submit">
        <?php
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    ?>
    </form> 
    </div>
  
</body>
</html>