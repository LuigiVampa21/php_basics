<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My SQL PDO</title>
</head>
<body>

    <h1>PDO - check connexion</h1>

    <?php

    // ---------------  QUERY  ---------------

    // $query = "SELECT * FROM `students`;";
    // $dns = "mysql:host=localhost;dbname=school";
    // $username = "root";
    // $password = '';

    // try{

    //     $db = new PDO($dns, $username, $password);
    //     echo "<p>Connexion succeeded!</p>";
    //     $statement = $db->prepare($query);
    //     $statement->execute();

    //     while( $student = $statement->fetch() ){
    //         echo var_dump($student["NAME"]);
    //     }
    //     $statement->closeCursor();

    // }catch(Exception $e ){
    //     $error_message = $e->getMessage();
    //     echo "<p>Error Message: $error_message</p>";
    // }

    ?> 


    <?php

    // ---------------  INSERT  ---------------

    // $insert = "INSERT INTO `students` (`ID`, `NAME`) VALUES (:ID, :NAME);";
    // $dns = "mysql:host=localhost;dbname=school";
    // $username = "root";
    // $password = '';

    // try{

    //     $db = new PDO($dns, $username, $password);
    //     echo "<p>Connexion succeeded!</p>";
    //     $statement = $db->prepare($insert);
    //     $statement->bindValue(':ID', 4, PDO::PARAM_INT);
    //     $statement->bindValue(':NAME', "michael", PDO::PARAM_STR);
    //     if($statement->execute()){
    //         echo "Inserted successfully!";
    //     }else{
    //         echo "Failed to records";
    //     }

    //     while( $student = $statement->fetch() ){
    //         echo var_dump($student["NAME"]);
    //     }
    //     $statement->closeCursor();

    // }catch(Exception $e ){
    //     $error_message = $e->getMessage();
    //     echo "<p>Error Message: $error_message</p>";
    // }

    ?>


    
    <?php

    // ---------------  INSERT  ---------------

    // $update = "UPDATE `students` SET `NAME`= :NAME WHERE `ID`= :ID;";
    // $dns = "mysql:host=localhost;dbname=school";
    // $username = "root";
    // $password = '';

    // try{

    //     $db = new PDO($dns, $username, $password);
    //     echo "<p>Connexion succeeded!</p>";
    //     $statement = $db->prepare($update);
    //     $statement->bindValue(':ID', 1, PDO::PARAM_INT);
    //     $statement->bindValue(':NAME', "laurent", PDO::PARAM_STR);
    //     if($statement->execute()){
    //         echo "Updated successfully!";
    //     }else{
    //         echo "Failed to update";
    //     }

    //     while( $student = $statement->fetch() ){
    //         echo var_dump($student["NAME"]);
    //     }
    //     $statement->closeCursor();

    // }catch(Exception $e ){
    //     $error_message = $e->getMessage();
    //     echo "<p>Error Message: $error_message</p>";
    // }

    ?>

    <?php

    // ---------------  DELETE  ---------------

    $delete = "DELETE FROM `students` WHERE `ID`= :ID;";
    $dns = "mysql:host=localhost;dbname=school";
    $username = "root";
    $password = '';

    try{

        $db = new PDO($dns, $username, $password);
        echo "<p>Connexion succeeded!</p>";
        $statement = $db->prepare($delete);
        $statement->bindValue(':ID', 2, PDO::PARAM_INT);
        if($statement->execute()){
            echo "Deleted successfully!";
        }else{
            echo "Failed to delete";
        }

        while( $student = $statement->fetch() ){
            echo var_dump($student["NAME"]);
        }
        $statement->closeCursor();

    }catch(Exception $e ){
        $error_message = $e->getMessage();
        echo "<p>Error Message: $error_message</p>";
    }

    ?>

</body>
</html>