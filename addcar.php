<?php

use phplab7\Model\{database, car};

if (isset($_POST[addCar])){

    //getting form values
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];



    $db = database::getDb();
    $c = new Car();
    $x = $c->addCar($make, $model, $year, $db);


    if ($x){
        echo "Car added";
    } else {
        echo "Error in adding a car";
    }



}
?>


<html lang="en">
<head>
    <title>Add a Car</title>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>

<!-- FORM TO ADD A CAR -->
<form action="" method="post">

    <div>
        <label for="make">Make: </label>
        <input type="text" name="make" id="make" placeholder="Enter make">
    </div>

    <div>
        <label for="model">Model: </label>
        <input type="text" name="model" id="model" placeholder="Enter model">
    </div>

    <div>
        <label for="year">Year: </label>
        <input type="text" name="year" id="year" placeholder="Enter year">
    </div>

    <a href="index.php">Back</a>
    <button type="submit" name="addCar">Add Car</button>

</form>
</body>
</html>