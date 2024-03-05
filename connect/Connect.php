
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet"href="test.css" >
    <title>Connect database</title>
  </head>
  <body>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

  <form method ="POST" action="<?php $_SERVER['PHP_SELF'];?>">
<input type="submit" value ="Click to access" name="btn" class="btn"> 
  </form>
    
   
<?php 
if(isset($_POST["btn"])){
$servername = "localhost";
$username = "root";
$password = "";

try{
  $conn = new PDO ("mysql:host = $servername ; dbname = User" , $username,$password );
  $conn->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
  echo " <h3 class=titre> Connected successfully </h3>";

} catch(PDOException $e) {
  echo " <h3 class=titre>Connection failed:</h3> " . $e->getMessage();

}

$conn = null;
}

?>
     </body>
</html>
























