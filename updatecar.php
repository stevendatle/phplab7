<?php
use phplab7\Model\{database, car};

//easy way to initalize multiple variables as empty string
$car_make = $car_model = $car_year = "";

if (isset($_POST['updateCar'])){
    $carid = $_POST['carid'];
    $db = database::getDb();

    $c = new Car();
    $car = $c->getCarById($carid, $db);

    //putting the value of the cars in the form field
    $car_make = $car->car_make;
    $car_model = $car->car_model;
    $car_year = $car->car_year;
}

if (isset($_POST['updateCarFinal'])){
    $carid = $_POST['carrid'];
    $car_make = $_POST['car_make'];
    $car_model = $_POST['car_model'];
    $car_year = $_POST['car_year'];

    $db = database::getDb();
    $c = new Car();
    $count = $c->updateCar($carid, $car_make, $car_model, $car_year, $db);

    if ($count){
        header('Location: index.php');
    } else {
        echo "Problem updating car";
    }
}



?>


<html lang="en">
<head>
    <title>Add a Car</title>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>

<!-- FORM TO UPDATE A CAR -->
<form action="" method="post">
    <input type="hidden" name="carrid" value="<?= $carid; ?>"
    <div>
        <label for="make">Make: </label>
        <input type="text" name="car_make" id="make" value="<?= $car_make; ?>" placeholder="Enter make">
    </div>

    <div>
        <label for="model">Model: </label>
        <input type="text" name="car_model" id="model" value="<?= $car_model; ?>" placeholder="Enter model">
    </div>

    <div>
        <label for="year">Year: </label>
        <input type="text" name="car_year" id="year" value="<?= $car_year; ?>" placeholder="Enter year">
    </div>

    <a href="index.php">Back</a>
    <button type="submit" name="updateCarFinal">Update Car</button>

</form>


</body>


</html>