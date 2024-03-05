<?php

$id =$_GET['id'];
try{
    $conn = new PDO("mysql:host=localhost;dbname=firstpdo","root","" );
   $req = $conn->prepare ("DELETE FROM infos WHERE id=:id");
    $req->bindParam(':id', $id);
    $req->execute();
header("Location: Crud.php");
}catch(PDOException $e){
    echo $e->getMessage();

}
     
         

?>

    </div>
</body>
</html>